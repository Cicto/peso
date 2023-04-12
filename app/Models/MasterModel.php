<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;


class MasterModel
{

    public function __construct()
    {
        $this->db = db_connect();
    }

    //  ******************************************************  SELECT QUERY START *************************************************//
 

    public function get($dbName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {
        $builder = $this->db->table($dbName);
        if($selectData=="*"){
            $builder->select();
        }else{
            $builder->select($selectData);
        }
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $whereConditions = $builder->db->escape($whereConditions);
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        try {
            $fetched = $builder->get()->getResult();
            if($fetched != NULL)
            {
                return ['status' => 1, 'result' => $fetched];
            }
            else
            {
                return ['status' => 0, 'result' => 'No data found!'];
            }

        } catch (\mysqli_sql_exception $e) {
            return ['status' => 0, 'error'=> true, 'result' => $e->getMessage()];
        }
    }

    public function getDataTables($dbName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {
        $builder = $this->db->table($dbName);
        if($selectData=="*"){
            $builder->select();
        }else{
            $builder->select($selectData);
        }
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        return $builder;
    }

    public function printGet($dbName, $selectData, $whereConditions=[], $joinConditions=FALSE, $orderBy=FALSE, $limit=FALSE)
    {
        $builder = $this->db->table($dbName);
        $builder->select($selectData);
        if($joinConditions != FALSE)
        {
            foreach ($joinConditions as $join){$builder->join($join[0], $join[1], $join[2]);}
        }
        $builder->where($whereConditions);
        ($orderBy != FALSE) ? $builder->orderBy($orderBy): NULL;
        ($limit != FALSE) ? $builder->limit($limit): NULL;

        try {
            $fetched = $builder->getCompiledSelect();
            return ['status' => 1, 'result' => $fetched];

        } catch (\mysqli_sql_exception $e) {
            return ['status' => 0, 'error' => true, 'result' => $e->getMessage()];
        }
    }

    //  ******************************************************  SELECT QUERY END ***************************************************//

    //  ******************************************************  ADD QUERY START ***************************************************//

    public function insert($tableName, $data)
    {
        $builder = $this->db->table($tableName);

        try{
            $result = $builder->insert($data);

            if($result)
            {
                return ['status' => 1, 'result' => "Record successfully added","id" => $this->db->insertID()];
            }
            return ['status' => 0, 'error' => TRUE, 'result' => "Something went wrong"];
        }
        catch(\mysqli_sql_exception $e)
        {
            
            return ['status' => 0, 'error' => TRUE, 'result' => $e->getMessage()];
        }
    }


    //  ******************************************************  ADD QUERY END ***************************************************//


    //  ******************************************************  UPDATE QUERY START ***************************************************//

    public function update($tableName, $data, $whereConditions=[])
    {
        $builder = $this->db->table($tableName);

        try{
            $result = $builder->update($data, $whereConditions);

            if($result){
                return ['status' => 1, 'result' => "Record successfully updated" ,'rows_updated' => $this->db->affectedRows()];
            }else{
                return ['status' => 0, 'error' => TRUE, 'result' => "Something went wrong"];
            }
        }catch (\mysqli_sql_exception $e){
            return ['status' => 0, 'error' => TRUE, 'result' => $e->getMessage()];
        }
    }

    //  ******************************************************  UPDATE QUERY END ***************************************************//

    public function customQuery($query)
    {

        try
        {
            $fetched = $this->db->query($query);

            if($fetched)
            {
                return ['status' => 1, 'result' => $fetched->getResult()];
            }
        }
        catch (\mysqli_sql_exception $e)
        {
            return ['status' => 0, 'error' => true, 'result' => $e->getMessage()];
        }
    }

    public function delete($tableName, $whereConditions)
    {
        $builder = $this->db->table($tableName);
        $builder->where($whereConditions);
        $builder->delete();
        
    }
}