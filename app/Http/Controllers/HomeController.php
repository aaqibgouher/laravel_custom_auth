<?php

namespace App\Http\Controllers;

use App\Utils\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data["user"] = Auth::token();
        return view("home", $data);
    }
}
