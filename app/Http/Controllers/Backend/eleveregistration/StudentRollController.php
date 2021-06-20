<?php

namespace App\Http\Controllers\backend\eleveregistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroupe;
use App\Models\StudentShift;
use DB;
use PDF;

class StudentRollController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
 public function StudentRollView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student_roll.roll_view',$data);
    }

     public function GetStudents(Request $request){
        //dd('ok done');
        $allData = StudentRegistration::with(['registration_relation_user'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        // dd($allData->toArray());
        return response()->json($allData);

    }



      public function StudentRollStore(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id !=null) {
            for ($i=0; $i < count($request->student_id); $i++) { 
                StudentRegistration::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
            } // end for loop
        }else{
            $notification = array(
            'message' => 'Sorry there are no student',
            'alert-type' => 'error'
        );

           return redirect()->back()->with($notification);
        } // End IF Condition

       $notification = array(
            'message' => 'Well Done Roll Generated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('roll.view')->with($notification);

    }// end Method 






 
}
