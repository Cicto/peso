<?php

namespace App\Controllers;
use App\Models\MasterModel;
use Myth\Auth\Entities\User;
use App\Libraries\TemplateLib;
use Hermawan\DataTables\DataTable;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->userInformation = TemplateLib::userInformation(user_id());
    }

    public function index()
    {
        header("Location: ".base_url("dashboard"));
        die();
    }

}