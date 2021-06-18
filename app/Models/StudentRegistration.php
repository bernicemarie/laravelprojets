<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;
     public function registration_relation_classe(){
        return $this->belongsTo(StudentClass::class,'class_id','id');

    }
     public function registration_relation_year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    } 
    public function registration_relation_discount(){
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
     public function registration_relation_user(){
        return $this->belongsTo(User::class,'student_id','id');
    }
}
