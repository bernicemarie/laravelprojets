<?php

namespace App\Http\Controllers\Backend\account;

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
use App\Models\EmployeeAttendance;

use App\Models\AccountEmployeeSalary;

class AccountSalaryController extends Controller
{
   public function AccountSalaryView(){

        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.employee_salary.employee_salary_view',$data);

    }


    public function AccountSalaryAdd(){

      return view('backend.account.employee_salary.employee_salary_add');
    }
 

    public function AccountSalaryGetEmployee(Request $request){

        $date = date('Y-m',strtotime($request->date));
         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
            }
         
         $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['relation_user'])->where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID NO</th>';
         $html['thsource'] .= '<th>Nom</th>';
         $html['thsource'] .= '<th>Salaire de base</th>';
         $html['thsource'] .= '<th>Salaire pour ce mois</th>';
         $html['thsource'] .= '<th>Select</th>';


         foreach ($data as $key => $attend) {

            $account_salary = AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();

            if($account_salary !=null) {
                $checked = 'checked';
             }else{
                $checked = '';
             }   

            $totalattend = EmployeeAttendance::with(['relation_user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

             
    $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    $html[$key]['tdsource'] .= '<td>'.$attend['relation_user']['id_no'].'<input type="hidden" name="date" value="'.$date.'" >'.'</td>';

    $html[$key]['tdsource'] .= '<td>'.$attend['relation_user']['name'].'</td>';
    $html[$key]['tdsource'] .= '<td>'.$attend['relation_user']['salary'].'</td>';
     
    
    $salary = (float)$attend['relation_user']['salary'];
    $salaryperday = (float)$salary/30;
    $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
    $totalsalary = (float)$salary-(float)$totalsalaryminus;

    $html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'" >'.'</td>';

     
    $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

      }  // end foreach
        return response()->json(@$html);

    } // end Method



    public function AccountSalaryStore(Request $request){

        $date = date('Y-m', strtotime($request->date));

        AccountEmployeeSalary::where('date',$date)->delete();

        $checkdata = $request->checkmanage;

        if ($checkdata !=null) {
            for ($i=0; $i <count($checkdata) ; $i++) { 
                $data = new AccountEmployeeSalary(); 
                $data->date = $date; 
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            } 
        } // end if 

        if (!empty(@$data) || empty($checkdata)) {

        $notification = array(
            'message' => 'Well Done Data Successfully Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('account.salary.view')->with($notification);
        }else{

            $notification = array(
            'message' => 'Sorry Data not Saved',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        } 

    } // end method 
     public function AccountSalaryDelete($id){
        $data = AccountEmployeeSalary::find($id);
      $data->delete();
         $notification=['message'=>'Suppression avec succ??s',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('account.salary.view')->with($notification); 
         

    }
  
}
