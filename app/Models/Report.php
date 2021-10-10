<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;

    public function assignment(){
        return $this->belongsTo(Assignment::class);
    }

    public function redBox(){
        return $this->belongsTo(RedBox::class);
    }
}
