<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Utils\Auth;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function add(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{

                $validator = Validator::make($request->all(), [
                    "category_name" => "required|max:50",
                    "order" => "nullable|numeric|min:0"
                ]);
                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $category_name = trim($request->input("category_name"));
                $order = trim($request->input("order"));

                $category = Category::where("category_name",$category_name)->first();

                // echo json_encode($category);die; 

                if($category) throw new Exception("This category has already taken.");
            

                $category = new Category();
                $category->user_id = Auth::id();
                $category->category_name = $category_name;
                $category->order = $order ? $order : 0;
                $category->save();

                return redirect(route("home"));

            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }

        return view("add_category",$data);
        
    }
}
