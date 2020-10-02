<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Utils\Auth;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function add(Request $request, $category_id = null){
        $data = [];
        $data["category_id"] = $category_id;
        $data["categories"] = Category::self()->get();
        $data["error"] = "";

        if($category_id){
            $category = Category::self()->where("id", $category_id)->first();
            if(!$category) $data["error"] = "Category not found";
        }

        if($request->isMethod("post")){
            try{
                $validator = Validator::make($request->all(),[
                    "category_id" => "required|integer",
                    "todo_name" => "required|max:500",
                    "order" => "nullable|numeric|min:0"
                ]);

                // echo json_encode($validator->errors()->first());die;   

                if($validator->fails()){
                    throw new Exception ($validator->errors()->first());
                }

                $category_id = trim($request->input("category_id"));
                $todo_name = trim($request->input("todo_name"));
                $todo_order = trim($request->input("order"));

                $todo = new Todo();
                $todo->user_id = Auth::id();
                $todo->category_id = $category_id;
                $todo->todo_name = $todo_name;
                $todo->order = $todo_order ? $todo_order : 0;
                $todo->save();
                
                return redirect(route("home"));
            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }

        return view("add_todo", $data);
    }
}
