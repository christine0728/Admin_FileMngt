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

    Route::get('/view_pds/{pid}', [HomeController::class, 'pds_folder'])->name('pds_folder');

    Route::get('/add_police_form', [PoliceController::class, 'add_police_form'])->name('add_police_form');
    Route::post('/adding_police', [PoliceController::class, 'adding_police'])->name('adding_police');

    Route::get('/navbar', [HomeController::class, 'navbar'])->name('navbar');
});