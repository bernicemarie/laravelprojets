<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;
     public function class_group(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function school_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
