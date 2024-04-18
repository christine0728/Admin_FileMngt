<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PoliceController;
use App\Models\Admin;
use App\Models\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [HomeController::class, 'login_view'])->name('login_form');
Route::post('/login_account', [HomeController::class, 'login'])->name('logging_in');


Route::prefix('admin')->group(function(){
    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

    Route::get('/police_file_mngt', [HomeController::class, 'police_file_mngt'])->name('police_file_mngt');
    Route::get('/view_police/{pid}', [PoliceController::class, 'view_police'])->name('view_police');
    Route::get('/view_police_file/{pid}', [PoliceController::class, 'view_police_file'])->name('view_police_file');

    Route::get('/pds/{pid}', [HomeController::class, 'pds_folder'])->name('pds_folder');
    Route::post('/add_file_pds', [FileController::class, 'add_file_pds'])->name('add_file_pds');
    Route::get('/view_pds/{fid}', [FileController::class, 'view_pds'])->name('view_pds');
    Route::post('/update_file_pds', [FileController::class, 'update_file_pds'])->name('update_file_pds');

    Route::get('/psa/{pid}', [HomeController::class, 'psa_folder'])->name('psa_folder');
    Route::post('/add_file_psa', [FileController::class, 'add_file_psa'])->name('add_file_psa');
    Route::get('/view_psa/{fid}', [FileController::class, 'view_psa'])->name('view_psa');
    Route::post('/update_file_psa', [FileController::class, 'update_file_psa'])->name('update_file_psa');

    Route::get('/appt_orders/{pid}', [HomeController::class, 'appt_orders_folder'])->name('appt_orders_folder');
    Route::post('/add_file_appt_orders', [FileController::class, 'add_file_appt_orders'])->name('add_file_appt_orders');
    Route::get('/view_appt_orders/{fid}', [FileController::class, 'view_appt_orders'])->name('view_appt_orders');
    Route::post('/update_file_appt_orders', [FileController::class, 'update_file_appt_orders'])->name('update_file_appt_orders');

    Route::get('/promotion_orders/{pid}', [HomeController::class, 'promotion_orders_folder'])->name('promotion_orders_folder');
    Route::post('/add_file_promotion_orders', [FileController::class, 'add_file_promotion_orders'])->name('add_file_promotion_orders');
    Route::get('/view_promotion_orders/{fid}', [FileController::class, 'view_promotion_orders'])->name('view_promotion_orders');
    Route::post('/update_file_promotion_orders', [FileController::class, 'update_file_promotion_orders'])->name('update_file_promotion_orders');

    Route::get('/sus_dem_orders/{pid}', [HomeController::class, 'sus_dem_orders_folder'])->name('sus_dem_orders_folder');
    Route::post('/add_file_susdem_orders', [FileController::class, 'add_file_susdem_orders'])->name('add_file_susdem_orders');
    Route::get('/view_susdem_orders/{fid}', [FileController::class, 'view_susdem_orders'])->name('view_susdem_orders');
    Route::post('/update_file_susdem_orders', [FileController::class, 'update_file_susdem_orders'])->name('update_file_susdem_orders');

    Route::get('/attested_appts/{pid}', [HomeController::class, 'attested_orders_folder'])->name('attested_orders_folder');
    Route::post('/add_file_attested_appts', [FileController::class, 'add_file_attested_appts'])->name('add_file_attested_appts');
    Route::get('/view_attested_appts/{fid}', [FileController::class, 'view_attested_appts'])->name('view_attested_appts');
    Route::post('/update_file_attested_appts', [FileController::class, 'update_file_attested_appts'])->name('update_file_attested_appts');

    Route::get('/cert_eli_orders/{pid}', [HomeController::class, 'cert_eli_orders_folder'])->name('cert_eli_orders_folder');
    Route::post('/add_file_cert_eli', [FileController::class, 'add_file_cert_eli'])->name('add_file_cert_eli');
    Route::get('/view_cert_eli/{fid}', [FileController::class, 'view_cert_eli'])->name('view_cert_eli');
    Route::post('/update_file_cert_eli', [FileController::class, 'update_file_cert_eli'])->name('update_file_cert_eli');

    Route::get('/scholastic_rec/{pid}', [HomeController::class, 'scholastic_rec_folder'])->name('scholastic_rec_folder');
    Route::post('/add_file_scholastic_rec', [FileController::class, 'add_file_scholastic_rec'])->name('add_file_scholastic_rec');
    Route::get('/view_scholastic_rec/{fid}', [FileController::class, 'view_scholastic_rec'])->name('view_scholastic_rec');
    Route::post('/update_file_scholastic_rec', [FileController::class, 'update_file_scholastic_rec'])->name('update_file_scholastic_rec');

    Route::get('/trainings/{pid}', [HomeController::class, 'trainings_folder'])->name('trainings_folder');
    Route::post('/add_file_trainings', [FileController::class, 'add_file_trainings'])->name('add_file_trainings');
    Route::get('/view_trainings/{fid}', [FileController::class, 'view_trainings'])->name('view_trainings');
    Route::post('/update_file_trainings', [FileController::class, 'update_file_trainings'])->name('update_file_trainings');

    Route::get('/rca_longpay_orders/{pid}', [HomeController::class, 'rca_longpay_folder'])->name('rca_longpay_folder');
    Route::post('/add_file_rca_longpay', [FileController::class, 'add_file_rca_longpay'])->name('add_file_rca_longpay');
    Route::get('/view_rca_longpay/{fid}', [FileController::class, 'view_rca_longpay'])->name('view_rca_longpay');
    Route::post('/update_file_rca_longpay', [FileController::class, 'update_file_rca_longpay'])->name('update_file_rca_longpay');

    Route::get('/assign_des_orders/{pid}', [HomeController::class, 'assign_des_orders_folder'])->name('assign_des_orders_folder');
    Route::post('/add_file_assign_des', [FileController::class, 'add_file_assign_des'])->name('add_file_assign_des');
    Route::get('/view_assign_des/{fid}', [FileController::class, 'view_assign_des'])->name('view_assign_des');
    Route::post('/update_file_assign_des', [FileController::class, 'update_file_assign_des'])->name('update_file_assign_des');

    Route::get('/cases_offenses/{pid}', [HomeController::class, 'cases_offenses_folder'])->name('cases_offenses_folder');
    Route::post('/add_file_cases_offenses', [FileController::class, 'add_file_cases_offenses'])->name('add_file_cases_offenses');
    Route::get('/view_cases_offenses/{fid}', [FileController::class, 'view_cases_offenses'])->name('view_cases_offenses');
    Route::post('/update_file_cases_offenses', [FileController::class, 'update_file_cases_offenses'])->name('update_file_cases_offenses');

    Route::get('/firearms_records/{pid}', [HomeController::class, 'firearms_records_folder'])->name('firearms_records_folder');
    Route::post('/add_file_firearms_rec', [FileController::class, 'add_file_firearms_rec'])->name('add_file_firearms_rec');
    Route::get('/view_firearms_rec/{fid}', [FileController::class, 'view_firearms_rec'])->name('view_firearms_rec');
    Route::post('/update_file_firearms_rec', [FileController::class, 'update_file_firearms_rec'])->name('update_file_firearms_rec');

    Route::get('/leave_orders/{pid}', [HomeController::class, 'leave_orders_folder'])->name('leave_orders_folder');
    Route::post('/add_file_leave_orders', [FileController::class, 'add_file_leave_orders'])->name('add_file_leave_orders');
    Route::get('/view_leave_orders/{fid}', [FileController::class, 'view_leave_orders'])->name('view_leave_orders');
    Route::post('/update_file_leave_orders', [FileController::class, 'update_file_leave_orders'])->name('update_file_leave_orders');

    Route::get('/awards/{pid}', [HomeController::class, 'awards_folder'])->name('awards_folder');
    Route::post('/add_file_awards', [FileController::class, 'add_file_awards'])->name('add_file_awards');
    Route::get('/view_awards/{fid}', [FileController::class, 'view_awards'])->name('view_awards');
    Route::post('/update_file_awards', [FileController::class, 'update_file_awards'])->name('update_file_awards');

    Route::get('/saln/{pid}', [HomeController::class, 'saln_folder'])->name('saln_folder');
    Route::post('/add_file_saln', [FileController::class, 'add_file_saln'])->name('add_file_saln');
    Route::get('/view_saln/{fid}', [FileController::class, 'view_saln'])->name('view_saln');
    Route::post('/update_file_saln', [FileController::class, 'update_file_saln'])->name('update_file_saln');

    Route::get('/others/{pid}', [HomeController::class, 'others_folder'])->name('others_folder');
    Route::post('/add_file_others', [FileController::class, 'add_file_others'])->name('add_file_others');
    Route::get('/view_others/{fid}', [FileController::class, 'view_others'])->name('view_others');
    Route::post('/update_file_others', [FileController::class, 'update_file_others'])->name('update_file_others');

    Route::get('/add_police_form', [PoliceController::class, 'add_police_form'])->name('add_police_form');
    Route::post('/adding_police', [PoliceController::class, 'adding_police'])->name('adding_police');

    Route::get('/admin_acc_mngt', [HomeController::class, 'admin_acc_mngt'])->name('admin_acc_mngt');
    Route::get('/add_admin', [AdminController::class, 'add_admin'])->name('add_admin_form');
    Route::post('/add_admin_acc', [AdminController::class, 'add_admin_acc'])->name('add_admin_acc'); 
    Route::get('/view_admin/{aid}', [AdminController::class, 'view_admin'])->name('view_admin_form');
    Route::get('/edit_admin/{aid}', [AdminController::class, 'edit_admin'])->name('edit_admin_form');
    Route::post('/edit_admin_acc/{aid}', [AdminController::class, 'edit_admin_acc'])->name('edit_admin_acc');
    Route::post('/update_admin_acc/{aid}', [AdminController::class, 'update_admin_acc'])->name('update_admin_acc');

    Route::get('/change_password_form', [AdminController::class, 'change_password_form'])->name('change_password_form');
    Route::post('/changing_password', [AdminController::class, 'changing_password'])->name('changing_password');

    Route::get('/navbar', [HomeController::class, 'navbar'])->name('navbar');
});