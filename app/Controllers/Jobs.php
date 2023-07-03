<?php

namespace App\Controllers;
use Myth\Auth\Entities\User;
use App\Models\MasterModel;
use App\Controllers\UtilController;
use App\Controllers\Users as Users_Controller;
use App\Libraries\TemplateLib;
use Myth\Auth\Password;
use \Hermawan\DataTables\DataTable;


class Jobs extends BaseController
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
            $final_condition = $what_condition ." OR ".$where_condition;
        }else{
            if($what && !$where){
                $final_condition = $what_condition;
            }elseif(!$what && $where){
                $final_condition = $where_condition;
            }else{
                $final_condition = "job_posts.is_deleted = 0";
            }
        }
        $today = date("Y-m-d");
        $final_condition = $final_condition . " AND job_date >= '".$today."' AND status = 1 AND job_posts.is_deleted = 0";
        $search_result = $master_model->get("job_posts", 
            "job_posts.*, job_category, applicants", 
            $final_condition, 
            [
                ["job_categories", "job_categories.id = job_posts.job_category_id", "left"],
                ["(SELECT COUNT(id) AS applicants, application_status, job_post_id FROM job_applications WHERE application_status <> 3 GROUP BY job_post_id) AS job_applications", "job_applications.job_post_id = job_posts.id", "left"],
            ], 
            "job_posts.posted_at DESC",);

        $view_data = [
            'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
            'userInformation' => $this->userInformation,
            'is_loggedin' => logged_in(),
            'what' => $what,
            'where' => $where,
            'searched_jobs' => $search_result,
            'where_condition' => $final_condition
        ];
        return view('jobs/search', $view_data);
    }

    public function post($job_id)
    {
        $master_model = new MasterModel();
        $where_condition = ["job_posts.id"=>$job_id];
        if($this->userInformation->role != 1 || $this->userInformation->role != 2){
            $where_condition["job_posts.is_deleted"] = 0;
        }
        $view_data = [
            'title' => 'Job Posts',
            'userInformation' => $this->userInformation,
            'job_post' => $master_model->get("job_posts", 
                "job_posts.*, job_category", 
                $where_condition, 
                [["job_categories","job_categories.id = job_posts.job_category_id","left"]]),
            'applied_jobs' => Jobs::getAppliedJobs(),
            'is_loggedin' => logged_in(),
        ];
        return view('jobs/job-post', $view_data);
    }

    public function manage()
    {
        $view_data = [
            'title' => 'Job Posts',
            'userInformation' => $this->userInformation
        ];
        return view('jobs/jobs-manager', $view_data);
    }

    public function new_job_post()
    {
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

    public function edit_job_post($job_id=false)
    {
        if($job_id){
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
        }else{
            return redirect()->to(base_url("/jobs/manage")); 
        }
    }

    public function applications()
    {
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Job Applications',
            'userInformation' => $this->userInformation,
            'applied_jobs' => $this->getAppliedJobs(),
            'is_loggedin' => logged_in(),
            'user_id' => user_id()
        ];
        return view('jobs/job-applications-manager', $view_data);
    }

    public function search_applications()
    {
        $master_model = new MasterModel();
        $view_data = [
            'title' => 'Job Applications',
            'userInformation' => $this->userInformation,
            'applied_jobs' => $this->getAppliedJobs(),
            'is_loggedin' => logged_in(),
            'user_id' => user_id()
        ];
        return view('jobs/job-applications-search', $view_data);
    }

    public function applicants($job_id=false)
    {
        if($job_id){
            $master_model = new MasterModel();
            $job_info = $master_model->get("job_posts", 
                "job_posts.*, job_category", 
                ["job_posts.is_deleted"=>0, "job_posts.id"=>$job_id], 
                [
                    ["job_categories", "job_categories.id = job_posts.job_category_id", "left"]
                ]);
            if(!$job_info["status"]){
                return redirect()->to(base_url("jobs/applications")); 
            }

            $applicants = $master_model->get("job_applications", 
                "
                job_applications.id, job_applications.application_status, public_user_info.resume, users.email, job_applications.created_at, public_user_info.user_id,
                public_user_info.firstname, public_user_info.middlename, public_user_info.lastname, public_user_info.suffix, public_user_info.user_photo,
                ", 
                ["job_applications.is_deleted"=>0, "job_applications.job_post_id"=>$job_id], 
                [
                    ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"],
                    ["public_user_info", "public_user_info.user_id = job_applications.applicant_id", "inner"],
                    ["users", "users.id = job_applications.applicant_id", "inner"],
                ]);

            if(!$applicants["status"]){
                return redirect()->to(base_url("jobs/applications")); 
            }
            $view_data = [
                'title' => 'Job Applicants',
                'userInformation' => $this->userInformation,
                'job_info' => $job_info["result"][0],
                'applicants' => $applicants["result"],
                'is_loggedin' => logged_in(),
            ];
            return view('jobs/job-applicants', $view_data);
        }else{
            return redirect()->to(base_url("jobs/applications")); 
        }
    }

    public function my_applications()
    {
        $master_model = new MasterModel();
        $users = new Users_Controller();

        $view_data = [
            'title' => 'Job Applications',
            'userInformation' => $this->userInformation,
            'applied_jobs' => $this->getAppliedJobs(),
            'is_loggedin' => logged_in(),
            'notifications' => $users->getUserNotifications(user_id()),
            'user_id' => user_id()
        ];
        return view('jobs/job-applications', $view_data);
    }

    public function sendApplicantEmails($application_id)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $applicant_query = $master_model->get("job_applications", 
                "CONCAT(public_user_info.firstname, ' ', public_user_info.lastname) AS applicant_name, email, job_title, company_name, application_status, applicant_id", 
                ["job_applications.id"=>$application_id],
                [
                    ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"],
                    ["public_user_info", "public_user_info.user_id = job_applications.applicant_id", "inner"],
                    ["users", "users.id = job_applications.applicant_id", "inner"],
                ]
                );
            if($applicant_query["status"]){

                $applicant_name = $applicant_query["result"][0]->applicant_name;
                $email_address = $applicant_query["result"][0]->email;
                $job_title = $applicant_query["result"][0]->job_title;
                $company_name = $applicant_query["result"][0]->company_name;
                $application_status = $applicant_query["result"][0]->application_status;
                $applicant_id = $applicant_query["result"][0]->applicant_id;

                if($application_status==0){
                    $update_applicant_status = $master_model->update("job_applications", ["application_status"=>2],["id"=>$application_id]);
                    if($update_applicant_status["status"]==0){
                        return json_encode($update_applicant_status);
                    }
                }

                $email_content = "";
                $users = new Users_Controller();
                if($application_status==1){
                    $email_content = $this->approveApplicationEmail($applicant_name, $job_title, $company_name);
                    $users->createUserNotification($applicant_id, "Your application for <b>" . $job_title . "</b> at <b>" . $company_name . "</b> has been accepted. Check your email for more details", base_url("jobs/my_applications"));
                }else{
                    $email_content = $this->declineApplicationEmail($applicant_name, $job_title, $company_name);
                    $users->createUserNotification($applicant_id, "Your application for <b>" . $job_title . "</b> at <b>" . $company_name . "</b> has been declined. Check your email for more details", base_url("jobs/my_applications"));
                }

                $email = \Config\Services::email();
                $email->setFrom('no-reply@baliwag.gov.ph', 'Baliwag Trabaho Updates');
                $email->setTo($email_address);
                
                $email->setSubject($company_name." / ".$job_title);
                $email->setMessage($email_content);

                $email_result = $email->send(false);
                if($email_result){
                    $update_emailed = $master_model->update("job_applications", ["is_emailed"=>1], ["id"=>$application_id]);
                    if($update_emailed["status"]){
                        return json_encode(["status"=>1, "result"=>"Email successfully sent"]);
                    }
                    return json_encode(["status"=>1, "result"=>"Email successfully sent, but records are not updated"]);
                }else{
                    return json_encode(["status"=>0, "error"=>true, "result"=>$email->printDebugger(['headers'])]);
                }
            }
            return json_encode($applicant_query);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function getJob($job_id)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $recent_jobs = $master_model->get("job_posts", "job_posts.*, job_category, applicants", 
                ["job_posts.is_deleted"=>0, "job_posts.status"=>1, "job_posts.id"=>$job_id], 
                [
                    ["job_categories", "job_categories.id = job_posts.job_category_id", "left"],
                    ["(SELECT COUNT(id) AS applicants, application_status, job_post_id FROM job_applications WHERE application_status <> 3) AS job_applications", "job_applications.job_post_id = job_posts.id", "left"],
                ]);
            return json_encode($recent_jobs);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function jobsDataTable($draft=0, $is_deleted=0)
    {
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

    public function createJobPost()
    {
        $master_model = new MasterModel();
        $data = $_POST;
        if(!($data["job_category_id"] && $data["job_title"] && $data["company_name"] && ($data["job_date"] || $data["interview_date"]))){
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

        $data["posted_at"] = date("Y-m-d H:i:s");
        $data["created_at"] = date("Y-m-d H:i:s");
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

    public function updateJobPost()
    {
        $master_model = new MasterModel();
        $data = $_POST;
        if(!($data["job_category_id"] && $data["job_title"] && $data["company_name"] && ($data["job_date"] || $data["interview_date"]))){
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

        $data["updated_at"] = date("Y-m-d H:i:s");
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

    public function updateJobStatus($job_id, $status)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $update = ["status"=>$status];
            if($status == 1){
                $update["posted_at"] = date("Y-m-d H:i:s");
            }
            $result = $master_model->update("job_posts", $update, ["id"=>$job_id]);
            
            if($result["status"]){
                return json_encode(['status' => 1, 'result' => 'Job status successfully updated']);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateDeletedJobPost($job_id, $is_deleted)
    {
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

    public static function getAppliedJobs($user_id=false)
    {
        $master_model = new MasterModel();
        if($user_id === false){
            $user_id = user_id();
        }
        $applied_jobs = $master_model->get(  "job_applications", 
                                            "job_applications.id AS job_application_id, job_applications.job_post_id, job_posts.*, job_category", 
                                            ["job_applications.is_deleted"=>0, "job_posts.is_deleted"=>0, "applicant_id"=>$user_id], 
                                            [
                                                ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"],
                                                ["job_categories", "job_categories.id = job_posts.job_category_id", "left"]
                                            ]);    
        return $applied_jobs;
    }

    public function getUserApplicationHistory($user_id)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $returned_data = [];
            $result = $master_model->get("job_applications", 
                "job_applications.id, job_applications.created_at, job_applications.application_status, job_applications.is_emailed, 
                job_categories.job_category, job_posts.job_title, job_posts.company_name, job_posts.company_address", 
                ["job_applications.applicant_id" => $user_id, "job_applications.is_deleted" => 0], 
                [
                    ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"], 
                    ["job_categories", "job_categories.id = job_posts.job_category_id", "inner"]
                ],
                "job_applications.created_at DESC");

            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function getAppliedJobsId()
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $applied_jobs = $master_model->get(  "job_applications", 
                                                "job_post_id", 
                                                ["is_deleted"=>0, "application_status <>"=>3, "applicant_id"=>user_id()]);    
            return json_encode($applied_jobs);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
    
    public function createJobApplication($job_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $user_id = user_id();
            $data = [];
            $data["job_post_id "] = $job_id;
            $data["applicant_id"] = $user_id;
            $data["created_at"] = date("Y-m-d H:i:s");;

            $result = $master_model->insert("job_applications", $data);
            if($result["status"]){
                return json_encode(['status' => 1, 'result' => 'Job application successfully submitted']);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function appliedJobsDataTable(){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            return DataTable::of($master_model->getDataTables(  "job_applications", 
                                                                    "job_applications.id, job_post_id, application_status, job_category, job_posts.job_title, job_posts.company_name, job_posts.company_address, job_applications.created_at", 
                                                                    ["application_status <>"=>3, "job_applications.is_deleted"=>0, "job_posts.is_deleted"=>0, 'applicant_id'=>user_id()],
                                                                    [   ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"], 
                                                                        ["job_categories", "job_posts.job_category_id = job_categories.id", "inner"]  ]
                                                                ) )->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateJobApplication($application_id, $status){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = ['application_status' => $status];
            return json_encode($master_model->update("job_applications", $data, ['id' => $application_id] ));
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function jobApplicationsDataTable(){
        if($this->request->isAJAX()){
            $this->db = db_connect();
            $builder = $this->db->table("job_posts")
                ->select("job_posts.id, job_posts.job_title, company_name, company_address, status, posted_at, job_categories.job_category, job_posts.is_deleted, COUNT(job_applications.id) AS applicants")
                ->join("(
                    SELECT
                        *
                    FROM
                        job_applications
                    WHERE
                        application_status <> 3
                ) AS job_applications", "job_applications.job_post_id = job_posts.id", "left")
                ->join("job_categories", "job_categories.id = job_posts.job_category_id", "inner")
                ->where(["job_posts.status"=> 1])
                ->where(["job_posts.is_deleted"=> 0])
                ->orWhere(["job_posts.status"=> 3])
                ->groupBy("job_posts.id");
            return DataTable::of($builder)->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function applicantsDataTable($job_id, $application_status=0)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $where_condition = ["job_applications.is_deleted"=>0, "job_applications.job_post_id"=>$job_id];
            $application_status = intval($application_status);
            if($application_status>0){
                $where_condition["application_status"] = $application_status;
            }
            $builder = $master_model->getDataTables("job_applications", 
                "
                job_applications.id, job_applications.application_status, public_user_info.resume, users.email, job_applications.created_at, job_applications.is_emailed, job_applications.is_hired, job_applications.not_hired_reason,
                public_user_info.firstname, public_user_info.middlename, public_user_info.lastname, public_user_info.suffix, public_user_info.user_photo,
                public_user_info.sex, public_user_info.birthdate, public_user_info.contact_number, 
                public_user_info.house_number, public_user_info.street_name, refbrgy.brgyDesc, refcitymun.citymunDesc, refprovince.provDesc,
                public_user_misc_info.employment_status, public_user_misc_info.employment_type, public_user_misc_info.preferred_occupation, 
                public_user_educational_background.work_experience, public_user_educational_background.elementary_school_name, public_user_educational_background.elementary_year_graduated, public_user_educational_background.elementary_is_undergrad, public_user_educational_background.elementary_last_year_attended,
                public_user_educational_background.secondary_school_name, public_user_educational_background.secondary_year_graduated, public_user_educational_background.secondary_is_undergrad, public_user_educational_background.secondary_last_year_attended,
                public_user_educational_background.tertiary_school_name, public_user_educational_background.tertiary_year_graduated, public_user_educational_background.tertiary_course, public_user_educational_background.tertiary_is_undergrad, public_user_educational_background.tertiary_last_year_attended,
                public_user_educational_background.graduate_studies_school_name, public_user_educational_background.graduate_studies_year_graduated, public_user_educational_background.graduate_studies_course, public_user_educational_background.graduate_studies_is_undergrad, public_user_educational_background.graduate_studies_last_year_attended
                ", 
                $where_condition, 
                [
                    ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"],
                    ["public_user_info", "public_user_info.user_id = job_applications.applicant_id", "inner"],
                    ["public_user_misc_info", "public_user_misc_info.user_id = job_applications.applicant_id", "left"],
                    ["public_user_educational_background", "public_user_educational_background.user_id = job_applications.applicant_id", "left"],
                    ["users", "users.id = job_applications.applicant_id", "inner"],
                    ["refbrgy", "refbrgy.id = public_user_info.barangay_id", "left"],
                    ["refcitymun", "refcitymun.citymunCode = refbrgy.citymunCode", "left"],
                    ["refprovince", "refprovince.provCode = refcitymun.provCode", "left"],
                ]);
            // return $builder->getCompiledSelect();
            return DataTable::of($builder)->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function approveApplicants($job_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $ids = $this->request->getPost();
            foreach ($ids as $key => $id) {
                $result = $master_model->update("job_applications", ["application_status"=>1], ["job_post_id"=>$job_id, "id"=>$id]);
                if(!$result["status"]){
                    return $result;
                }
            }
            return json_encode(["status"=>1, "result"=>"Applicant application(s) approved"]);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function declineApplicants($job_id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $ids = $this->request->getPost();
            foreach ($ids as $key => $id) {
                $result = $master_model->update("job_applications", ["application_status"=>2, "is_hired"=>0], ["job_post_id"=>$job_id, "id"=>$id]);
                if(!$result["status"]){
                    return $result;
                }
            }
            return json_encode(["status"=>1, "result"=>"Applicant application(s) declined"]);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    private function approveApplicationEmail($name, $job_title, $company_name){
        return '
        <div style="padding:0;margin:0;height:100%;width:100%;font-family: Open Sans,Helvetica, Arial,sans-serif; ">
            <div
                style="border-radius: 5px; margin:0 auto;max-width:600px;display:block;font-family:inherit; background-color: #2966b1; color: white; text-align: center; padding-bottom: 30px;">
        
                <img src="https://lh3.googleusercontent.com/pw/AMWts8D_FGdEDQzuEq4At0UcGz_ihpWgkBErIwlP76J58S855F4INE9bBCJgQIeACq10u3Kh4btgu-inx_lPxwpjSWlmJHotGVwo-PZlSPzw0BLra0HP6a0=w2400"
                    alt="" srcset="" style=" width: 101%; margin: -5px -0.5%;">
        
        
                <div style=" margin-top: 10px; font-family:inherit;font-size:22px;font-weight:700;line-height:22px;">
                    Application Accepted
                </div>
        
                <p style="margin-left: 25px;margin-right: 25px; text-align: start;">
                    Good day '.$name.',<br>
                    First of all, we really appreciate your interest in our job posting. Regrettably, we received a large volume of applicants and we have decided to move forward with other applicants at this time. 
                    We encourage you to apply for other positions. You can visit our official Facebook Page (PESO Baliwag) for the latest job postings, local recruitment activities, or updates.
                    If you have any questions, you may call us at 0997-136-9180.<br>
                    Thank you!
                </p>
        
        
            </div>
            <small style="color: #888; text-align: center; display: block; margin-top: 10px; ">
                If you did not apply for this job or if you\'re not even registered on this website, please kindly inform us on baliwag.gov.ph
            </small>
        </div>
        ';
    }

    private function declineApplicationEmail($name, $job_title, $company_name){
        return 'REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE';
    }
    
    public function updateHiredApplicant(){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $result = $master_model->update("job_applications", $data, ["id"=>$data["id"]]);
            if(!$result["status"]){
                return $result;
            }
            $hire_statuses = ["pending", "not hired", "hired"];
            $hire_status = $hire_statuses[$data["is_hired"]];

            return json_encode(["status"=>1, "result"=>"Applicant status set to ".$hire_status]);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function jobApplicantsSearchDataTable($job_title = "0", $company_name = "0")
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $where_condition = "job_applications.application_status <> 3";
            $job_title_condition = "(job_title LIKE '%".$job_title."%')";
            $company_name_condition = "(company_name LIKE '%".$company_name."%')";
            if(!($job_title == 0) && !($company_name == 0)){
                $where_condition = $where_condition . " AND " . $job_title_condition . " AND " . $company_name_condition;
            }elseif(!($job_title == 0)){
                $where_condition = $where_condition . " AND " . $job_title_condition;
            }elseif(!($company_name == 0)){
                $where_condition = $where_condition . " AND " . $company_name_condition;
            }


            $builder = $master_model->getDataTables("job_applications", 
                "
                job_applications.id, job_applications.application_status, job_applications.created_at, 
                users.email, 
                public_user_info.firstname, public_user_info.middlename, public_user_info.lastname, public_user_info.suffix, public_user_info.user_photo,
                job_posts.id AS job_posts_id, job_posts.job_title, job_posts.company_name, job_posts.company_address,
                ", 
                $where_condition, 
                [
                    ["job_posts", "job_posts.id = job_applications.job_post_id", "inner"],
                    ["public_user_info", "public_user_info.user_id = job_applications.applicant_id", "inner"],
                    ["users", "users.id = job_applications.applicant_id", "inner"]
                ]);
            return DataTable::of($builder)->toJson(true);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
}
?>