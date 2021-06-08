<?php

namespace App\Http\Controllers\Backend\gestioneleve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\FeeAmount;
use App\Models\FeeCategory;


class FeeAmountController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
   public function ViewFeeAmount(){
    $data['alldata'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    return view('backend.gestioneleve.student_amount.view_amount',$data);

}   
public function AmountAdd(){
    $data['fee_categories']=FeeCategory::all();
    $data['classes']=StudentClass::all();
        return view ('backend.gestioneleve.student_amount.add_amount',$data);

    }

    public function AmountStore(Request $request){
        $validatedData = $request->validate([
          'amount'=> 'required:fee_amounts|max:255',
        ],
        [
        'amount.required'=>'Ce champ est obligatoire, merci d`ajouter un montant',
         

        ]
    );
        $countClass = count(array($request->class_id));
        if ($countClass !=NULL) {
            for ($i=0; $i <$countClass ; $i++) {
        $data = new FeeAmount();
         $data->fee_category_id = $request->fee_category_id;
         $data->class_id = $request->class_id[$i];
         $data->amount = $request->amount[$i]; 
          $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.amount.view')->with($notification);               
            }
        }
    }
    public function AmountEdit($fee_category_id){
         $data['amountData']= FeeAmount:: where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
          $data['fee_categories']=FeeCategory::all();
          $data['classes']=StudentClass::all();
           return view ('backend.gestioneleve.student_amount.edit_amount',$data);


    }
    public function AmountUpdate(Request $request,$fee_category_id){
        if ($request->class_id==NULL) {
              $notification=['message'=>'Choissisez un champ',
                        'alert-type'=>'error'
                         ];
        return Redirect()->route('amount.edit',$fee_category_id)->with($notification); 
        }
        else{
             $validatedData = $request->validate([
          'amount'=> 'required:fee_amounts|max:255',
        ],
        [
        'amount.required'=>'Ce champ est obligatoire, merci d`ajouter un montant',
         

        ]
    );
         $countClass = count(array($request->class_id));
        FeeAmount::where('fee_category_id',$fee_category_id)->delete();
            for ($i=0; $i <$countClass ; $i++) {
        $data = new FeeAmount();
         $data->fee_category_id = $request->fee_category_id;
         $data->class_id = $request->class_id[$i];
         $data->amount = $request->amount[$i]; 
          $data->save();
        $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.amount.view')->with($notification);               
            }
        }
       
       
        
    }
    public function AmountDelete($id){
         $data = FeeAmount::find($id);
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('eleve.amount.view')->with($notification); 
         

    }
}
