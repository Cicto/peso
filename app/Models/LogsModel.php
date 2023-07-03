<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use \AllowDynamicProperties;

#[AllowDynamicProperties]
class LogsModel
{

    public function __construct()
    {
        
    }

    //  ******************************************************  SELECT QUERY START *************************************************//
    public static function GeneralLogs($dbName, $data)
    {
        $db = db_connect();
        $builder = $db->table($dbName);

        try{
            $builder->insert($data);

            if(is_int($db->insertID()) > 0)
            {
                return $db->insertID();
            }
        }
        catch(\mysqli_sql_exception $e)
        {
            return $e->getMessage();
        }
    }
}