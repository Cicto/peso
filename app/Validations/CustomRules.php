<?php

namespace App\Validations;
use App\Models\MasterModel;
use Myth\Auth\Password;

class CustomRules
{
    function oldPasswordCheck(string $str, ?string &$error = null) : bool
    {
        $checker =  Password::verify($str, user()->password_hash);

        if(!$checker)
        {
            return false;
        }

        return true;
    }

    function newPasswordComparison($newPassword, $confirmNewPassword)
    {

    }
}