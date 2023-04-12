<?php

namespace App\Controllers;
use App\Controllers\UtilController;
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
        $this->userInformation = TemplateLib::userInformation(user_id());
        $this->departments = TemplateLib::departments();
        $this->roles = TemplateLib::roles();

    }

    public function index()
    {   
        
        $view_data = [
            'title' => 'User List',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => ($this->roles['status']) ? $this->roles['result'] : FALSE
        ];

        return view('users/users', $view_data);
    }

    public function resume(){
        $view_data = [
            'title' => 'User List',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => ($this->roles['status']) ? $this->roles['result'] : FALSE
        ];
        return view('users/resume', $view_data);
    }

    public function profile_validation(){
        $view_data = [
            'title' => 'Profile Validation',
            'userInformation' => $this->userInformation,
            'departments' => ($this->departments['status']) ? $this->departments['result'] : FALSE,
            'roles' => ($this->roles['status']) ? $this->roles['result'] : FALSE,
            'is_validated' => $this->userInformation->is_validated,
        ];

        return view('users/validateProfile', $view_data);
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
                    'dept_id' => $this->request->getPost('dept_id'),
                    'role' => $this->request->getPost('role'),
                ];

                $insertUserInfo = $usersModel->addUserData('user_info', $userInfo);

                if(is_int($insertUserInfo))
                {
                    return json_encode([
                        'success' => $insertUserInfo,
                        'success_message' => 'Successfully Inserted!'
                    ]);
                }
                else
                {
                    return json_encode([
                        'error' => true,
                        'error_message' => $insertUserInfo
                    ]);
                }

            }
            else
            {
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
            ];

            $whereConditions = [
                'id' => $this->request->getPost('id')
            ];

            $update = $usersModel->updateUserData('users', $users, $whereConditions);

            if(is_int($update) > 0)
            {
                $userInfo = $_POST;
                $table_name = 'user_info';
                $user_role = UtilController::getUserRole($this->request->getPost(isset($_POST['id']) ? 'id' : 'user_id' ));
                if($user_role){
                    if($user_role==3){
                        $table_name = 'public_user_info';
                    }
                }else{
                    return json_encode([
                        'error' => true,
                        'error_message' => 'Something went wrong'
                    ]);
                }

                if($this->request->getPost('role')){
                    $userInfo['role'] = $this->request->getPost('role');
                }

                
                $userInfo["user_id"] = isset($_POST['id']) ? $_POST['id'] : $_POST['user_id'] ;
                
                $whereConditions = [
                    'user_id' => $userInfo["user_id"]
                ];

                $removeFields = ['id', 'email', 'username'];
                $userInfo = array_diff_key($userInfo, array_flip($removeFields));
                
                $updateUserInfo = $usersModel->updateUserData($table_name, $userInfo, $whereConditions);

                if(is_int($updateUserInfo) > 0)
                {
                    return json_encode([
                        'success' => $updateUserInfo,
                        'success_message' => 'Successfully Updated!',
                        'user_info' => $userInfo,
                        'role' => UtilController::getUserRole($this->request->getPost(isset($_POST['id']) ? 'id' : 'user_id' ))
                    ]);
                }
                else
                {
                    return json_encode([
                        'error' => true,
                        'error_message' => $updateUserInfo
                    ]);
                }

            }
            else
            {
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
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is banned!'
                ]);
            }
            else
            {
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
                return json_encode([
                    'success' => $banned,
                    'success_message' => 'User is unbanned!'
                ]);
            }
            else
            {
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
                return json_encode([
                    'success' => $update,
                    'success_message' => 'Updated to default password!'
                ]);
            }
            else
            {
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
                return json_encode([
                    'success' => $update,
                    'success_message' => ($this->request->getPost('status') == 'activate') ? 'User Activated!' : 'User Deactivated!',
                ]);
            }
            else
            {
                return json_encode([
                    'error' => true,
                    'error_message' => $update
                ]);
            }
        }
    }

    public function changePassword()
    {
        $view_data = [
            'title' => 'Change Password',
            'userInformation' => TemplateLib::userInformation(user_id())
        ];

        return view('users/changePassword', $view_data);
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
                        return json_encode([
                            'success' => $update,
                            'success_message' => 'Password Updated!'
                        ]);
                    }
                    else
                    {
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
            return json_encode([
                "id"=>$id,
                "filename"=>$filename,
                "result"=>$result
            ]);
        }
    }

    public function authenticateUser(){
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

    public function updateAccountPassword($id){
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
            $data["created_at"] = date("Y-m-d h:i:s");
            $data["with_drivers_license"] = isset($data["with_drivers_license"]) ? 1 : 0;
            $result = $master_model->insert("public_user_info", $data);
            return $result;
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updateUserResume($id){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $data["updated_at"] = date("Y-m-d h:i:s");
            $result = $master_model->update("public_user_info", $data, ["user_id"=>$id]);
            return $result;
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function updatePublicUserInfo(){
        if($this->request->isAJAX()){
            $master_model = new MasterModel();
            $data = $_POST;
            $user_id = $data["user_id"];
            $data["updated_at"] = date("Y-m-d h:i:s");
            $data["with_drivers_license"] = isset($data["with_drivers_license"]) ? 1 : 0;
            $result = $master_model->update("public_user_info", $data, ["user_id"=>$user_id]);
            return json_encode($result);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function uploadUserIDs(){
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
}
