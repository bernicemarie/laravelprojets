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
use App\Models\Exam;
use DB;
use PDF;

class ExamFeeController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
  }
 public function ExamFeeView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = Exam::all();
   return view('backend.student_exam.exam_fee_view',$data);
    }


public function ExamFeeClassData(Request $request){
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
         $html['thsource'] .= '<th>Exam Type Fee</th>';
         $html['thsource'] .= '<th>Discount </th>';
         $html['thsource'] .= '<th>Student Fee </th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color = 'primary';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_user']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['registration_relation_discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$request->exam_type_id.' ">Imprimer</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);

    }// end method 


public function ExamFeePayslip(Request $request){
 $student_id = $request->student_id;
 $class_id = $request->class_id;
 $data['exam_type'] = Exam::where('id',$request->exam_type_id)->first()['name'];
 // dd($data['exam_type']);

        $data['details'] = StudentRegistration::with(['registration_relation_user','registration_relation_discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

    $pdf = PDF::loadView('backend.student_exam.exam_fee_pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');

    }
    
}
