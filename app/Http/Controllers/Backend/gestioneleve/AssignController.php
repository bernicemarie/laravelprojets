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
    /*$data['alldata'] = Assign::all();*/
    $data['alldata'] = Assign::select('class_id')->groupBy('class_id')->get();

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

     public function AssignEdit($class_id){
         $data['assignData']= Assign:: where('class_id',$class_id)->orderBy('subject_id','asc')->get();
          $data['subject']=Subject::all();
          $data['classes']=StudentClass::all();
           return view ('backend.gestioneleve.student_assign.edit_assign',$data);


    }
     public function AssignUpdate(Request $request,$class_id){
        if ($request->subject_id==NULL) {
              $notification=['message'=>'Choissisez un champ',
                        'alert-type'=>'error'
                         ];
        return Redirect()->route('assign.edit',$class_id)->with($notification); 
        }
        else{
             $validatedData = $request->validate([
          'full_mark'=> 'required:assignss|max:255',
        ],
        [
        'full_mark.required'=>'Ce champ est obligatoire, merci d`ajouter un montant',
         

        ]
    );
         $countSubject = count(array($request->subject_id));
        Assign::where('class_id',$class_id)->delete();
             for ($i=0; $i <$countSubject ; $i++) {
        $data = new Assign();
         $data->class_id = $request->class_id;
         $data->subject_id = $request->subject_id[$i];
         $data->full_mark = $request->full_mark[$i]; 
         $data->pass_mark = $request->pass_mark[$i]; 
         $data->subjective_mark = $request->subjective_mark[$i]; 
          $data->save();
        $notification=['message'=>'Modification effectuée',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.assign.view')->with($notification);               
            }
        }
    }
     public function AssignDetails($class_id){
          $data['alldata']= Assign:: where('class_id',$class_id)->orderBy('subject_id','asc')->get();
          
           return view ('backend.gestioneleve.student_assign.details_assign',$data);
    } 
     public function AssignDelete($class_id){
      Assign::where('class_id',$class_id)->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.assign.view')->with($notification); 
         

    }
}
