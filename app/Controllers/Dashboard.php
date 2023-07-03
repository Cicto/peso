<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Libraries\TemplateLib;
use Myth\Auth\Password;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->userInformation = TemplateLib::userInformation(user_id());
    }


    public function index()
    {
        $masterModel = new MasterModel();

        switch ($this->userInformation->role) {
            
            case '1': // System Admin
                
                $pending_applicants_job_posts = $masterModel->get("job_posts", 
                    "job_title, total_pending_applicants, id", 
                    ["is_deleted"=>0, "total_pending_applicants >" => 0], 
                    [
                        ["(SELECT COUNT(id) AS total_pending_applicants, job_post_id FROM job_applications WHERE application_status=0 GROUP BY job_post_id) AS job_applications", "job_applications.job_post_id = job_posts.id", "LEFT"],
                    ]);

                $total_jobs_posted = $masterModel->get("job_posts", 
                    "COUNT(id) AS total_jobs_posted", ["status <>"=>0, "status <>"=>2, "is_deleted"=>0]);
                if(!$total_jobs_posted["status"]){
                    $total_jobs_posted=0;
                }else{
                    $total_jobs_posted=$total_jobs_posted["result"][0]->total_jobs_posted;
                }


                $today = date("Y-m-d");
                $available_job_posts = $masterModel->get("job_posts", 
                    "COUNT(id) AS total_available_job_posts", 
                    ["is_deleted"=>0, "status"=>1, "job_date >="=>$today]);
                if(!$available_job_posts["status"]){
                    $available_job_posts=0;
                }else{
                    $available_job_posts=$available_job_posts["result"][0]->total_available_job_posts;
                }

                
                $news_posted = $masterModel->get("news_posts", 
                    "COUNT(id) AS total_news_posted", 
                    ["is_deleted"=>0, "status"=>1]);
                if(!$news_posted["status"]){
                    $news_posted=0;
                }else{
                    $news_posted=$news_posted["result"][0]->total_news_posted;
                }

                $current_year = date("Y");
                $account_created_by_month = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS accounts_created
                    FROM users
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$account_created_by_month["status"]){
                    $account_created_by_month=0;
                }else{
                    $account_created_by_month=$account_created_by_month["result"];
                }

                $job_posts_created = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS job_posts_created
                    FROM job_posts
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$job_posts_created["status"]){
                    $job_posts_created=0;
                }else{
                    $job_posts_created=$job_posts_created["result"];
                }

                $job_applications_created = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS job_applications_created
                    FROM job_applications
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$job_applications_created["status"]){
                    $job_applications_created=0;
                }else{
                    $job_applications_created=$job_applications_created["result"];
                }


                $pending_applicants = $masterModel->customQuery("
                    SELECT
                        COUNT(id) AS count,
                        SUM(is_hired) AS is_hired,
                        application_status
                    FROM
                        job_applications
                    GROUP BY
                        application_status
                ");

                $pending_applicants_result = array();
                if($pending_applicants["status"]){
                    foreach ($pending_applicants["result"] as $key => $pending_applicant) {
                        $pending_applicants_result[$pending_applicant->application_status] = [];
                        $pending_applicants_result[$pending_applicant->application_status]["count"] = intval($pending_applicant->count);
                        $pending_applicants_result[$pending_applicant->application_status]["hireds"] = intval($pending_applicant->is_hired);
                    }
                // }else{
                }

                $view_data = [
                    'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                    'userInformation' => $this->userInformation,
                    'pending_applicants_job_posts' => $pending_applicants_job_posts,
                    'total_jobs_posted' => $total_jobs_posted,
                    'available_job_posts' => $available_job_posts,
                    'total_news_posted' => $news_posted,
                    'account_created_by_month' => $account_created_by_month,
                    'job_posts_created_by_month' => $job_posts_created,
                    'job_applications_created_by_month' => $job_applications_created,
                    'pending_applicants' => $pending_applicants_result,
                    'user_id' => user_id()
                ];
        
                return view('dashboards/sysAdmin', $view_data);
                break;
            case '2': // Admin
                
                $pending_applicants_job_posts = $masterModel->get("job_posts", 
                    "job_title, total_pending_applicants, id", 
                    ["is_deleted"=>0, "total_pending_applicants >" => 0], 
                    [
                        ["(SELECT COUNT(id) AS total_pending_applicants, job_post_id FROM job_applications WHERE application_status=0 GROUP BY job_post_id) AS job_applications", "job_applications.job_post_id = job_posts.id", "LEFT"],
                    ]);

                $total_jobs_posted = $masterModel->get("job_posts", 
                    "COUNT(id) AS total_jobs_posted", ["status <>"=>0, "status <>"=>2, "is_deleted"=>0]);
                if(!$total_jobs_posted["status"]){
                    $total_jobs_posted=0;
                }else{
                    $total_jobs_posted=$total_jobs_posted["result"][0]->total_jobs_posted;
                }


                $today = date("Y-m-d");
                $available_job_posts = $masterModel->get("job_posts", 
                    "COUNT(id) AS total_available_job_posts", 
                    ["is_deleted"=>0, "status"=>1, "job_date >="=>$today]);
                if(!$available_job_posts["status"]){
                    $available_job_posts=0;
                }else{
                    $available_job_posts=$available_job_posts["result"][0]->total_available_job_posts;
                }

                
                $news_posted = $masterModel->get("news_posts", 
                    "COUNT(id) AS total_news_posted", 
                    ["is_deleted"=>0, "status"=>1]);
                if(!$news_posted["status"]){
                    $news_posted=0;
                }else{
                    $news_posted=$news_posted["result"][0]->total_news_posted;
                }

                $current_year = date("Y");
                $account_created_by_month = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS accounts_created
                    FROM users
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$account_created_by_month["status"]){
                    $account_created_by_month=0;
                }else{
                    $account_created_by_month=$account_created_by_month["result"];
                }

                $job_posts_created = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS job_posts_created
                    FROM job_posts
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$job_posts_created["status"]){
                    $job_posts_created=0;
                }else{
                    $job_posts_created=$job_posts_created["result"];
                }

                $job_applications_created = $masterModel->customQuery("
                    SELECT
                        DATE_FORMAT(created_at, '%m') AS created_at,
                        COUNT(id) AS job_applications_created
                    FROM job_applications
                    WHERE YEAR(created_at) = '".$current_year."'
                    GROUP BY
                        MONTH(created_at)
                ");
                if(!$job_applications_created["status"]){
                    $job_applications_created=0;
                }else{
                    $job_applications_created=$job_applications_created["result"];
                }

                $view_data = [
                    'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                    'userInformation' => $this->userInformation,
                    'pending_applicants_job_posts' => $pending_applicants_job_posts,
                    'total_jobs_posted' => $total_jobs_posted,
                    'available_job_posts' => $available_job_posts,
                    'total_news_posted' => $news_posted,
                    'account_created_by_month' => $account_created_by_month,
                    'job_posts_created_by_month' => $job_posts_created,
                    'job_applications_created_by_month' => $job_applications_created,
                    'user_id' => user_id()
                ];
        
                return view('dashboards/sysAdmin', $view_data);
                break;

            case '3': // User
                $view_data['is_filled'] = UtilController::isUserFilled(user_id());

                $view_data = [
                    'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                    'userInformation' => $this->userInformation,
                ];

                if(UtilController::isUserFilled(user_id())){
                    if(UtilController::doesUserHaveResume(user_id())){
                        return redirect()->to('home');
                    }
                    return view('users/resume', $view_data);
                }
                $view_data['provinces'] = $masterModel->get('refprovince', '*')['result'];
                // $view_data['userBirthPlace'] = json_decode(UtilController::userBarangaysCitiesAndProvinces($this->userInformation->birth_place_barangay_id));

                return view('users/profile', $view_data);
                break;

            default:

                $getPassword = $masterModel->get('users', 'password_hash', ['id' => user_id()]);

                if(Password::verify(TemplateLib::defaultPassword(), $getPassword['result'][0]->password_hash))
                {  
                    return view('users/changePassword', $view_data); 
                }
                else
                {
                    $view_data = [
                        'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                        'userInformation' => $this->userInformation
                    ];
                    return view('dashboards/client', $view_data);
                }

                break;
        }
    }

    public function adminDashboard()
    {   
        
    }

    public function clientDashboard()
    {
        $view_data = [
            'title' => 'Welcome, '.$userInfo->firstname.' '.$userInfo->lastname,
            'userInformation' => $userInfo
        ];
    }

    public function profile(){
        if($this->userInformation->role==3){
            $masterModel = new MasterModel();

            $view_data = [
                'title' => 'My Profile',
                'userInformation' => $this->userInformation,
                'provinces' => $masterModel->get('refprovince', '*')['result'],
                'userBarangaysCitiesAndProvinces' => json_decode(UtilController::userBarangaysCitiesAndProvinces($this->userInformation->barangay_id)),
                'userBirthPlace' => json_decode(UtilController::userBirthPlace($this->userInformation->birth_place_city_mun_id)),
                'city' => $masterModel->printGet("refcitymun", "*", ["id" => $this->userInformation->birth_place_city_mun_id]),
                'is_loggedin' => logged_in()
            ];
            return view('users/editProfile', $view_data);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function resume(){
        if($this->userInformation->role==3){
            $masterModel = new MasterModel();

            $view_data = [
                'title' => 'My Resume',
                'userInformation' => $this->userInformation,
                'is_loggedin' => logged_in()
            ];
            return view('users/editResume', $view_data);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
}
