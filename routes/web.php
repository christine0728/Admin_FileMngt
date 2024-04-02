<?php

use App\Http\Controllers\HomeController;
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
    Route::get('/personnel_file_mngt', [HomeController::class, 'personnel_file_mngt'])->name('personnel_file_mngt');
});