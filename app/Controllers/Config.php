<?php

namespace App\Controllers;
use App\Models\MasterModel;
use Myth\Auth\Entities\User;
use App\Libraries\BaliwagCity;
use Hermawan\DataTables\DataTable;

class Config extends BaseController
{
    public function __construct()
    {
        helper('auth');

        // (!logged_in() ? redirect()->route('login') : FALSE);

    }

    public function index()
    {
        $masterModel = new MasterModel();

        $view_data = [
            'title' => 'Technical Issues',
            'userInformation' => BaliwagCity::userInformation(user_id()),
            'departments' => BaliwagCity::departments(),
            'tectStaff' => $masterModel->getWhere('user_info', 'firstname, lastname', ['role' => 3, 'dept_id' => 5])
        ];

        return view('config/technicalIssues', $view_data);
    }

    /*********************************************************** TECHNICAL ISSUES SECTION START *********************************************/
    public function getTechIssueList()
    {
        $masterModel = new MasterModel();

        return DataTable::of($masterModel->getWhereDataTables('technical_issues', 'issue_id, issue_code, issue_description', ['deleted_at !=' => NULL]))
        ->add('action', function($row){
            // return '<button type="button" id = "edit-btn" class="btn btn-outline-primary btn-xs" data-id = "'.$row->id.'"><i class="fas fa-edit"></i></button>';
        })->toJson(true);
    }


    public function getTechIssueData($id)
    {
        $masterModel = new MasterModel();

        $data = $masterModel->getSpecificData('technical_issues', 'issue_id, issue_code, issue_description', ['issue_id' => $id]);

        if($data['status'])
        {
            return json_encode($data['result']);
        }
        else
        {
            return json_encode(['error' => true, 'error_message' => $data['result']]);
        }

    }

    public function addTechIssueData()
    {
        $masterModel = new MasterModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'issue_code' => $this->request->getPost('issue_code'),
                'issue_description' => $this->request->getPost('issue_description'),
            ];

            $whereConditions = [
                'issue_id' => $this->request->getPost('issue_id')
            ];

            $update = $masterModel->addData('technical_issues', $data);

            if($update > 0)
            {
                return json_encode([
                    'success' => $update,
                    'success_message' => 'Successfully Added!'
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

    public function updateTechIssueData()
    {
        $masterModel = new MasterModel();

        if ($this->request->isAJAX())
        {
            $data = [
                'issue_code' => $this->request->getPost('issue_code'),
                'issue_description' => $this->request->getPost('issue_description'),
            ];

            $whereConditions = [
                'issue_id' => $this->request->getPost('issue_id')
            ];

            $update = $masterModel->updateSpecificData('technical_issues', $data, $whereConditions);

            if($update > 0)
            {
                return json_encode([
                    'success' => $update,
                    'success_message' => 'Successfully Updated!'
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

    /*********************************************************** TECHNICAL ISSUES SECTION END *********************************************/
}