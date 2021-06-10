<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
  public function ViewDesignation(){
    $data['alldata'] = Designation::all();
    return view('backend.gestioneleve.student_designation.view_designation',$data);

}
        public function DesignationAdd(){
        return view ('backend.gestioneleve.student_designation.add_designation');

    }
     public function DesignationStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:designations|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter une Designation',
        'name.unique'=>'Cette designation existe déjà',

        ]
    );
         $data = new Designation();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.designation.view')->with($notification); 

    }
     public function DesignationEdit($id){
         $editDesignation['designationEdit']= Designation::find($id);
       return view ('backend.gestioneleve.student_designation.edit_designation',$editDesignation);


    }
    public function DesignationUpdate(Request $request, $id){
         $validatedData = $request->validate([
          'name'=> 'required|unique:designations|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un Designationen',
         'name.unique'=>'Cette designation existe déjà',


        ]
    );
         $data = Designation::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.designation.view')->with($notification); 
         

    }
     public function DesignationDelete($id){
         $data = Designation::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.designation.view')->with($notification); 
         

    }
}
