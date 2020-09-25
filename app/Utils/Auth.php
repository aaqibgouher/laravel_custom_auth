<?php

namespace App\Utils;

use App\Models\User;
use App\Models\UserToken;

class Auth{
    public static function user(){
        $user_id = UserToken::get_user_id_by_token(static::token());
        return User::find($user_id);
    }

    public static function token(){
        return session()->get("token");
    }

    public static function id(){
        return UserToken::get_user_id_by_token(static::token());
    }
}