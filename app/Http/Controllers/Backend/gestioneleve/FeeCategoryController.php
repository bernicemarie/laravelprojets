<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;


class FeeCategoryController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
      public function ViewFee(){
    $data['alldata'] = FeeCategory::all();
    return view('backend.gestioneleve.student_Fee.view_Fee',$data);

}
public function FeeAdd(){
        return view ('backend.gestioneleve.student_Fee.add_Fee');

    }
     public function FeeStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:fee_categories|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau Fee',
        'name.unique'=>'Ce Fee existe déjà, merci d`ajouter un nouveau Fee',

        ]
    );
         $data = new FeeCategory();
         $data->name = $request->name;
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.fee.view')->with($notification); 

    }
    public function FeeEdit($id){
         $editFee['feeData']= FeeCategory::find($id);
       return view ('backend.gestioneleve.student_fee.edit_Fee',$editFee);


    }
     public function FeeUpdate(Request $request, $id){
        $data = FeeCategory::find($id);
         $validatedData = $request->validate([
          'name'=> 'required|unique:fee_categories|max:255,'.$data->id
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un nouveau Fee',
        'name.unique'=>'Ce Fee existe déjà, merci d`ajouter un nouveau Fee',

        ]
    );
         $data = FeeCategory::find($id);
         $data->name = $request->name;
        $data->save();
        $notification=['message'=>'Modification avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.fee.view')->with($notification); 
         

    }
    public function FeeDelete($id){
         $data = FeeCategory::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.fee.view')->with($notification); 
         

    }
}
