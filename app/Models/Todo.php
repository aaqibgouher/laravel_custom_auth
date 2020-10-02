<?php

namespace App\Models;

use App\Utils\Auth;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeSelf($query){
        return $query->where("user_id", Auth::id());
    }

    public static function format_for_home_page($todos = []){
        $results = [];

        foreach($todos as $todo){
            $results[$todo->category_id]["category_id"] = $todo->category_id;
            $results[$todo->category_id]["category_name"] = $todo->category->category_name;
            $results[$todo->category_id]["category_order"] = $todo->category->order;
            $results[$todo->category_id]["children"][] = $todo;
            // echo json_encode($results);die;
        }
        $results = array_values($results);
        // echo json_encode($results);die;

        return $results;
    }
}
