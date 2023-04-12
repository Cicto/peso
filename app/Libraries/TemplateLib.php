<?php

namespace App\Libraries;
use App\Models\MasterModel;

class TemplateLib
{
    public static function userInformation($userId)
    {
        $masterModel = new MasterModel();

        $joins = [
            [
                'user_info',
                'user_info.user_id = users.id',
                'inner',
            ]
        ];

        $fetched = $masterModel->get(
            'users', //tableName
            'user_id, firstname, middlename, lastname, email, username, user_photo, users.role, birthdate', //select field
            [
                'user_info.user_id' => $userId
            ], //where conditions
            $joins, // join Conditions
            FALSE,
            FALSE
        );

        // return $fetched;
        // print_r($fetched);
        if($fetched['status']){
            // var_dump($fetched['result'][0]);
            return $fetched['result'][0];
        }else{
            $joins = [
                [
                    'public_user_info',
                    'public_user_info.user_id = users.id',
                    'left',
                ],
                [
                    'refbrgy',
                    'refbrgy.id = public_user_info.barangay_id',
                    'left',
                ],
                [
                    'refcitymun',
                    'refcitymun.citymunCode = refbrgy.citymunCode',
                    'left',
                ],
                [
                    'refprovince',
                    'refprovince.provCode = refcitymun.provCode',
                    'left',
                ]
            ];
    
            $fetched = $masterModel->get(
                'users', //tableName
                '*', //select field
                [
                    'users.id' => $userId
                ], //where conditions
                $joins, // join Conditions
                FALSE,
                FALSE
            );
            return $fetched['result'][0];
        }
    }

    public static function departments()
    {
        $masterModel = new MasterModel();

        $fetched = $masterModel->get(
            'departments', //tableName
            'dept_id, dept_alias, department_name', //select field
            [
                'is_deleted' => 0
            ], //where conditions,
            FALSE,
            'dept_id ASC',
            FALSE
        );

        return $fetched;
    }

    public static function roles()
    {
        $masterModel = new MasterModel();

        $fetched = $masterModel->get(
            'roles', //tableName
            'role_id, role_description', //select field
            [
                'deleted_at' => NULL
            ], //where conditions,
            FALSE,
            'role_id ASC',
            FALSE
        );

        // var_dump($fetched[]);
        return $fetched;
    }

    public static function defaultPassword()
    {
        return '123baliwag123';
    }
}