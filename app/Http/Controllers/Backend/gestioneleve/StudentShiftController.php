<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;



class StudentShiftController extends Controller
{
      public function ViewShift(){
    $data['alldata'] = StudentShift::all();
    return view('backend.gestioneleve.student_shift.view_Shift',$data);

}
public function ShiftAdd(){
        return view ('backend.gestioneleve.student_shift.add_Shift');

    }
     public function ShiftStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:student_shifts|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau Shift',
        'name.unique'=>'Ce Shift existe déjà, merci d`ajouter un nouveau Shift',

        ]
    );
         $data = new StudentShift();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.shift.view')->with($notification); 

    }
    public function ShiftEdit($id){
         $editShift['shiftData']= StudentShift::find($id);
       return view ('backend.gestioneleve.student_shift.edit_shift',$editShift);


    }
     public function ShiftUpdate(Request $request, $id){
        $data = StudentShift::find($id);
         $validatedData = $request->validate([
          'name'=> 'required|unique:student_shifts|max:255,'.$data->id
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau Shift',
        'name.unique'=>'Ce Shift existe déjà, merci d`ajouter un nouveau Shift',

        ]
    );
         $data = StudentShift::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.shift.view')->with($notification); 
         

    }
    public function ShiftDelete($id){
         $data = StudentShift::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.shift.view')->with($notification); 
         

    }
}
