<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;
     public function relation_user(){
        return $this->belongsTo(User::class,'employee_id','id');
    } 

    public function relation_purpose(){
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
    } 
}
