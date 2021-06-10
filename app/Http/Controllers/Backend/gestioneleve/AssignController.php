<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\Assign;

class AssignController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
   public function ViewAssign(){
    $data['alldata'] = Assign::all();
   /* $data['alldata'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();*/
    return view('backend.gestioneleve.student_assign.view_assign',$data);

}   
public function AssignAdd(){
    $data['classes']=StudentClass::all();
    $data['subject']=Subject::all();
        return view ('backend.gestioneleve.student_assign.add_assign',$data);

    }
    public function AssignStore(Request $request){
        $countSubject = count(array($request->subject_id));
        if ($countSubject !=NULL) {
            for ($i=0; $i <$countSubject ; $i++) {
        $data = new Assign();
         $data->class_id = $request->class_id;
         $data->subject_id = $request->subject_id[$i];
         $data->full_mark = $request->full_mark[$i]; 
         $data->pass_mark = $request->pass_mark[$i]; 
         $data->subjective_mark = $request->subjective_mark[$i]; 
          $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.assign.view')->with($notification);               
            }
        }
    }
}
