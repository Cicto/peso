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
                
                $view_data = [
                    'title' => 'Welcome, '.$this->userInformation->firstname.' '.$this->userInformation->lastname,
                    'userInformation' => $this->userInformation,
                    'user_id' => user_id()
                ];
        
                return view('dashboards/sysAdmin', $view_data);
                break;

            case '2': // User
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
        if($this->userInformation->role==2){
            $masterModel = new MasterModel();

            $view_data = [
                'title' => 'My Profile',
                'userInformation' => $this->userInformation,
                'userBarangaysCitiesAndProvinces' => json_decode(UtilController::userBarangaysCitiesAndProvinces($this->userInformation->barangay_id)),
                'is_loggedin' => logged_in()
            ];
            return view('users/editProfile', $view_data);
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function resume(){
        if($this->userInformation->role==2){
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
