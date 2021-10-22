<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Police extends Model
{
    use HasFactory,SoftDeletes;

    public static $police_rank = ['General', 'Lieutenant General', 'Major General', 'Colonel','Lieutenant Colonel',
                                    'Major', 'Captain','Lieutenant','Sub-Lieutenant','Senior Sergeant Major','Sergeant Major',
                                    'Sergeant','Corporal','Lance Corporal'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function assigned_assignments(){
        return $this->hasMany(Assignment::class,'patrol_id');
    }

    public function assign_to_assignments(){
        return $this->hasMany(Assignment::class,'commander_id');
    }
}
