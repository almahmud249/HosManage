<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\AdminDash\DocController;
use App\Http\Controllers\Auth\Doctor\LoginController;

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
    return view('welcome');
});
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});
Auth::routes();

route::prefix('doctor')->namespace('Auth/Doctor')->group(function(){

    Route::get('login_page',[LoginController::class,'showLoginForm'])->name('login.page');
    Route::post('login_action',[LoginController::class,'login'])->name('login.action ');
    Route::post('logout_action',[LoginController::class,'logout'])->name('logout.action');
});

//doctors route
    Route::get('doc_singUp_page',[DocController::class,'showSignUpForm'])->name('doc.singUp.page');
    // Route::get('all_doc_list_data',[DocController::class,'AllDocListData'])->name('all.doc.list.data');
    Route::get('all_doc_list',[DocController::class,'AllDocList'])->name('all.doc.list');
    Route::post('doc_insert',[DocController::class,'DocInsert'])->name('doc.insert');
    Route::get('doc_edit/{id}',[DocController::class,'DocEdit'])->name('doc.edit');
    Route::post('doc_update/{id}',[DocController::class,'DocUpdate'])->name('doc.update');
    Route::get('doc_delete/{id}',[DocController::class,'DocDelete'])->name('doc.delete');


    Route::prefix('doctor')->namespace('admin')->group(function(){
        Route::get('dashboard',[DoctorController::class,'DocDashboard'])->name('dashboard');
        // Route::get('get_profile',[DoctorController::class,'profile'])->name('get.profile');

    });


    //departments route
route::get('all_dept_page', [DepartmentController::class, 'AllDeptPage'])->name('all.dept.page');
route::post('insert_dept_page', [DepartmentController::class, 'InsertDeptPage'])->name('insert.dept.page');
route::get('/edit_dept_page/{id}', [DepartmentController::class, 'EditDeptPage'])->name('edit.dept.page');
route::post('update_dept_page', [DepartmentController::class, 'UpdateDeptPage'])->name('update.dept.page');
route::get('delete_dept_page/{id}', [DepartmentController::class, 'DeleteDeptPage'])->name('delete.dept.page');

route::get('department', [DepartmentController::class, 'GetDept']);




//specialist route
route::get('all_specialist_page', [SpecialistController::class, 'AllSpecialistPage'])->name('all.specialist.page');
route::post('insert_specialist_page', [SpecialistController::class, 'InsertSpecialistPage'])->name('insert.specialist.page');
 route::get('/edit_specialist_page/{id}', [SpecialistController::class, 'EditSpecialistPage'])->name('edit.specialist.page');
 route::post('update_specialist_page', [SpecialistController::class, 'UpdateSpecialistPage'])->name('update.specialist.page');
 route::get('delete_specialist_page/{id}', [SpecialistController::class, 'DeleteSpecialistPage'])->name('delete.specialist.page');

//patients route
route::middleware('MdForCheck')->group(function(){
    route::get('all_patient_page', [PatientController::class, 'AllPatientPage'])->name('all.patient.page');
    route::get('insert_patient_form', [PatientController::class, 'InsertPatientForm'])->name('insert.patient.form');
     route::post('insert_patient_data', [PatientController::class, 'InsertPatientData'])->name('insert.patient.data');
     route::get('edit_patient_data/{id}', [PatientController::class, 'EditPatientData'])->name('edit.patient.data');
     route::post('update_patient_data/{id}', [PatientController::class, 'UpdatePatientData'])->name('update.patient.data');
     route::get('delete_patient_data/{id}', [PatientController::class, 'DeletePatientData'])->name('delete.patient.data');
});

//route::get('delete_specialist_page/{id}', [SpecialistController::class, 'DeleteSpecialistPage'])->name('delete.specialist.page');

//appointment route




        route::get('all_appointment_page', [AppointmentController::class, 'AllAppointmentPage'])->name('all.appointment.page');
        route::get('insert_appointment_form', [AppointmentController::class, 'InsertAppointmentForm'])->name('insert.appointment.form');
        route::post('insert_appointment_data', [AppointmentController::class, 'InsertAppointmentData'])->name('insert.appointment.data');
        route::get('edit_appointment_data/{id}', [AppointmentController::class, 'EditAppointmentData'])->name('edit.appointment.data');
        route::post('update_appointment_data/{id}', [AppointmentController::class, 'UpdateAppointmentData'])->name('update.appointment.data');
        route::get('delete_appointment_data/{id}', [AppointmentController::class, 'DeleteAppointmentData'])->name('delete.appointment.data');

        //route for doctor appointment status
        route::get('appointment_approve/{id}', [AppointmentController::class, 'AppointmentApprove'])->name('appointment.approve');



        Route::post('/apt', [App\Http\Controllers\HomeController::class, 'AptOnline'])->name('apt');
        Route::get('reSchedule_form/{id}', [App\Http\Controllers\HomeController::class, 'ReScheduleForm'])->name('reschedule.form');
        route::post('appointment_reSchedule/{id}', [HomeController::class, 'AppointmentReSchedule'])->name('appointment.reSchedule');


    // route::post('online_appointment_data', [AppointmentController::class, 'OnlineAppointmentData'])->name('online.appointment.data');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



