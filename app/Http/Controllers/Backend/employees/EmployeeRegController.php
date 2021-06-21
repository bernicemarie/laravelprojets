<?php

namespace App\Http\Controllers\backend\employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroupe;
use App\Models\StudentShift;
use DB;
use PDF;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;


class EmployeeRegController extends Controller
{
     public function EmployeeView(){

        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.add.employee_view',$data);
    }

    public function EmployeeAdd(){
        $data['designation'] = Designation::all();
        return view('backend.employee.add.employee_add',$data);
    }

     public function EmployeeStore(Request $request){
        DB::transaction(function() use($request){
        $checkYear = date('Ym',strtotime($request->join_date));
        //dd($checkYear);
        $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();

        if ($employee == null) {
            $firstReg = 0;
            $employeeId = $firstReg+1;
            if ($employeeId < 10) {
                $id_no = '000'.$employeeId;
            }elseif ($employeeId < 100) {
                $id_no = '00'.$employeeId;
            }elseif ($employeeId < 1000) {
                $id_no = '0'.$employeeId;
            }
        }else{
     $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
        $employeeId = $employee+1;
        if ($employeeId < 10) {
                $id_no = '000'.$employeeId;
            }elseif ($employeeId < 100) {
                $id_no = '00'.$employeeId;
            }elseif ($employeeId < 1000) {
                $id_no = '0'.$employeeId;
            }

        } // end else 

        $final_id_no = $checkYear.$id_no;
        $user = new User();
        $code = rand(0000,9999);
        $user->id_no = $final_id_no;
        $user->password = bcrypt($code);
        $user->usertype = 'employee';
        $user->code = $code;
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->sexe = $request->sexe;
        
        $user->salary = $request->salary;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->join_date = date('Y-m-d',strtotime($request->join_date));

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload_image/employee_images'),$filename);
            $user['image'] = $filename;
        }
        $user->save();

          $employee_salary = new EmployeeSalaryLog();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $request->salary;
          $employee_salary->present_salary = $request->salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();

           
        });


        $notification = array(
            'message' => 'Ajout effectué',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.registration.view')->with($notification);

    } // END Method

public function EmployeeEdit($id){
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.add.employee_edit',$data);

    }

     public function EmployeeUpdate(Request $request, $id){
    
        $user = User::find($id);
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->sexe = $request->sexe;
         
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));
         

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload_image/employee_images/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload_image/employee_images'),$filename);
            $user['image'] = $filename;
        }
        $user->save();

         

        $notification = array(
            'message' => 'Mise à jour effectuée',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.registration.view')->with($notification);


    }// END METHOD

  public function EmployeeDetails($id){
        $data['details'] = User::find($id);

    $pdf = PDF::loadView('backend.employee.add.employee_details_pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');

    }



     public function EmployeeDelete($id){
         $data = User::find($id);
        @unlink(public_path('upload_image/employee_images/'.$user->image));
         $data->delete();
         $notification=['message'=>'Suppression avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('employee.registration.view')->with($notification); 
         

    }
}
