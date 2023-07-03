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
                    'public_user_misc_info',
                    'public_user_misc_info.user_id = users.id',
                    'left',
                ],
                [
                    'public_user_educational_background',
                    'public_user_educational_background.user_id = users.id',
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
            $result = $fetched['result'][0];
            $result->user_id = $userId;
            return $result;
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


    public static function roles($user_id=false)
    {
        $masterModel = new MasterModel();

        if($user_id){
            $fetched = $masterModel->get(
                'users', 
                'role', 
                [
                    'deleted_at' => NULL,
                    'id' => $user_id
                ]
            );
        }else{
            $fetched = $masterModel->get( 'auth_groups', '*');
        }
        return $fetched;
    }

    public static function defaultPassword()
    {
        return '123baliwag123';
    }
}