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

use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;

class EmployeeLeaveController extends Controller
{
    public function LeaveView(){
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.leave.employee_leave_view',$data);
    }


    public function LeaveAdd(){

        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.leave.employee_leave_add',$data);
    }


    public function LeaveStore(Request $request){

        if ($request->leave_purpose_id == "0") {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d',strtotime($request->start_date));
        $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Ajout effectué',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.leave.view')->with($notification);

    }// end Method 



    public function LeaveEdit($id){
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.leave.employee_leave_edit',$data);

    }



    public function LeaveUpdate(Request $request,$id){

        if ($request->leave_purpose_id == "0") {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d',strtotime($request->start_date));
        $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Modification réalisée',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.leave.view')->with($notification);

    } // end Method 



    public function LeaveDelete($id){
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        $notification = array(
            'message' => 'Suppression réalisée',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.leave.view')->with($notification);
    }



}
