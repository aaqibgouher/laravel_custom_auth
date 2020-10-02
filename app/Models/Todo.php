<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function todo(){
        return $this->belongsTo();
    }

    public function scopeSelf($query){
        return $query->where();
    }
}
