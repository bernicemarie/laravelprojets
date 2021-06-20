<?php

namespace App\Http\Controllers\backend\eleveregistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\FeeAmount;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroupe;
use App\Models\StudentShift;
use DB;
use PDF;

class StudentFeeController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
  }

 
    public function RegFeeView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student_fee.registration_fee_view',$data);
    }


   public function RegFeeClassData(Request $request){
         $year_id = $request->year_id;
         $class_id = $request->class_id;
         if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
         }
         if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
         }
         $allStudent = StudentRegistration::with(['registration_relation_discount'])->where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID No</th>';
         $html['thsource'] .= '<th>Student Name</th>';
         $html['thsource'] .= '<th>Roll No</th>';
         $html['thsource'] .= '<th>Reg Fee</th>';
         $html['thsource'] .= '<th>Discount </th>';
         $html['thsource'] .= '<th>Student Fee </th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
            $color = 'primary';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_user']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['registration_relation_discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Imprimer</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);

    }// end method 





    public function RegFeePayslip(Request $request){
        $student_id = $request->student_id;
        $class_id = $request->class_id;

        $allStudent['details'] = StudentRegistration::with(['registration_relation_user','registration_relation_discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

     $pdf = PDF::loadView('backend.student_fee.registration_fee_pdf', $allStudent);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');

    }



 
}
