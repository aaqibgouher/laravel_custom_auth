<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Validator;
class TodoController extends Controller
{
    public function add(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $validator = Validator::make($request->all(),[
                    "category" => "required|max:10",
                    "todo_name" => "required|max:500",
                    "order" => "nullable|numeric|min:0"
                ]);

                // echo json_encode($validator->errors()->first());die;   

                if($validator->fails()){
                    throw new Exception ($validator->errors()->first());
                }

                $todo_name = trim($request->input("todo_name"));
                $todo_order = trim($request->input("order"));

                $todo = new Todo();
                $todo->user_id = Auth::id();
                $todo->category_id = ;
                $todo->todo_name = $todo_name;
                $todo->order = $todo_order ? $todo_order : 0;
                $todo->save();
                
                

                return redirect(route("home"));
            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }

        return view("add_todo",$data);
    }
}
