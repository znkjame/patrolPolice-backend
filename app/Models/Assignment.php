<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory,SoftDeletes;

    protected $appends = ['commander_name', 'patrol_name', 'red_box_name'];

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

    public function getCommanderNameAttribute(){
        return  $this->commander->rank . " " . $this->commander->firstname . " ". $this->commander->lastname ;
    }

    public function getPatrolNameAttribute(){
        return $this->patrol->rank . " " . $this->patrol->firstname . " ". $this->patrol->lastname ;
    }

    public function getRedBoxNameAttribute(){
        return $this->redBox->name ;
    }
}
