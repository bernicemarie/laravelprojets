<?php

namespace App\Http\Controllers\Backend\eleveregistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\DiscountStudent;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentGroupe;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentRegistration;
use DB;


class StudentRegistrationController extends Controller
{ 
    public function __construct(){
      $this->middleware('auth');
  }
    public function RegistrationView(){
    $data['alldata'] = StudentRegistration::all();
    return view('backend.student_registration.registration_view',$data);

}
public function RegistrationAdd(){
    $data['classedata']=StudentClass::all();
    $data['subjectdata']=Subject::all();
    $data['studentgroupedata']=StudentGroupe::all();
    $data['yeardata']=StudentYear::all();
    $data['shiftdata']=StudentShift::all();
    $data['userdata']=User::all();
        return view ('backend.student_registration.registration_add',$data);

    }
    public function RegistrationStore(Request $request){
        $validatedData = $request->validate([
          'name'=> 'required|unique:users|max:255',
        ],
        [
        'name.required'=>'Ce champ est obligatoire, merci d`ajouter un Subject',
        'name.unique'=>'Cette matière existe déjà, merci d`ajouter une nouvelle matière',

        ]
    );
        DB::transaction(function() use($request){
           $checkyear = StudentYear::find($request->year_id)->name;
           $student= User::where('usertype','Student')->orderBy('id','DESC')->first();
           if ($student==null) {
            $firstReg = 0;
            $studentId = $firstReg+1;
            if ($studentId<10) {
                $id_no = '0000'.$studentId;
                
            } elseif ($studentId<100) {
                $id_no = '00'.$studentId;
                
            }elseif ($studentId<1000) {
                $id_no = '0'.$studentId;
                
            }
           } else{
             $student= User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
             $studentId = $student+1;
              if ($studentId<10) {
                $id_no = '0000'.$studentId;
                
            } elseif ($studentId<100) {
                $id_no = '00'.$studentId;
                
            }elseif ($studentId<1000) {
                $id_no = '0'.$studentId;
                
            }
           }

           $final_id_no = $checkyear.$id_no;
           $user = new User();
           $code = rand(0000,9999);
           $user->id_no=$final_id_no;
           $user->password= bcrypt($code);
           $user->usertype = 'Student';
           $user->code = $code;
           $user->name = $request->name;
           $user->fname = $request->fname;
           $user->telephone = $request->telephone;
           $user->adresse = $request->adresse;
           $user->sexe = $request->sexe;
           $user->dob = date('Y-m-d',strtotime($request->dob));
           if ($request->file('image')) {
             $file = $request->file('image');
            /* @unlink(public_path('upload_image/user_image/'.$user->image));*/
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('upload_image/student_image'),$filename);
             $user['image']= $filename;
              }
           $user->save();

           $assign_student = new StudentRegistration();
           $assign_student->student_id =$user->id;
           $assign_student->year_id =$request->year_id;
           $assign_student->class_id =$request->class_id;
           $assign_student->shift_id =$request->shift_id;
           $assign_student->groupe_id =$request->groupe_id;
           $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
                
        });
         $notification=['message'=>'Ajout effectué',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('registration.view')->with($notification);  
          

    }
     public function RegistrationDelete($id){
         $user = StudentRegistration::find($id);
       /* @unlink(public_path('upload_image/student_image/'.$user->image));*/
        $user->delete();
        $notification=['message'=>'Utilisateur supprimé avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('registration.view')->with($notification); 
         

    }
}
