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
 Route::get('/suppression/enregistrement/{id}',[StudentRegistrationController::class,'RegistrationDelete'])->name('registration.delete');

     
});
//End user Enregistrement routes