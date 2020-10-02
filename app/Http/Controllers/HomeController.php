<?php

namespace App\Http\Controllers;

use App\Utils\Auth;
use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data["user"] = Auth::token();
        $data["categories"] = Todo::self()->with("todo")->get();
        echo json_encode($data);die;
        
        return view("home", $data);
    }
}
