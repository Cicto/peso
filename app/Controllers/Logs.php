<?php

namespace App\Controllers;
use App\Models\MasterModel;
use App\Models\LogsModel;
use Myth\Auth\Entities\User;
use App\Libraries\TemplateLib;
use Hermawan\DataTables\DataTable;

class Logs extends BaseController
{
    public function __construct()
    {
        $this->userInformation = TemplateLib::userInformation(user_id());
    }

    public function index()
    {
        $masterModel = new MasterModel();

        LogsModel::GeneralLogs('system_logs',
            [
                'log_action' => "Visited Logs Module", 
                'log_data' => json_encode([   
                    "email" => $this->userInformation->email,
                    "ip_address" => $this->request->getIPAddress(),
                    "user_id" => user_id(),
                ]), 
                'user_id' => user_id(), 
                'log_actor' => $this->userInformation->firstname.' '. $this->userInformation->lastname,
            ]
        );

        $viewData = [
            'title' => 'Systems Logs',
            'userInformation' => $this->userInformation,
            
        ];

        return view('logs/logs', $viewData);
        // return view('applications/applications', $view_data);
    }

    public function getLogs()
    {
        $masterModel = new MasterModel();
        
        if($this->userInformation->role == 1 || $this->userInformation->role == 2)
        {
            return DataTable::of($masterModel->getDataTables('logs', 'log_id, log_action, log_actor, created_at', [], FALSE, 'log_id ASC', FALSE))
            ->add('action', function($row){
                // return '<button type="button" id = "edit-btn" class="btn btn-outline-primary btn-xs" data-id = "'.$row->id.'"><i class="fas fa-edit"></i></button>';
            })->toJson(true);
        }
        else
        {
            return DataTable::of($masterModel->getDataTables('logs', 'log_id, log_action, log_actor, created_at', ['user_id' => user_id()], FALSE, 'log_id ASC', FALSE))
            ->add('action', function($row){
                // return '<button type="button" id = "edit-btn" class="btn btn-outline-primary btn-xs" data-id = "'.$row->id.'"><i class="fas fa-edit"></i></button>';
            })->toJson(true);
        }
        
    }

    public static function log($action, $user_id, $data=[]){
        $user_id = $user_id ? $user_id : user_id();
        $master_model = new MasterModel();
        $result = $master_model->insert("logs", [
            "log_action"=>$action,
            "log_data"=>json_encode($data),
            "user_id"=>$user_id
        ]);
        return $result;
    }
}