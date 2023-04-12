<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Libraries\TemplateLib;
use Myth\Auth\Password;

class Home extends BaseController
{
    public function __construct()
    {
        helper('auth');

        if(logged_in()){
            $this->userInformation = TemplateLib::userInformation(user_id());
        }else{
            $this->userInformation = false;
        }
    }

    public function index()
    {   

        $master_model = new MasterModel();
        $today = date("Y-m-d");
        $recent_jobs = $master_model->get("job_posts", "job_posts.*, job_category", ["job_posts.is_deleted"=>0, "job_posts.status"=>1, "job_posts.job_date>="=>$today], [["job_categories", "job_categories.id = job_posts.job_category_id", "left"]], "job_posts.posted_at DESC", 10);
        $recent_jobs = $recent_jobs["status"] ? $recent_jobs["result"] : FALSE;
        $view_data = [
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
            'recent_jobs' => $recent_jobs,
        ];
        return view('home/home', $view_data);
    }

    public function search($what = FALSE, $where = FALSE)
    {
        return view('home/search', $this->userInformation);
    }

    public function asd()
    {
        $master_model = new MasterModel();
        $today = date("Y-m-d");
        $recent_jobs = $master_model->get("job_posts", "job_posts.*, job_category", ["job_posts.is_deleted"=>0, "job_posts.status"=>1, "job_posts.job_date>="=>$today], [["job_categories", "job_categories.id = job_posts.job_category_id", "left"]], "job_posts.posted_at DESC", 10);

        // $recent_jobs = $master_model->printGet("job_posts", "job_posts.*, job_category", ["is_deleted"=>0, "status"=>1, "`job_date`>="=>$today], [["job_categories", "job_categories.id = job_posts.job_category_id", "left"]], "posted_at DESC", 10);
        $view_data = [
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
            'recent_jobs' => $recent_jobs
        ];
        return view('home/test', $view_data);
    }
}
?>
