<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
  public function ViewExam(){
    $data['alldata'] = Exam::all();
    return view('backend.gestioneleve.student_exam.view_exam',$data);

}
public function ExamAdd(){
        return view ('backend.gestioneleve.student_exam.add_exam');

    }
     public function ExamStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:exams|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un exam',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter une nouvelle classe',

        ]
    );
         $data = new Exam();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.exam.view')->with($notification); 

    }
     public function ExamEdit($id){
         $editExam['examEdit']= Exam::find($id);
       return view ('backend.gestioneleve.student_exam.edit_exam',$editExam);


    }
    public function ExamUpdate(Request $request, $id){
         $validatedData = $request->validate([
          'name'=> 'required|unique:exams|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un examen',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter une nouvelle classe',

        ] );
   
         $data = Exam::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.exam.view')->with($notification); 
         

    }
     public function ExamDelete($id){
         $data = Exam::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.exam.view')->with($notification); 
         

    }

}
