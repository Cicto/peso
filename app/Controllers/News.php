<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Controllers\Logs;
use App\Libraries\TemplateLib;
use \Hermawan\DataTables\DataTable;


class News extends BaseController
{        

    public function __construct()
    {
        helper('auth');
        $this->userInformation = TemplateLib::userInformation(user_id());
    }

    public function index()
    {
        $view_data = [
            // 'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
            'news_list'=> $this->getAllNews(),
            'pinned_news' => $this->getPinnedNews(),
        ];
        return view('news/news-and-updates', $view_data);
    }

    public function manage()
    {
        $view_data = [
            'title' => 'News and Updates',
            'userInformation' => $this->userInformation
        ];
        return view('news/news-manager', $view_data);
    }

    public function post($post_id)
    {
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Create New Post',
            'userInformation' => $this->userInformation,
            'post_info' => $master_model->get("news_posts", "*", ["id"=>$post_id]),
            'is_loggedin' => logged_in(),
        ];
        return view('news/read-news-post', $view_data);
    }

    public function new_post()
    {
        $view_data = [
            'title' => 'Create New Post',
            'userInformation' => $this->userInformation,
            'is_edit' => FALSE
        ];
        return view('news/news-builder', $view_data);
    }

    public function edit_post($post_id)
    {
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Edit Post',
            'userInformation' => $this->userInformation,
            'post_info' => $master_model->get("news_posts", "*", ["id"=>$post_id]),
            'is_edit' => TRUE
        ];
        return view('news/news-builder', $view_data);
    }

    public function postDatatable($draft=0, $is_deleted=0)
    {
        if($this->request->isAJAX()){
            $where_status = "(status = 1 OR status = 0)";
            $where_deleted = "is_deleted = ".$is_deleted;
            if($draft){ 
                $where_status = "status = 2";
            }
            $master_model = new MasterModel();
            return DataTable::of($master_model->getDataTables(  "news_posts", 
                                                                "id, post_title, post_author, post_body, status, is_pinned, created_at, is_deleted", 
                                                                $where_deleted." AND ".$where_status, FALSE,
                                                                "is_pinned DESC, id ASC"
                                                                ))->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function createPost()
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $post_data = $_POST;

            //Do a little checky checky uwu
            foreach ($post_data as $key => $value) {
                if($value == ""){
                    return ["status"=>0, "message"=>"Some fields are not filled", "error"=>true];
                }
            }
            $post_data["status"] = isset($post_data["status"]) ? 1 : 2 ;
            $post_data["post_body"] = addslashes($post_data["post_body"]);
            $result = $master_model->insert("news_posts", $post_data);
            if($result["status"]){
                if($post_data["status"] == 1){
                    Logs::log("Posted news post ~ ".$result["id"], user_id(), $post_data);
                    return json_encode(['status' => 1, 'result' => 'Post successfully posted']);
                }else{
                    Logs::log("Added news post ~ ".$result["id"]." to drafts", user_id(), $post_data);
                    return json_encode(['status' => 1, 'result' => 'Post successfully added to drafts']);
                }
            }
            Logs::log("Failed to add new post", user_id(), $post_data);
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updatePost($post_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $post_data = $_POST;

            foreach ($post_data as $key => $value) {
                if($value == ""){
                    return ["status"=>0, "message"=>"Some fields are not filled", "error"=>true];
                }
            }

            $post_status = $master_model->get("news_posts", "status", ["id"=>$post_id]);
            if(!$post_status["status"]){
                return json_encode(['status' => 0, "error" => TRUE, 'result' => 'Something went wrong']);
            }
            
            $post_data["status"] = $post_status["result"][0]->status;
            $post_data["post_body"] = addslashes($post_data["post_body"]);
            $result = $master_model->update("news_posts", $post_data, ["id"=>$post_id]);

            if($result["status"]){
                Logs::log("Updated news post ~ ".$post_id, user_id(), $post_data);
                return json_encode(['status' => 1, 'result' => 'Post successfully updated']);
            }
            Logs::log("Failed to update news post ~ ".$post_id, user_id(), $post_data);
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updatePinnedPost($post_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();

            $result = $master_model->update("news_posts", ["is_pinned"=>0]);
            
            if($result["status"]){
                $result = $master_model->update("news_posts", ["is_pinned"=>1], ["id"=>$post_id]);
                if($result["status"]){
                    Logs::log("Pinned news post ~ ".$post_id, user_id(), ["is_pinned"=>1, "id"=>$post_id]);
                    return json_encode(['status' => 1, 'result' => 'Post successfully pinned']);
                }
                Logs::log("Failed to pin news post ~ ".$post_id, user_id(), ["is_pinned"=>1, "id"=>$post_id]);
                return json_encode($result);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updatePostStatus($post_id, $status){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();

            $result = $master_model->update("news_posts", ["status"=>$status], ["id"=>$post_id]);
            
            if($result["status"]){
                Logs::log("Updated news post ~ ".$post_id." ' status", user_id(), ["status"=>$status, "id"=>$post_id]);
                return json_encode(['status' => 1, 'result' => 'Post status successfully updated']);
            }
            Logs::log("Failed to update news post ~ ".$post_id." ' status", user_id(), ["status"=>$status, "id"=>$post_id]);
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateDeletedPost($post_id, $is_deleted){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $is_deleted = $is_deleted == 1 ? 0 : 1;
            $message = $is_deleted == 0 ? "restored" : "deleted";
            $result = $master_model->update("news_posts", ["is_deleted"=>$is_deleted, "is_pinned"=>0], ["id"=>$post_id]);
            
            if($result["status"]){
                Logs::log(ucwords($message)." news post ~ ".$post_id, user_id(), ["is_deleted"=>$is_deleted, "is_pinned"=>0, "id"=>$post_id]);
                return json_encode(['status' => 1, 'result' => 'Post successfully '.$message]);
            }
            Logs::log("Failed to ".rtrim($message, "d")." news post ~ ".$post_id, user_id(), ["is_deleted"=>$is_deleted, "is_pinned"=>0, "id"=>$post_id]);
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public static function getPinnedNews(){
        $master_model = new MasterModel();
        $result = $master_model->get("news_posts", "*", ["status"=>1, "is_pinned"=>1, "is_deleted"=>0]);
        return $result;
    }

    public static function getRecentNews($count = 3){
        $master_model = new MasterModel();
        $result = $master_model->get("news_posts", "*", ["status"=>1, "is_pinned"=>0, "is_deleted"=>0], FALSE, "created_at DESC", $count );
        return $result;
    }

    public function getAllNews(){
        // if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $result = $master_model->get("news_posts", "*", ["is_deleted"=>0, "status"=>1, "is_pinned"=>0], FALSE, 'created_at DESC');
            return $result;
        // }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
}
?>