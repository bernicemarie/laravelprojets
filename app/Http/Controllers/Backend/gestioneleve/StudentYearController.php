<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;


class StudentYearController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
    public function ViewAge(){
    $data['alldata'] = StudentYear::all();
    return view('backend.gestioneleve.student_age.view_age',$data);

}
public function AgeAdd(){
        return view ('backend.gestioneleve.student_age.add_age');

    }
     public function AgeStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:student_years|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouvel âge',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter un nouvel âge',

        ]
    );
         $data = new StudentYear();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.age.view')->with($notification); 

    }
    public function YearEdit($id){
         $editAge['ageData']= StudentYear::find($id);
       return view ('backend.gestioneleve.student_age.edit_age',$editAge);


    }
     public function YearUpdate(Request $request, $id){
        $data = StudentYear::find($id);
         $validatedData = $request->validate([
          'name'=> 'required|unique:student_years|max:255,'.$data->id
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouvel âge',
        'name.unique'=>'Cette classe existe déjà, merci d`ajouter un nouvel age',

        ]
    );
         $data = StudentYear::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Age modifié avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.age.view')->with($notification); 
         

    }
    public function YearDelete($id){
         $data = StudentYear::find($id);
         $data->delete();
         $notification=['message'=>'Age supprimé avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.age.view')->with($notification); 
         

    }
}
