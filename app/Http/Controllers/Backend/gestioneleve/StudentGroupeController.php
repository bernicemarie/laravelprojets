<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroupe;


class StudentGroupeController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
      public function ViewGroupe(){
    $data['alldata'] = StudentGroupe::all();
    return view('backend.gestioneleve.student_groupe.view_groupe',$data);

}
public function GroupeAdd(){
        return view ('backend.gestioneleve.student_groupe.add_groupe');

    }
     public function GroupeStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:student_groupes|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau groupe',
        'name.unique'=>'Ce groupe existe déjà, merci d`ajouter un nouveau groupe',

        ]
    );
         $data = new StudentGroupe();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.groupe.view')->with($notification); 

    }
    public function GroupeEdit($id){
         $editGroupe['groupeData']= StudentGroupe::find($id);
       return view ('backend.gestioneleve.student_groupe.edit_groupe',$editGroupe);


    }
     public function GroupeUpdate(Request $request, $id){
        $data = StudentGroupe::find($id);
         $validatedData = $request->validate([
          'name'=> 'required|unique:student_groupes|max:255,'.$data->id
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau groupe',
        'name.unique'=>'Ce groupe existe déjà, merci d`ajouter un nouveau groupe',

        ]
    );
         $data = StudentGroupe::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.groupe.view')->with($notification); 
         

    }
    public function GroupeDelete($id){
         $data = StudentGroupe::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.groupe.view')->with($notification); 
         

    }
}
