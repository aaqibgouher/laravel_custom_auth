<?php

namespace App\Utils;

use Illuminate\Support\Str;

class Common{
    public static function generate_token(){
        return Str::random(20);
    }

    public static function now(){
        return date("Y-m-d H:i:s");
    }
}