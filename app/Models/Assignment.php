<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory,SoftDeletes;

    public function commander(){
        return $this->belongsTo(Police::class,'commander_id');
    }

    public function patrol(){
        return $this->belongsTo(Police::class,'patrol_id');
    }

    public function redBox(){
        return $this->belongsTo(RedBox::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
