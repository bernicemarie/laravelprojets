<?php

namespace App\Http\Controllers\Backend\eleveregistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\DiscountStudent;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentGroupe;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentRegistration;


class StudentRegistrationController extends Controller
{ 
    public function __construct(){
      $this->middleware('auth');
  }
    public function RegistrationView(){
    $data['alldata'] = StudentRegistration::all();
    return view('backend.student_registration.registration_view',$data);

}
public function RegistrationAdd(){
    $data['classedata']=StudentClass::all();
    $data['subjectdata']=Subject::all();
    $data['studentgroupedata']=StudentGroupe::all();
    $data['yeardata']=StudentYear::all();
    $data['shiftdata']=StudentShift::all();
    $data['userdata']=User::all();
        return view ('backend.student_registration.registration_add',$data);

    }
}
