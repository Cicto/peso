<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Libraries\TemplateLib;
use Myth\Auth\Password;
use \Hermawan\DataTables\DataTable;


class Jobs extends BaseController
{
    public function __construct()
    {
        $this->userInformation = TemplateLib::userInformation(user_id());
    }

    public function index()
    {
        $view_data = [
            'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
        ];
        return view('jobs/search', $view_data);
    }

    public function search()
    {
        $master_model = new MasterModel();

        $what = $this->request->getGet("what");
        $where = $this->request->getGet("where");
        $what_condition = "";
        if(isset($what)){
            $what_condition = "(job_title LIKE '%".$what."%' OR company_name LIKE '%".$what."%')";
        }
        $where_condition = "";
        if(isset($where)){
            $where_condition = "(company_address LIKE '%".$where."%' OR interview_location LIKE '%".$where."%')";
        }
        $final_condition = "";
        if($what && $where){
            $final_condition = $what_condition ." AND ".$where_condition;
        }else{
            if($what && !$where){

            }
        }
        // $search_result = $master_model->get("job_posts", "*", );
        $view_data = [
            'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
            'what' => $what,
            'where' => $where,
            'search_result' => null
        ];
        return view('jobs/search', $view_data);
    }

    public function post($job_id){
        $master_model = new MasterModel();

        $view_data = [
            'title' => 'Job Posts',
            'userInformation' => $this->userInformation,
            'job_post' => $master_model->get("job_posts", "*", ["job_posts.id"=>$job_id, "job_posts.is_deleted"=>0], [["job_categories","job_categories.id = job_posts.job_category_id","left"]]),
            'is_loggedin' => logged_in()
        ];
        return view('jobs/job-post', $view_data);
    }

    public function manage(){
        $view_data = [
            'title' => 'Job Posts',
            'userInformation' => $this->userInformation
        ];
        return view('jobs/jobs-manager', $view_data);
    }

    public function new_job_post(){
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Create New Job Post',
            'userInformation' => $this->userInformation,
            'barangays_cities_and_pronvinces' => UtilController::barangaysCitiesAndPronvinces(false, false),
            'job_categories' => $master_model->get("job_categories", "*", ["is_deleted"=>0])["result"],
            'is_edit' => false
        ];
        return view('jobs/jobs-builder', $view_data);
    }

    public function edit_job_post($job_id){
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Create New Job Post',
            'userInformation' => $this->userInformation,
            'barangays_cities_and_pronvinces' => UtilController::barangaysCitiesAndPronvinces(false, false),
            'job_categories' => $master_model->get("job_categories", "*", ["is_deleted"=>0])["result"],
            'job_info' => $master_model->get("job_posts", "*", ["id"=>$job_id,"is_deleted"=>0])["result"][0],
            'is_edit' => true
        ];
        return view('jobs/jobs-builder', $view_data);
    }

    public function getJob($job_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $recent_jobs = $master_model->get("job_posts", "job_posts.*, job_category", ["job_posts.is_deleted"=>0, "job_posts.status"=>1, "job_posts.id"=>$job_id], [["job_categories", "job_categories.id = job_posts.job_category_id", "left"]]);    
            return json_encode($recent_jobs);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function jobsDataTable($draft=0, $is_deleted=0){
        if($this->request->isAJAX()){
            $where_status = "(job_posts.status = 1 OR job_posts.status = 0)";
            $where_deleted = "job_posts.is_deleted = ".$is_deleted;
            if($draft){ 
                $where_status = "status = 2";
            }
            $master_model = new MasterModel();
            return DataTable::of($master_model->getDataTables(  "job_posts", 
                                                                "job_posts.id, job_posts.job_title, company_name, company_address, status, posted_at, job_categories.job_category, job_posts.is_deleted", 
                                                                $where_deleted." AND ".$where_status,
                                                                [["job_categories", "job_category_id = job_categories.id", "inner"]]
                                                                ))->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function createJobPost(){
        $master_model = new MasterModel();
        $data = $_POST;
        if(!($data["job_title"] && $data["company_name"] && ($data["job_date"] || $data["interview_date"]))){
            return json_encode(['status' => 0, "result"=>"Some required fields are not filled", "error"=>true]);
        }
        $data["job_title"] = strtoupper($data["job_title"]);
        $data["company_name"] = strtoupper($data["company_name"]);
        $comma = $data["company_location"] ? ", ": "";
        $data["company_address"] = $data["company_location"] . $comma . $data["company_city"] . ", " . $data["company_province"];
        $data["company_address"] = strtoupper($data["company_address"]);
        $data["company_location"] = strtoupper($data["company_location"]);

        $comma = $data["interview_location"] ? ", ": "";
        $data["interview_address"] = $data["interview_location"] . $comma . $data["interview_city"] . ", " . $data["interview_province"];
        $data["interview_address"] = $data["job_category_id"]==1 ? NULL : strtoupper($data["interview_location"]);
        $data["interview_location"] = strtoupper($data["interview_location"]);
        
        $data["job_date"] = $data["job_category_id"]==1 ? $data["job_date"] : $data["interview_date"];

        $data["posted_at"] = date("Y-m-d h:i:s");
        $data["created_at"] = date("Y-m-d h:i:s");
        $data["status"] = isset($data["status"]) ? 1 : 2 ;
        unset($data["company_city"]);
        unset($data["company_province"]);
        unset($data["interview_city"]);
        unset($data["interview_province"]);
        unset($data["interview_date"]);
        
        $result = $master_model->insert("job_posts", $data);
        if($result["status"]){
            if($data["status"] == 1){
                return json_encode(['status' => 1, 'result' => 'Job successfully posted']);
            }else{
                return json_encode(['status' => 1, 'result' => 'Job successfully added to drafts']);
            }
        }
        return json_encode($data);
    }
    public function updateJobPost(){
        $master_model = new MasterModel();
        $data = $_POST;
        if(!($data["job_title"] && $data["company_name"] && ($data["job_date"] || $data["interview_date"]))){
            return json_encode(['status' => 0, "result"=>"Some required fields are not filled", "error"=>true]);
        }
        $data["job_title"] = strtoupper($data["job_title"]);
        $data["company_name"] = strtoupper($data["company_name"]);
        $comma = $data["company_location"] ? ", ": "";
        $data["company_address"] = $data["company_location"] . $comma . $data["company_city"] . ", " . $data["company_province"];
        $data["company_address"] = strtoupper($data["company_address"]);
        $data["company_location"] = strtoupper($data["company_location"]);

        $comma = $data["interview_location"] ? ", ": "";
        $data["interview_address"] = trim($data["interview_location"]) . $comma . $data["interview_city"] . ", " . $data["interview_province"];
        $data["interview_address"] = $data["job_category_id"]==1 ? NULL : strtoupper($data["interview_address"]);
        $data["interview_location"] = strtoupper($data["interview_location"]);
        
        $data["job_date"] = $data["job_category_id"]==1 ? $data["job_date"] : $data["interview_date"];

        $data["updated_at"] = date("Y-m-d h:i:s");
        $data["status"] = isset($data["status"]) ? 1 : 2 ;
        $id = $data["id"];
        unset($data["id"]);
        unset($data["company_city"]);
        unset($data["company_province"]);
        unset($data["interview_city"]);
        unset($data["interview_province"]);
        unset($data["interview_date"]);
        
        $result = $master_model->update("job_posts", $data, ["id"=>$id]);
        if($result["status"]){
            return json_encode(['status' => 1, 'result' => 'Job successfully updated', 'submitted'=> json_encode($data)]);
        }
        return json_encode($data);
    }

    public function updateJobStatus($job_id, $status){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $update = ["status"=>$status];
            if($status == 1){
                $update["posted_at"] = date("Y-m-d h:i:s");
            }
            $result = $master_model->update("job_posts", $update, ["id"=>$job_id]);
            
            if($result["status"]){
                return json_encode(['status' => 1, 'result' => 'Job status successfully updated']);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateDeletedJobPost($job_id, $is_deleted){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $is_deleted = $is_deleted == 1 ? 0 : 1;
            $message = $is_deleted == 0 ? "restored" : "deleted";
            $result = $master_model->update("job_posts", ["is_deleted"=>$is_deleted], ["id"=>$job_id]);
            
            if($result["status"]){
                return json_encode(['status' => 1, 'result' => 'Job post successfully '.$message]);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
}
?>