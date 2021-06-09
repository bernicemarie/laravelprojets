<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
  }
  public function ViewSubject(){
    $data['alldata'] = Subject::all();
    return view('backend.gestioneleve.student_subject.view_subject',$data);

}
        public function SubjectAdd(){
        return view ('backend.gestioneleve.student_subject.add_subject');

    }
     public function SubjectStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:subjects|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un Subject',
        'name.unique'=>'Cette matière existe déjà, merci d`ajouter une nouvelle matière',

        ]
    );
         $data = new Subject();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.subject.view')->with($notification); 

    }
     public function SubjectEdit($id){
         $editSubject['subjectEdit']= Subject::find($id);
       return view ('backend.gestioneleve.student_subject.edit_subject',$editSubject);


    }
    public function SubjectUpdate(Request $request, $id){
         $validatedData = $request->validate([
          'name'=> 'required|unique:subjects|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un Subjecten',
        'name.unique'=>'Cette matière existe déjà, merci d`ajouter une nouvelle matière',

        ]
    );
         $data = Subject::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.subject.view')->with($notification); 
         

    }
     public function SubjectDelete($id){
         $data = Subject::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.subject.view')->with($notification); 
         

    }
}
