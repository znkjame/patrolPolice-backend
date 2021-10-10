<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedBox extends Model
{
    use HasFactory,SoftDeletes;

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
