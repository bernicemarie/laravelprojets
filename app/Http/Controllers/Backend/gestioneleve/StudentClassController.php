<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
class StudentClassController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
public function ViewClass(){
    $data['alldata'] = StudentClass::all();
    return view('backend.gestioneleve.student_class.view_class',$data);

}

 public function ClassAdd(){
        return view ('backend.gestioneleve.student_class.add_class');

    }
     public function ClassStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:student_classes|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter une classe',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter une nouvelle classe',

        ]
    );
         $data = new StudentCLass();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.classe.view')->with($notification); 

    }
     public function ClassEdit($id){
         $editClass['classData']= StudentCLass::find($id);
       return view ('backend.gestioneleve.student_class.edit_class',$editClass);


    }
     public function ClassUpdate(Request $request, $id){
         $validatedData = $request->validate([
          'name'=> 'required|unique:student_classes|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter une nouvelle classe',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter une nouvelle classe',

        ]
    );
         $data = StudentClass::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Classe modifiée avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.classe.view')->with($notification); 
         

    }

    public function ClassDelete($id){
         $data = StudentClass::find($id);
         $data->delete();
         $notification=['message'=>'Classe supprimée avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.classe.view')->with($notification); 
         

    }
}
