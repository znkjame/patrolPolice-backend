<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Police extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

//    public function assignments(){
//        return $this->hasMany(Assignment::class);
//    }
}
