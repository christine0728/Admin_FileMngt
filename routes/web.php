<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PoliceController;
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
Route::get('/add_admin', [HomeController::class, 'add_admin'])->name('add_admin_form');
Route::post('/add_admin_acc', [HomeController::class, 'add_admin_acc'])->name('add_admin_acc');

Route::prefix('admin')->group(function(){
    Route::get('/police_file_mngt', [HomeController::class, 'police_file_mngt'])->name('police_file_mngt');
    Route::get('/view_police/{pid}', [PoliceController::class, 'view_police'])->name('view_police');

    Route::get('/pds/{pid}', [HomeController::class, 'pds_folder'])->name('pds_folder');
    Route::get('/appt_orders/{pid}', [HomeController::class, 'appt_orders_folder'])->name('appt_orders_folder');
    Route::get('/promotion_orders/{pid}', [HomeController::class, 'promotion_orders_folder'])->name('promotion_orders_folder');
    Route::get('/sus_dem_orders/{pid}', [HomeController::class, 'sus_dem_orders_folder'])->name('sus_dem_orders_folder');
    Route::get('/attested_orders/{pid}', [HomeController::class, 'attested_orders_folder'])->name('attested_orders_folder');
    Route::get('/cert_eli_orders/{pid}', [HomeController::class, 'cert_eli_orders_folder'])->name('cert_eli_orders_folder');
    Route::get('/scholastic_rec_orders/{pid}', [HomeController::class, 'scholastic_rec_orders_folder'])->name('scholastic_rec_orders_folder');
    Route::get('/trainings/{pid}', [HomeController::class, 'trainings_folder'])->name('trainings_folder');
    Route::get('/rca_longpay_orders/{pid}', [HomeController::class, 'rca_longpay_folder'])->name('rca_longpay_folder');
    Route::get('/assign_des_orders/{pid}', [HomeController::class, 'assign_des_orders_folder'])->name('assign_des_orders_folder');
    Route::get('/cases_offenses/{pid}', [HomeController::class, 'cases_offenses_folder'])->name('cases_offenses_folder');
    Route::get('/firearms_records/{pid}', [HomeController::class, 'firearms_records_folder'])->name('firearms_records_folder');
    Route::get('/leave_orders/{pid}', [HomeController::class, 'leave_orders_folder'])->name('leave_orders_folder');
    Route::get('/awards/{pid}', [HomeController::class, 'awards_folder'])->name('awards_folder');
    Route::get('/saln/{pid}', [HomeController::class, 'saln_folder'])->name('saln_folder');
    Route::get('/others/{pid}', [HomeController::class, 'others_folder'])->name('others_folder');


    Route::get('/add_police_form', [PoliceController::class, 'add_police_form'])->name('add_police_form');
    Route::post('/adding_police', [PoliceController::class, 'adding_police'])->name('adding_police');

    Route::get('/navbar', [HomeController::class, 'navbar'])->name('navbar');
});