<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\BaseBuilder;

class UsersModel
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    //  ******************************************************  SELECT QUERY START *************************************************//
    public function getUsers()
    {
        return $this->db->table('users')
                ->select('email, username, IF(active=0, "Active", "Not Activated") AS status')
                ->get()
                ->getResult();
    }

    public function getSpecificUser($user_id)
    {
        return $this->db->table('users')
                ->select('users.id, users.email,users.username, user_info.firstname, user_info.middlename, user_info.lastname, user_info.birthdate, user_info.role, user_info.dept_id, users.active, users.status')
                ->join('user_info', 'user_info.user_id = users.id', 'left')
                ->where(['user_id' => $user_id])
                ->get()
                ->getRow();
    }

    public function getUsersDataTables()
    {
        return $this->db->table('users')
                ->select('users.id, users.email, users.username, user_info.firstname, user_info.lastname, user_info.user_photo, users.active, users.status')
                ->join('user_info', 'user_info.user_id = users.id', 'left');
    }

    public function getAll($dbName)
    {
        return $this->db->table($dbName)->get()->getResult();
    }

    public function getWhere($dbName, $whereConditions)
    {
        return $this->db->table($dbName)
                        ->where($whereConditions)
                        ->get()
                        ->getResult();
    }

    //  ******************************************************  SELECT QUERY END ***************************************************//


    //  ******************************************************  ADD QUERY START ***************************************************//

    public function addUserData($tableName, $data)
    {
        $builder = $this->db->table($tableName);

        try{
            if($builder->insert($data))
            {
                return $this->db->insertID();
            }
        }
        catch(\mysqli_sql_exception $e)
        {
            return $e->getMessage();
        }
    }

    public function updateUserData($tableName, $data, $whereConditions)
    {
        $builder = $this->db->table($tableName);
        // $builder->where($whereConditions);
        // $builder->set($data);

        try
        {
            if($builder->update($data, $whereConditions))
            {
                return $this->db->affectedRows();
            }
        } catch (\mysqli_sql_exception $e)
        {
            return $e->getMessage();
        }
    }

    public function updateAccountPassword($id, $new_password){
        $db = db_connect();
        $builder = $db->table('users');
        $user_data = [
            'password_hash' => $new_password,
        ];
        $builder->set($user_data);
        $builder->where('id', $id);
        $dataUpdate = $builder->update();
        $db->close();
        return $dataUpdate;
    }

    //  ******************************************************  ADD QUERY END ***************************************************//
}