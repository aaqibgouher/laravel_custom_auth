<?php

namespace App\Models;

use App\Utils\Auth;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function todos(){
        return $this->hasMany(Todo::class);
    }

    public function scopeSelf($query){
        return $query->where("user_id", Auth::id());
    }
}
