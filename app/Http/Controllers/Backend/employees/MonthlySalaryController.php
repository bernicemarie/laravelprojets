<?php

namespace App\Http\Controllers\Backend\employees;

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

class MonthlySalaryController extends Controller
{
     public function MonthlySalaryView(){
        return view('backend.employee.monthly_salary.monthly_salary_view');

    }


  public function MonthlySalaryGet(Request $request){
        
        $date = date('Y-m',strtotime($request->date));
         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
         }
         
         $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['relation_user'])->where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>Employee Name</th>';
         $html['thsource'] .= '<th>Basic Salary</th>';
         $html['thsource'] .= '<th>Salary This Month</th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendance::with(['relation_user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $color = 'primary';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['relation_user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['relation_user']['salary'].'</td>';
             
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html[$key]['tdsource'] .='<td>'.$totalsalary.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Détails</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);
 

  } // END Method 


    public function MonthlySalaryPayslip(Request $request,$employee_id){
        $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
        $date = date('Y-m',strtotime($id->date));
         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
         }

    $data['details'] = EmployeeAttendance::with(['relation_user'])->where($where)->where('employee_id',$id->employee_id)->get();  

    $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');

    }


}
