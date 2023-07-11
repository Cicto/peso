<?php

namespace App\Controllers;
use App\Controllers\UtilController;
use App\Controllers\Logs;
use App\Models\UsersModel;
use App\Models\MasterModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use Hermawan\DataTables\DataTable;
use App\Libraries\TemplateLib;

class Users extends BaseController
{
    public function __construct()
    {   
        $template_lib = new TemplateLib();
        $this->userInformation = TemplateLib::userInformation(user_id());
        $this->departments = TemplateLib::departments();
        $this->roles = TemplateLib::roles();

    }

    public function index()
    {   
        if($this->roles['status']){
            $view_data = [
                'title' => 'User List',
                'user_id' => user_id(),
                'userInformation' => $this->userInformation,
                'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
                'roles' => $this->roles['result']
            ];
    
            return view('users/users', $view_data);
        }
        return redirect()->to(base_url("/home")); 
    }

    public function public_users()
    {   
        $view_data = [
            'title' => 'User List',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => $this->roles['result']
        ];

        return view('users/public-users', $view_data);
    }

    public function resume()
    {
        $view_data = [
            'title' => 'User List',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => ($this->roles['status']) ? $this->roles['result'] : FALSE
        ];
        return view('users/resume', $view_data);
    }

    public function profile_validation()
    {
        $view_data = [
            'title' => 'Profile Validation',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => ($this->roles['status']) ? $this->roles['result'] : FALSE,
            'is_validated' => $this->userInformation->is_validated,
        ];

        return view('users/validateProfile', $view_data);
    }

    public function export_applicants()
    {
        $applicantion_ids = [];
        foreach (func_get_args() as $param) {
            array_push($applicantion_ids, $param);
        }
        $this->db = db_connect();
        $builder = $this->db->table("job_applications")
            ->select("public_user_info.*, job_applications.created_at AS applied_on, users.email, refbrgy.brgyDesc, refcitymun.citymunDesc, refprovince.provDesc, public_user_misc_info.*, public_user_educational_background.*")
            ->join("public_user_info", "job_applications.applicant_id = public_user_info.user_id", "left")
            ->join("public_user_misc_info", "job_applications.applicant_id = public_user_misc_info.user_id", "left")
            ->join("public_user_educational_background", "job_applications.applicant_id = public_user_educational_background.user_id", "left")
            ->join("users", "users.id = public_user_info.user_id", "left")
            ->join("refbrgy", "refbrgy.id = public_user_info.barangay_id", "left")
            ->join("refcitymun", "refcitymun.citymunCode = refbrgy.citymunCode", "left")
            ->join("refprovince", "refprovince.provCode = refcitymun.provCode", "left")
            ->whereIn('job_applications.id', $applicantion_ids)
            ->where("job_applications.application_status <>", 3);
        $applicant_infos = $builder->get()->getResultArray();
        $view_data = [
            "applicants" => $applicant_infos,
            "userInformation" => $this->userInformation 
        ];
        return view('users/export-applicants', $view_data);
    }

    public function getSpecificUser($user_id)
    {
        $usersModel = new UsersModel();
        return json_encode($usersModel->getSpecificUser($user_id));
    }

    public function getUsers()
    {
        $usersModel = new UsersModel();

        return DataTable::of($usersModel->getUsersDataTables())
        ->add('action', function($row){
            // return '<button type="button" id = "edit-btn" class="btn btn-outline-primary btn-xs" data-id = "'.$row->id.'"><i class="fas fa-edit"></i></button>';
        })->toJson(true);
    }

    public function addUser()
    {
        $usersModel = new UsersModel();
        $masterModel = new MasterModel();

        if ($this->request->isAJAX())
        {
            $data = $this->request->getPost();
            if(!($data["email"] && $data["username"] && $data["role"] && $data["firstname"] && $data["lastname"] && $data["birthdate"])){
                return json_encode(['error' => true, "error_message"=>"Some required fields are not filled", "error"=>true]);
            }
            $getCount = $masterModel->get('user_info', 'COUNT(ui_id) as total', ['role' => 3]);
            $username = ((int)$getCount['result'][0]->total)+1;

            $users = [
                'email' => $this->request->getPost('email'),
                'username' => ($this->request->getPost('role') != 3) ? $this->request->getPost('username') : date('y').str_pad($username, 4, '0', STR_PAD_LEFT),
                'password_hash' => Password::hash(TemplateLib::defaultPassword()),
                'active' => 1
            ];

            $insert = $usersModel->addUserData('users', $users);

            if(is_int($insert))
            {
                $userInfo = [
                    'user_id' => $insert,
                    'firstname' => $this->request->getPost('firstname'),
                    'middlename' => $this->request->getPost('middlename'),
                    'lastname' => $this->request->getPost('lastname'),
                    'birthdate' => $this->request->getPost('birthdate'),
                    'role' => $this->request->getPost('role'),
                ];

                $insertUserInfo = $usersModel->addUserData('user_info', $userInfo);

                if(is_int($insertUserInfo))
                {
                    Logs::log("Added a new user", user_id(), $userInfo);
                    return json_encode([
                        'success' => $insertUserInfo,
                        'success_message' => 'Successfully Inserted!'
                    ]);
                }
                else
                {
                    Logs::log("Added a new user but other info are left out", user_id(), $userInfo);
                    return json_encode([
                        'error' => true,
                        'error_message' => $insertUserInfo
                    ]);
                }

            }
            else
            {
                Logs::log("Failed to add new user", user_id(), $users);
                return json_encode([
                    'error' => true,
                    'error_message' => $insert
                ]);
            }
        }
    }

    public function updateUser()
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $users = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'role' => $this->request->getPost('role'),
            ];

            $whereConditions = [
                'id' => $this->request->getPost('id')
            ];

            $update = $usersModel->updateUserData('users', $users, $whereConditions);

            if(is_int($update) > 0)
            {
                Logs::log("Updated user ~ ".$this->request->getPost('id'), user_id(), $users);
                return json_encode([
                    'success' => true,
                    'success_message' => 'User Info successully updated'
                ]);

            } else {
                Logs::log("Failed to update user ~ ".$this->request->getPost('id'), user_id(), $users);
                return json_encode([
                    'error' => true,
                    'error_message' => $update
                ]);
            }
        }

    }

    public function banUser($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'status' => 'banned',
                'status_message' => NULL,
            ];

            $banned = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($banned) > 0)
            {
                Logs::log("Banned user ~ ".$id, user_id(), $data);
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is banned!'
                ]);
            }
            else
            {
                Logs::log("Failed to ban user ~ ".$id, user_id(), $data);
                return json_encode([
                    'error' => true,
                    'error_message' => $banned
                ]);
            }
        }
    }

    public function unbanUser($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'status' => NULL,
                'status_message' => NULL,
            ];

            $banned = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($banned) > 0)
            {
                Logs::log("Unbanned user ~ ".$id, user_id(), $data);
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is unbanned!'
                ]);
            }
            else
            {
                Logs::log("Failed to unban user ~ ".$id, user_id(), $data);
                return json_encode([
                    'error' => true,
                    'error_message' => $banned
                ]);
            }
        }
    }

    public function resetUserPassword($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'password_hash' => Password::hash(TemplateLib::defaultPassword()),
            ];

            $update = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($update) > 0)
            {
                Logs::log("Reset user ~ ".$id." 's password to default", user_id(), ['id' => $id]);
                return json_encode([
                    'success' => $update,
                    'success_message' => 'Updated to default password!'
                ]);
            }
            else
            {
                Logs::log("Failed to reset user ~ ".$id." 's password", user_id(), ['id' => $id]);
                return json_encode([
                    'error' => true,
                    'error_message' => $update
                ]);
            }
        }
    }

    public function userActivationStatus($id)
    {
        $usersModel = new UsersModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'active' => ($this->request->getPost('status') == 'activate') ? 1 : 0,
            ];

            $update = $usersModel->updateUserData('users', $data, ['id' => $id]);

            if(is_int($update) > 0)
            {
                Logs::log("Activated user ~ ".$id." 's account", user_id(), ['id' => $id, 'active' => ($this->request->getPost('status') == 'activate') ? 1 : 0,]);
                return json_encode([
                    'success' => $update,
                    'success_message' => ($this->request->getPost('status') == 'activate') ? 'User Activated!' : 'User Deactivated!',
                ]);
            }
            else
            {
                Logs::log("Failed to activate user ~ ".$id." 's account", user_id(), ['id' => $id, 'active' => ($this->request->getPost('status') == 'activate') ? 1 : 0,]);
                return json_encode([
                    'error' => true,
                    'error_message' => $update
                ]);
            }
        }
    }

    public function changeUserPassword()
    {
        $usersModel = new UsersModel();
        $errors = \Config\Services::validation()->getErrors();
        $error_cont = '';

        if ($this->request->isAJAX())
        {
            $rules = [
                'old_password' => [
                    'rules' => 'required|oldPasswordCheck',
                    'label' => 'Old Password',
                    'errors' => [
                        'oldPasswordCheck' => 'OLD PASSWORD does not match to CURRENT PASSWORD'
                    ]
                ],
                'new_password' => [
                    'rules' => 'required|min_length[8]',
                    'label' => 'New Password',

                ],
                'confirm_new_password' => [
                    'rules' => 'required|min_length[8]',
                    'label' => 'Confirm New Password',

                ]
            ];

            if($this->validate($rules))
            {
                if($this->request->getPost('new_password') === $this->request->getPost('confirm_new_password'))
                {
                    $data = [
                        'password_hash' => Password::hash($this->request->getPost('new_password')),
                    ];

                    $update = $usersModel->updateUserData('users', $data, ['id' => user_id()]);

                    if(is_int($update) > 0)
                    {
                        Logs::log("Updated user ~ ".user_id()." 's own password", user_id(), ['id' => user_id()]);
                        return json_encode([
                            'success' => $update,
                            'success_message' => 'Password Updated!'
                        ]);
                    }
                    else
                    {
                        Logs::log("Failed to update user ~ ".user_id()." 's own password", user_id(), ['id' => user_id()]);
                        return json_encode([
                            'error' => true,
                            'error_message' => $update
                        ]);
                    }
                }
                else
                {
                    $error_cont .= '- New Password and Confirm New Password did not match<br>';
                }
            }
            else
            {
                $errors = \Config\Services::validation()->getErrors();

                foreach ($errors as $error) {
                    $error_cont .= '-'.$error.'<br>';
                }
                Logs::log("Failed to update user ~ ".user_id()." 's own password", user_id(), ['error_message' => $error_cont]);
                return json_encode(
                    [
                        'error' => true,
                        'error_message' => $error_cont
                    ]
                );
            }
        }
    }

    public function updateUserPhoto($id, $filename)
    {
        $masterModel = new MasterModel();
        if ($this->request->isAJAX()){
            $table_name = "user_info";
            if( $this->userInformation->role == 3 ){
                $table_name = "public_user_info";
            }
            
            $result = $masterModel->update($table_name, ["user_photo"=>$filename], ["user_id"=>$id]);
            if($result["status"]){
                Logs::log("Updated user ~ ".user_id()." 's own photo", user_id(), [ "id"=>$id, "filename"=>$filename ]);
            }else{
                Logs::log("Failed to update user ~ ".user_id()." 's own photo", user_id(), [ "id"=>$id, "filename"=>$filename ]);
            }
            return json_encode([
                "id"=>$id,
                "filename"=>$filename,
                "result"=>$result
            ]);
        }
    }

    public function authenticateUser()
    {
        if(logged_in()){
            $authen = service('authentication');
            $credentials = [
                'email' => User()->getUserInfo()['email'],
                'password' => $_POST['password']
            ];
            $result = $authen->validate($credentials);
            echo $result;
            return $result;
        }
    }

    public function updateAccountPassword($id)
    {
        if($this->request->isAJAX()){
        $users_model = new UsersModel();
        $ok = true;
        if($_POST['new_password']!=$_POST['confirm_new_password']){
            $ok = false;
        }
        if(strlen($_POST['new_password'])<8 && strlen($_POST['confirm_new_password'])<8){
            $ok = false;
        }
        $new_password = Password::hash($_POST['new_password']);
        if($ok){
            echo ($users_model->updateAccountPassword($id, $new_password));
        }else{
            echo false;
        }
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function addPublicUserInfo()
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $public_user_info = [
                "user_id" => $data["user_id"],
                "firstname" => $data["firstname"],
                "middlename" => $data["middlename"],
                "lastname" => $data["lastname"],
                "suffix" => $data["suffix"],
                "sex" => $data["sex"],
                "birthdate" => $data["birthdate"],
                "birth_place_city_mun_id" => $data["birth_place_city_mun_id"],
                "civil_status" => $data["civil_status"],
                "house_number" => $data["house_number"],
                "street_name" => $data["street_name"],
                "barangay_id" => $data["barangay_id"],
                "religion" => $data["religion"],
                "contact_number" => $data["contact_number"]
            ];

            $public_user_misc_info = [
                "user_id" => $data["user_id"],
                "height" => $data["height"],
                "landline_number" => $data["landline_number"],
                "tin" => $data["tin"],
                "gsis_sss_no" => $data["gsis_sss_no"],
                "pag_ibig_no" => $data["pag_ibig_no"],
                "philhealth_no" => $data["philhealth_no"],
                "disability" => $data["disability"],
                "employment_status" => $data["employment_status"],
                "employment_type" => $data["employment_type"],
                "other_employment_type" => $data["other_employment_type"],
                "terminated_laidoff_abroad" => $data["terminated_laidoff_abroad"],
                "is_actively_looking" => $data["is_actively_looking"],
                "is_actively_looking_since" => $data["is_actively_looking_since"],
                "will_work_immediately" => $data["will_work_immediately"],
                "when_will_work_immediately" => $data["when_will_work_immediately"],
                "is_4ps_beneficiary" => $data["is_4ps_beneficiary"],
                "4ps_beneficiary_household_no" => $data["4ps_beneficiary_household_no"],
                "preferred_occupation" => $data["preferred_occupation"],
                "preferred_work_location_local" => $data["preferred_work_location_local"],
                "preferred_work_location_abroad" => $data["preferred_work_location_abroad"],
                "expected_salary" => $data["expected_salary"],
                "passport_no" => $data["passport_no"],
                "passport_expiry" => $data["passport_expiry"]
            ];

            $public_user_educational_background = [
                "user_id" => $data["user_id"],
                "elementary_school_name" => $data["elementary_school_name"],
                "elementary_is_undergrad" => $data["elementary_is_undergrad"],
                "elementary_year_graduated" => $data["elementary_year_graduated"],
                "elementary_last_level" => $data["elementary_last_level"],
                "elementary_last_year_attended" => $data["elementary_last_year_attended"],
                "elementary_award" => $data["elementary_award"],
                "secondary_school_name" => $data["secondary_school_name"],
                "secondary_is_undergrad" => $data["secondary_is_undergrad"],
                "secondary_year_graduated" => $data["secondary_year_graduated"],
                "secondary_last_level" => $data["secondary_last_level"],
                "secondary_last_year_attended" => $data["secondary_last_year_attended"],
                "secondary_award" => $data["secondary_award"],
                "tertiary_school_name" => $data["tertiary_school_name"],
                "tertiary_course" => $data["tertiary_course"],
                "tertiary_is_undergrad" => $data["tertiary_is_undergrad"],
                "tertiary_year_graduated" => $data["tertiary_year_graduated"],
                "tertiary_last_level" => $data["tertiary_last_level"],
                "tertiary_last_year_attended" => $data["tertiary_last_year_attended"],
                "tertiary_award" => $data["tertiary_award"],
                "graduate_studies_school_name" => $data["graduate_studies_school_name"],
                "graduate_studies_course" => $data["graduate_studies_course"],
                "graduate_studies_is_undergrad" => $data["graduate_studies_is_undergrad"],
                "graduate_studies_year_graduated" => $data["graduate_studies_year_graduated"],
                "graduate_studies_last_level" => $data["graduate_studies_last_level"],
                "graduate_studies_last_year_attended" => $data["graduate_studies_last_year_attended"],
                "graduate_studies_award" => $data["graduate_studies_award"],
                "language_dialect_proficiency" => $data["language_dialect_proficiency"],
                "technical_vocational_and_other_training" => $data["technical_vocational_and_other_training"],
                "eligibility" => $data["eligibility"],
                "professional_license" => $data["professional_license"],
                "work_experience" => $data["work_experience"],
                "other_skills_acquired_without_formal_training" => $data["other_skills_acquired_without_formal_training"]
            ];

            $user_id = $data["user_id"];
            $data["created_at"] = date("Y-m-d H:i:s");
            $public_user_info_result = $master_model->insert("public_user_info", $public_user_info);
            $public_user_misc_info = $master_model->insert("public_user_misc_info", $public_user_misc_info);
            $public_user_educational_background = $master_model->insert("public_user_educational_background", $public_user_educational_background);

            if($public_user_info_result["status"] && $public_user_misc_info["status"] && $public_user_educational_background["status"]){
                Logs::log("Added user ~ ".$user_id." 's other info", user_id(), $data);
            }else{
                Logs::log("Failed to add user ~ ".$user_id." 's other info", user_id(), $data);
            }

            return json_encode($public_user_info_result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateUserResume($id)
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $data["updated_at"] = date("Y-m-d H:i:s");
            $result = $master_model->update("public_user_info", $data, ["user_id"=>$id]);
            if($result["status"]){
                Logs::log("Updated user ~ ".user_id()." 's own resume", user_id(), $data);
            }else{
                Logs::log("Failed to update user ~ ".user_id()." 's own resume", user_id(), $data);
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updatePublicUserInfo()
    {
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $public_user_info = [
                "firstname" => $data["firstname"],
                "middlename" => $data["middlename"],
                "lastname" => $data["lastname"],
                "suffix" => $data["suffix"],
                "sex" => $data["sex"],
                "birthdate" => $data["birthdate"],
                "birth_place_city_mun_id" => $data["birth_place_city_mun_id"],
                "civil_status" => $data["civil_status"],
                "house_number" => $data["house_number"],
                "street_name" => $data["street_name"],
                "barangay_id" => $data["barangay_id"],
                "religion" => $data["religion"],
                "contact_number" => $data["contact_number"]
            ];

            $public_user_misc_info = [
                "height" => $data["height"],
                "landline_number" => $data["landline_number"],
                "tin" => $data["tin"],
                "gsis_sss_no" => $data["gsis_sss_no"],
                "pag_ibig_no" => $data["pag_ibig_no"],
                "philhealth_no" => $data["philhealth_no"],
                "disability" => $data["disability"],
                "employment_status" => $data["employment_status"],
                "employment_type" => $data["employment_type"],
                "other_employment_type" => $data["other_employment_type"],
                "terminated_laidoff_abroad" => $data["terminated_laidoff_abroad"],
                "is_actively_looking" => $data["is_actively_looking"],
                "is_actively_looking_since" => $data["is_actively_looking_since"],
                "will_work_immediately" => $data["will_work_immediately"],
                "when_will_work_immediately" => $data["when_will_work_immediately"],
                "is_4ps_beneficiary" => $data["is_4ps_beneficiary"],
                "4ps_beneficiary_household_no" => $data["4ps_beneficiary_household_no"],
                "preferred_occupation" => $data["preferred_occupation"],
                "preferred_work_location_local" => $data["preferred_work_location_local"],
                "preferred_work_location_abroad" => $data["preferred_work_location_abroad"],
                "expected_salary" => $data["expected_salary"],
                "passport_no" => $data["passport_no"],
                "passport_expiry" => $data["passport_expiry"]
            ];

            $public_user_educational_background = [
                "elementary_school_name" => $data["elementary_school_name"],
                "elementary_is_undergrad" => $data["elementary_is_undergrad"],
                "elementary_year_graduated" => $data["elementary_year_graduated"],
                "elementary_last_level" => $data["elementary_last_level"],
                "elementary_last_year_attended" => $data["elementary_last_year_attended"],
                "elementary_award" => $data["elementary_award"],
                "secondary_school_name" => $data["secondary_school_name"],
                "secondary_is_undergrad" => $data["secondary_is_undergrad"],
                "secondary_year_graduated" => $data["secondary_year_graduated"],
                "secondary_last_level" => $data["secondary_last_level"],
                "secondary_last_year_attended" => $data["secondary_last_year_attended"],
                "secondary_award" => $data["secondary_award"],
                "tertiary_school_name" => $data["tertiary_school_name"],
                "tertiary_course" => $data["tertiary_course"],
                "tertiary_is_undergrad" => $data["tertiary_is_undergrad"],
                "tertiary_year_graduated" => $data["tertiary_year_graduated"],
                "tertiary_last_level" => $data["tertiary_last_level"],
                "tertiary_last_year_attended" => $data["tertiary_last_year_attended"],
                "tertiary_award" => $data["tertiary_award"],
                "graduate_studies_school_name" => $data["graduate_studies_school_name"],
                "graduate_studies_course" => $data["graduate_studies_course"],
                "graduate_studies_is_undergrad" => $data["graduate_studies_is_undergrad"],
                "graduate_studies_year_graduated" => $data["graduate_studies_year_graduated"],
                "graduate_studies_last_level" => $data["graduate_studies_last_level"],
                "graduate_studies_last_year_attended" => $data["graduate_studies_last_year_attended"],
                "graduate_studies_award" => $data["graduate_studies_award"],
                "language_dialect_proficiency" => $data["language_dialect_proficiency"],
                "technical_vocational_and_other_training" => $data["technical_vocational_and_other_training"],
                "eligibility" => $data["eligibility"],
                "professional_license" => $data["professional_license"],
                "work_experience" => $data["work_experience"],
                "other_skills_acquired_without_formal_training" => $data["other_skills_acquired_without_formal_training"]
            ];

            $user_id = $data["user_id"];
            $data["updated_at"] = date("Y-m-d H:i:s");
            $public_user_info_result = $master_model->update("public_user_info", $public_user_info, ["user_id"=>$user_id]);
            $public_user_misc_info = $master_model->update("public_user_misc_info", $public_user_misc_info, ["user_id"=>$user_id]);
            $public_user_educational_background = $master_model->update("public_user_educational_background", $public_user_educational_background, ["user_id"=>$user_id]);

            if($public_user_info_result["status"] && $public_user_misc_info["status"] && $public_user_educational_background["status"]){
                Logs::log("Updated user ~ ".$user_id." 's other info", user_id(), $data);
            }else{
                Logs::log("Failed to update user ~ ".$user_id." 's other info", user_id(), $data);
            }
            return json_encode($public_user_info_result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function uploadUserIDs()
    {
        if ($this->request->isAJAX())
        {
            $util_controller = new UtilController();

            $id_data = [
                "id_back" => $this->request->getPost('id_back'),
                "id_front" => $this->request->getPost('id_front'),
                "id_selfie" => $this->request->getPost('id_selfie'),
            ];
            $result = TRUE;

            $util_controller->deleteFilesOn("public/assets/media/validations/temp/".$this->userInformation->user_id);

            foreach ($id_data as $key => $value) {
                $result = $util_controller->uploadImageTo(
                    $value,
                    "public/assets/media/validations/temp/".$this->userInformation->user_id,
                    $key,
                    "png"
                );

                if(!$result){break;}
            }

            if($result){
                $move_result = TRUE;
                foreach ($id_data as $key => $value) {
                    $move_result = $util_controller->moveFileTo(
                        "public/assets/media/validations/temp/".$this->userInformation->user_id,
                        "public/assets/media/validations/".$this->userInformation->user_id,
                        $key.".png"
                    );
                    
                    if(!$move_result){break;}
                }
    
                if($move_result){
                    $util_controller->deleteFilesOn("public/assets/media/validations/temp/".$this->userInformation->user_id, [], TRUE);
                    $masterModel = new MasterModel();
                    $update_result = $masterModel->update("public_user_info", ["is_validated"=>1], ["user_id"=>$this->userInformation->user_id]);
                    if($update_result){
                        return json_encode([
                            'success' => $id_data,
                            'success_message' => 'Successfully Applied for Profile Validation'
                        ]);
                    }else{
                        return json_encode([
                            'error' => true,
                            'error_message' => 'Something went wrong, try again later'
                        ]);
                    }
                }
            }else{
                return json_encode([
                    'error' => true,
                    'error_message' => 'Something went wrong, try again later'
                ]);
            }
        }
    }
    
    public function createUserNotification($user_id,  $description="", $link="#", $notification_icon="bell")
    {
        $master_model = new MasterModel();
        $data = [
            "user_id" => $user_id,
            "notification_icon" => $notification_icon,
            "description" => $description,
            "link" => $link,
            "created_at" => date("Y-m-d H:i:s")
        ];
        $result = $master_model->insert("user_notifications", $data);
        if($result["status"]){
            Logs::log("Notified user ~ ".$user_id, user_id(), $data);
        }else{
            Logs::log("Failed to notify user ~ ".$user_id, user_id(), $data);

        }
        return $result;
    }

    public function updateSeenNotification($user_id, $id=false)
    {
        $master_model = new MasterModel();
        $where = [
            "user_id"=>$user_id
        ];
        $data = [
            "is_seen" => 1
        ];
        if($id){
            $where["id"] = $id;
        }
        $result = $master_model->update("user_notifications", $data, $where);
        return $result;
    }

    public function getUserNotifications($user_id, $id=false)
    {
        $master_model = new MasterModel();
        $where = ["user_id"=>$user_id];
        if($id){
            $where["id"] = $id;
        }
        $result = $master_model->get("user_notifications", "*", $where, FALSE, "created_at DESC");
        return $result;
    }

    public function getPublicUsersDataTable(){
        if($this->request->isAJAX()){
        
            $master_model = new MasterModel();
        
            $builder = $master_model->getDataTables("users", 
            "
            users.id, users.email, users.username, users.active, users.status, users.created_at, 
            public_user_info.firstname, public_user_info.middlename, public_user_info.lastname, public_user_info.suffix, public_user_info.user_photo, 
            public_user_info.resume, public_user_info.sex, public_user_info.birthdate, public_user_info.contact_number, 
            public_user_info.house_number, public_user_info.street_name, refbrgy.brgyDesc, refcitymun.citymunDesc, refprovince.provDesc,
            public_user_misc_info.employment_status, public_user_misc_info.employment_type, public_user_misc_info.preferred_occupation, 
            public_user_educational_background.work_experience, public_user_educational_background.elementary_school_name, public_user_educational_background.elementary_year_graduated, public_user_educational_background.elementary_is_undergrad, public_user_educational_background.elementary_last_year_attended,
            public_user_educational_background.secondary_school_name, public_user_educational_background.secondary_year_graduated, public_user_educational_background.secondary_is_undergrad, public_user_educational_background.secondary_last_year_attended,
            public_user_educational_background.tertiary_school_name, public_user_educational_background.tertiary_year_graduated, public_user_educational_background.tertiary_course, public_user_educational_background.tertiary_is_undergrad, public_user_educational_background.tertiary_last_year_attended,
            public_user_educational_background.graduate_studies_school_name, public_user_educational_background.graduate_studies_year_graduated, public_user_educational_background.graduate_studies_course, public_user_educational_background.graduate_studies_is_undergrad, public_user_educational_background.graduate_studies_last_year_attended", 
        
            ["users.role"=>3], 
    
            [
                ["public_user_info", "public_user_info.user_id = users.id", "left"],
                ["public_user_misc_info", "public_user_misc_info.user_id = users.id", "left"],
                ["public_user_educational_background", "public_user_educational_background.user_id = users.id", "left"],
                ["refbrgy", "refbrgy.id = public_user_info.barangay_id", "left"],
                ["refcitymun", "refcitymun.citymunCode = refbrgy.citymunCode", "left"],
                ["refprovince", "refprovince.provCode = refcitymun.provCode", "left"]
            ]);
        
            // return $builder->getCompiledSelect();
            return DataTable::of($builder)->toJson(TRUE);
        
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateUserOwnAccount(){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $data["updated_at"] = date("Y-m-d H:i:s");

            $id = $data["id"];

            $email = $data["email"];
            $username = $data["username"];

            $firstname = $data["firstname"];
            $middlename = $data["middlename"];
            $lastname = $data["lastname"];
            $birthdate = $data["birthdate"];

            $email_check = $master_model->get("users", "*", ["email" => $email, "id <>"=>$id]);
            if($email_check["status"]){
                return json_encode(["status"=>0, "result"=>"Email already exist"]);
            }

            $user_check = $master_model->get("users", "*", ["username" => $username, "id <>"=>$id]);
            if($user_check["status"]){
                return json_encode(["status"=>0, "result"=>"Username already exist"]);
            }

            $result = $master_model->update("users", ["email"=>$email, "username"=>$username], ["id"=>$id]);
            if($result["status"]){
                $user_info_result = $master_model->update("user_info", ["firstname"=>$firstname,"middlename"=>$middlename,"lastname"=>$lastname,"birthdate"=>$birthdate], ["user_id"=>$id]);
                if($user_info_result["status"]){
                    Logs::log("Updated user ~ ".user_id()." 's own info", user_id(), $data);
                }else{
                    Logs::log("Failed to update all user ~ ".user_id()." 's own info", user_id(), $data);
                }
            }else{
                Logs::log("Failed to update user ~ ".user_id()." 's own info", user_id(), array_push($data, $result["result"]));
            }
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }
}
