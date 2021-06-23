<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Use App\Http\Controllers\Backend\UserController;
Use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\gestioneleve\StudentClassController;
use App\Http\Controllers\Backend\gestioneleve\StudentYearController;
use App\Http\Controllers\Backend\gestioneleve\StudentGroupeController;
use App\Http\Controllers\Backend\gestioneleve\StudentShiftController;
use App\Http\Controllers\Backend\gestioneleve\FeeCategoryController;
use App\Http\Controllers\Backend\gestioneleve\FeeAmountController;
use App\Http\Controllers\Backend\gestioneleve\ExamController;
use App\Http\Controllers\Backend\gestioneleve\SubjectController;
use App\Http\Controllers\Backend\gestioneleve\AssignController;
use App\Http\Controllers\Backend\gestioneleve\DesignationController;
use App\Http\Controllers\Backend\eleveregistration\StudentRegistrationController;
use App\Http\Controllers\Backend\eleveregistration\StudentRollController;
use App\Http\Controllers\Backend\eleveregistration\StudentFeeController;
use App\Http\Controllers\Backend\eleveregistration\MonthlyFeeController;
use App\Http\Controllers\Backend\eleveregistration\ExamFeeController;
use App\Http\Controllers\Backend\employees\EmployeeRegController;
use App\Http\Controllers\Backend\employees\EmployeeSalaryController;
use App\Http\Controllers\Backend\employees\EmployeeLeaveController;
use App\Http\Controllers\Backend\employees\EmployeeAttendanceController;
use App\Http\Controllers\Backend\employees\MonthlySalaryController;
use App\Http\Controllers\Backend\marks\MarksController;
use App\Http\Controllers\Backend\marks\GradeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\account\StudentsFeeController;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
//logout route
Route::get('admin/déconnecter',[AdminController::class,'Logout'])->name('admin.logout');
//End logout route
Route::group(['middleware'=> 'auth'],function(){


//user routes
Route::prefix('utilisateurs')->group(function(){
    Route::get('/liste',[UserController::class,'UserView'])->name('user.view');
    Route::get('/ajout',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/ajouter',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edition/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/modifications/{id}',[UserController::class,'UserUpdate'])->name('user.update');
    Route::get('/suppression/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});
//End user routes
//user Profile routes
Route::prefix('Profile')->group(function(){
    Route::get('/mon_profile',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edition',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/modificationprofile',[ProfileController::class,'ProfileUpdate'])->name('profile.update');
     Route::get('/motdepass',[ProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/modificationpass',[ProfileController::class,'PasswordStore'])->name('password.store');
});
//End user Profile routes

//Student routes
Route::prefix('Gestion')->group(function(){
    Route::get('/eleve/classe/liste',[StudentClassController::class,'ViewClass'])->name('eleve.classe.view');
    Route::get('/ajout/classe',[StudentClassController::class,'ClassAdd'])->name('classe.add');
     Route::post('/ajouter',[StudentClassController::class,'ClassStore'])->name('class.store');
       Route::get('/edition/{id}',[StudentClassController::class,'ClassEdit'])->name('classe.edit');
        Route::post('/modifications/{id}',[StudentClassController::class,'ClassUpdate'])->name('classe.update');
         Route::get('/suppression/{id}',[StudentClassController::class,'ClassDelete'])->name('classe.delete');
         //Student routes year
          Route::get('/eleve/age/liste',[StudentYearController::class,'ViewAge'])->name('eleve.age.view');
          Route::get('/ajout/age',[StudentYearController::class,'AgeAdd'])->name('age.add');
           Route::post('/ajouter/age',[StudentYearController::class,'AgeStore'])->name('age.store');
            Route::get('/edition/age/{id}',[StudentYearController::class,'YearEdit'])->name('age.edit');
             Route::post('/modification/age/{id}',[StudentYearController::class,'YearUpdate'])->name('age.update');
              Route::get('/suppression/age/{id}',[StudentYearController::class,'YearDelete'])->name('age.delete'); 
               //Student routes groupe
          Route::get('/eleve/groupe/liste',[StudentGroupeController::class,'ViewGroupe'])->name('eleve.groupe.view');
          Route::get('/ajout/groupe',[StudentGroupeController::class,'GroupeAdd'])->name('groupe.add');
           Route::post('/ajouter/groupe',[StudentGroupeController::class,'GroupeStore'])->name('groupe.store');
            Route::get('/edition/groupe/{id}',[StudentGroupeController::class,'GroupeEdit'])->name('groupe.edit');
             Route::post('/modification/groupe/{id}',[StudentGroupeController::class,'GroupeUpdate'])->name('groupe.update');
              Route::get('/suppression/groupe/{id}',[StudentGroupeController::class,'GroupeDelete'])->name('groupe.delete');
               //Student routes shift
          Route::get('/eleve/shift/liste',[StudentShiftController::class,'ViewShift'])->name('eleve.shift.view');
          Route::get('/ajout/shift',[StudentShiftController::class,'ShiftAdd'])->name('shift.add');
           Route::post('/ajouter/shift',[StudentShiftController::class,'ShiftStore'])->name('shift.store');
            Route::get('/edition/shift/{id}',[StudentShiftController::class,'ShiftEdit'])->name('shift.edit');
             Route::post('/modification/shift/{id}',[StudentShiftController::class,'ShiftUpdate'])->name('shift.update');
              Route::get('/suppression/shift/{id}',[StudentShiftController::class,'ShiftDelete'])->name('shift.delete');
              //Student fees
                Route::get('/eleve/fee/liste',[FeeCategoryController::class,'ViewFee'])->name('eleve.fee.view');
          Route::get('/ajout/fee',[FeeCategoryController::class,'FeeAdd'])->name('fee.add');
           Route::post('/ajouter/fee',[FeeCategoryController::class,'FeeStore'])->name('fee.store');
            Route::get('/edition/fee/{id}',[FeeCategoryController::class,'FeeEdit'])->name('fee.edit');
             Route::post('/modification/fee/{id}',[FeeCategoryController::class,'FeeUpdate'])->name('fee.update');
              Route::get('/suppression/fee/{id}',[FeeCategoryController::class,'FeeDelete'])->name('fee.delete');
              //Student fees amount
                Route::get('/eleve/amount/liste',[FeeAmountController::class,'ViewFeeAmount'])->name('eleve.amount.view');
                Route::get('/ajout/amount',[FeeAmountController::class,'AmountAdd'])->name('amount.add');
                 Route::post('/ajouter/amount',[FeeAmountController::class,'AmountStore'])->name('amount.store');
                  Route::get('/edition/amount/{fee_category_id}',[FeeAmountController::class,'AmountEdit'])->name('amount.edit');
                   Route::post('/modification/amount/{fee_category_id}',[FeeAmountController::class,'AmountUpdate'])->name('amount.update');
                    Route::get('/modification/amount_details/{fee_category_id}',[FeeAmountController::class,'AmountDetails'])->name('amount.details');
                 Route::get('/suppression/amount/{fee_category_id}',[FeeAmountController::class,'AmountDelete'])->name('amount.delete');
                 //Student exam
                Route::get('/eleve/exam/liste',[ExamController::class,'ViewExam'])->name('eleve.exam.view');
                Route::get('/ajout/exam',[ExamController::class,'ExamAdd'])->name('exam.add');
                 Route::post('/ajouter/exam',[ExamController::class,'ExamStore'])->name('exam.store');
                  Route::get('/edition/exam/{id}',[ExamController::class,'ExamEdit'])->name('exam.edit');
                   Route::post('/modification/exam/{id}',[ExamController::class,'ExamUpdate'])->name('exam.update');
                 Route::get('/suppression/exam/{id}',[ExamController::class,'ExamDelete'])->name('exam.delete'); 
                 //Student subject
                Route::get('/eleve/matière/liste',[SubjectController::class,'ViewSubject'])->name('eleve.subject.view');
                Route::get('/ajout/matière',[SubjectController::class,'SubjectAdd'])->name('subject.add');
                 Route::post('/ajouter/matière',[SubjectController::class,'SubjectStore'])->name('subject.store');
                  Route::get('/edition/matière/{id}',[SubjectController::class,'SubjectEdit'])->name('subject.edit');
                   Route::post('/modification/matière/{id}',[SubjectController::class,'SubjectUpdate'])->name('subject.update');
                 Route::get('/suppression/matière/{id}',[SubjectController::class,'SubjectDelete'])->name('subject.delete');
                 //Student assign subject
                Route::get('/eleve/assign/liste',[AssignController::class,'ViewAssign'])->name('eleve.assign.view');
                Route::get('/ajout/assign',[AssignController::class,'AssignAdd'])->name('assign.add');
                 Route::post('/ajouter/assign',[AssignController::class,'AssignStore'])->name('assign.store');
                  Route::get('/edition/assign/{class_id}',[AssignController::class,'AssignEdit'])->name('assign.edit');
                   Route::post('/modification/assign/{class_id}',[AssignController::class,'AssignUpdate'])->name('assign.update');
                    Route::get('/modification/assign_details/{class_id}',[AssignController::class,'AssignDetails'])->name('assign.details');
                 Route::get('/suppression/assign/{class_id}',[AssignController::class,'AssignDelete'])->name('assign.delete'); 
                 //Student designation
                Route::get('/eleve/designation/liste',[DesignationController::class,'ViewDesignation'])->name('eleve.designation.view');
                Route::get('/ajout/designation',[DesignationController::class,'DesignationAdd'])->name('designation.add');
                 Route::post('/ajouter/designation',[DesignationController::class,'DesignationStore'])->name('designation.store');
                  Route::get('/edition/designation/{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
                   Route::post('/modification/designation/{id}',[DesignationController::class,'DesignationUpdate'])->name('designation.update');
                 Route::get('/suppression/designation/{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');

});
//End student routes

//user Enregistrement routes
Route::prefix('Enregistrement')->group(function(){
Route::get('/eleve/enregistrement/liste',[StudentRegistrationController::class,'RegistrationView'])->name('registration.view');
 Route::get('/ajout/enregistrement',[StudentRegistrationController::class,'RegistrationAdd'])->name('registration.add');
Route::post('/ajouter/enregistrement',[StudentRegistrationController::class,'RegistrationStore'])->name('registration.store');
Route::get('/Recherche/Elève',[StudentRegistrationController::class,'RegistrationRecherche'])->name('registration.recherche');
 Route::get('/edition/registration/{student_id}',[StudentRegistrationController::class,'RegistrationEdit'])->name('registration.edit');
  Route::post('/modification/registration/{student_id}',[StudentRegistrationController::class,'RegistrationUpdate'])->name('registration.update');
  Route::get('/modification/promotion/{student_id}',[StudentRegistrationController::class,'RegistrationPromotion'])->name('registration.promotion');
  Route::post('/modifier/promotion/{student_id}',[StudentRegistrationController::class,'RegistrationUpdatePromotion'])->name('registration.updatepromotion'); 
  Route::get('/details/promotion/{student_id}',[StudentRegistrationController::class,'RegistrationDetails'])->name('registration.details');
 Route::get('/suppression/enregistrement/{id}',[StudentRegistrationController::class,'RegistrationDelete'])->name('registration.delete');
//End user Enregistrement routes

 // Student Roll Generate Routes 
Route::get('/roll/generate/liste', [StudentRollController::class, 'StudentRollView'])->name('roll.view');

Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
 // Student Roll Generate Routes 

// Registration Fee Routes 
Route::get('/reg/fee/view', [StudentFeeController::class, 'RegFeeView'])->name('fee.view');

Route::get('/reg/fee/classwisedata', [StudentFeeController::class, 'RegFeeClassData'])->name('fee.get');

Route::get('/reg/fee/payslip', [StudentFeeController::class, 'RegFeePayslip'])->name('fee.payslip');

// Monthly Fee Routes 
Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');

Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('monthly.fee.get');

Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('monthly.fee.payslip');

// Exam Fee Routes 
Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');

Route::get('/exam/fee/classe', [ExamFeeController::class, 'ExamFeeClassData'])->name('exam.fee.get');

Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('exam.fee.payslip');   
});
/// Employee Registration Routes
Route::prefix('employees')->group(function(){

Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');

Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');

Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
 
Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');

Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');

Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');
 Route::get('/suppression/employee/{id}',[EmployeeRegController::class,'EmployeeDelete'])->name('employee.registration.delete');

 // Employee Salary All Routes 
Route::get('salary/employee/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');

Route::get('salary/employee/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');

Route::post('salary/employee/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');

Route::get('salary/employee/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');
Route::get('salary/employee/suppression/{id}', [EmployeeSalaryController::class, 'SalaryDelete'])->name('employee.salary.delete');

//Employee Leave All Routes 
Route::get('leave/employee/liste', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');

Route::get('leave/employee/ajout', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');

Route::post('leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');

Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');

Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');

Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

// Employee Attendance All Routes 
Route::get('attendance/employee/liste', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');

Route::get('attendance/employee/ajout', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');

Route::post('attendance/employee/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');

Route::get('attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');

Route::get('attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

// Employee Monthly Salary All Routes 
Route::get('monthly/salary/liste', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary');

Route::get('monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');

Route::get('monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');


});
 
 Route::prefix('marks')->group(function(){

Route::get('marks/ajouter', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');

Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store'); 

Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit'); 

Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');

Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  

// Marks Entry Grade 

Route::get('marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');

Route::get('marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');

Route::post('marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');

Route::get('marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');

Route::post('marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');
Route::get('marks/grade/supp/{id}', [GradeController::class, 'MarksGradeDelete'])->name('delete.marks.grade');

}); 
 
Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');

Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');


/// Account Management Routes  
Route::prefix('accounts')->group(function(){

Route::get('eleves/fee/liste', [StudentsFeeController::class, 'StudentFeeView'])->name('student.fee.view');

Route::get('student/fee/add', [StudentsFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');

Route::get('student/fee/getstudent', [StudentsFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent'); 

Route::post('student/fee/store', [StudentsFeeController::class, 'StudentFeeStore'])->name('account.fee.store'); 

// Employee Salary Routes
Route::get('account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');

Route::get('account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');

Route::get('account/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');

Route::post('account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');

// Other Cost Rotues 

Route::get('other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');

Route::get('other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');

Route::post('other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');

Route::get('other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');

Route::post('other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');

}); 


});//End Middleware Auth
