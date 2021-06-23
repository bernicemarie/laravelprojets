<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
     public function registration_relation_user(){
        return $this->belongsTo(User::class,'student_id','id');
    } 
}
