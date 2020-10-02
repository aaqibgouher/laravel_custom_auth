<?php

namespace App\Http\Controllers;

use App\Utils\Auth;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        // $data["user"] = Auth::token();
        $categories = Category::self()->with("todos")->get();
        $data["categories"] = $categories;
        // $todos_raw = Todo::self()->with("category")->get();
        // $data["todos"] = Todo::format_for_home_page($todos_raw);
        // echo json_encode($data);die;
        
        return view("home", $data);
    }
}
