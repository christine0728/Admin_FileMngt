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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'login_view'])->name('login_form');
Route::post('/login_account', [HomeController::class, 'login'])->name('logging_in');
Route::get('/inactive', [HomeController::class, 'inactive'])->name('inactive');

Route::prefix('admin')->group(function(){
    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

    Route::get('/police_file_mngt', [HomeController::class, 'police_file_mngt'])->name('police_file_mngt');
    Route::get('/view_police/{pid}', [PoliceController::class, 'view_police'])->name('view_police');
    Route::get('/view_police_file/{pid}', [PoliceController::class, 'view_police_file'])->name('view_police_file');
    Route::get('/edit_police_file/{pid}', [PoliceController::class, 'edit_police_file'])->name('edit_police_file');
    Route::post('/update_police_file/{pid}', [PoliceController::class, 'update_police_file'])->name('update_police_file');
    Route::get('/personnelfile_pdf/{pid}', [HomeController::class, 'personnelfile_pdf'])->name('personnelfile_pdf');

    Route::get('/folder_a/{pid}', [HomeController::class, 'folder_a'])->name('folder_a');
    Route::post('/add_file_folder_a', [FileController::class, 'add_file_folder_a'])->name('add_file_folder_a');
    Route::get('/view_folder_a/{fid}', [FileController::class, 'view_folder_a'])->name('view_folder_a');
    Route::post('/update_file_folder_a', [FileController::class, 'update_file_folder_a'])->name('update_file_folder_a');

    Route::get('/folder_b/{pid}', [HomeController::class, 'folder_b'])->name('folder_b');
    Route::post('/add_file_folder_b', [FileController::class, 'add_file_folder_b'])->name('add_file_folder_b');
    Route::get('/view_folder_b/{fid}', [FileController::class, 'view_folder_b'])->name('view_folder_b');
    Route::post('/update_file_folder_b', [FileController::class, 'update_file_folder_b'])->name('update_file_folder_b');

    Route::get('/folder_c/{pid}', [HomeController::class, 'folder_c'])->name('folder_c');
    Route::post('/add_file_folder_c', [FileController::class, 'add_file_folder_c'])->name('add_file_folder_c');
    Route::get('/view_folder_c/{fid}', [FileController::class, 'view_folder_c'])->name('view_folder_c');
    Route::post('/update_file_folder_c', [FileController::class, 'update_file_folder_c'])->name('update_file_folder_c');

    Route::get('/folder_d/{pid}', [HomeController::class, 'folder_d'])->name('folder_d');
    Route::post('/add_file_folder_d', [FileController::class, 'add_file_folder_d'])->name('add_file_folder_d');
    Route::get('/view_folder_d/{fid}', [FileController::class, 'view_folder_d'])->name('view_folder_d');
    Route::post('/update_file_folder_d', [FileController::class, 'update_file_folder_d'])->name('update_file_folder_d');

    Route::get('/folder_e/{pid}', [HomeController::class, 'folder_e'])->name('folder_e');
    Route::post('/add_file_folder_e', [FileController::class, 'add_file_folder_e'])->name('add_file_folder_e');
    Route::get('/view_folder_e/{fid}', [FileController::class, 'view_folder_e'])->name('view_folder_e');
    Route::post('/update_file_folder_e', [FileController::class, 'update_file_folder_e'])->name('update_file_folder_e');

    Route::get('/folder_f/{pid}', [HomeController::class, 'folder_f'])->name('folder_f');
    Route::post('/add_file_folder_f', [FileController::class, 'add_file_folder_f'])->name('add_file_folder_f');
    Route::get('/view_folder_f/{fid}', [FileController::class, 'view_folder_f'])->name('view_folder_f');
    Route::post('/update_file_folder_f', [FileController::class, 'update_file_folder_f'])->name('update_file_folder_f');

    Route::get('/folder_g/{pid}', [HomeController::class, 'folder_g'])->name('folder_g');
    Route::post('/add_file_folder_g', [FileController::class, 'add_file_folder_g'])->name('add_file_folder_g');
    Route::get('/view_folder_g/{fid}', [FileController::class, 'view_folder_g'])->name('view_folder_g');
    Route::post('/update_file_folder_g', [FileController::class, 'update_file_folder_g'])->name('update_file_folder_g');

    Route::get('/folder_h/{pid}', [HomeController::class, 'folder_h'])->name('folder_h');
    Route::post('/add_file_folder_h', [FileController::class, 'add_file_folder_h'])->name('add_file_folder_h');
    Route::get('/view_folder_h/{fid}', [FileController::class, 'view_folder_h'])->name('view_folder_h');
    Route::post('/update_file_folder_h', [FileController::class, 'update_file_folder_h'])->name('update_file_folder_h');

    Route::get('/folder_i/{pid}', [HomeController::class, 'folder_i'])->name('folder_i');
    Route::post('/add_file_folder_i', [FileController::class, 'add_file_folder_i'])->name('add_file_folder_i');
    Route::get('/view_folder_i/{fid}', [FileController::class, 'view_folder_i'])->name('view_folder_i');
    Route::post('/update_file_folder_i', [FileController::class, 'update_file_folder_i'])->name('update_file_folder_i');

    Route::get('/folder_j/{pid}', [HomeController::class, 'folder_j'])->name('folder_j');
    Route::post('/add_file_folder_j', [FileController::class, 'add_file_folder_j'])->name('add_file_folder_j');
    Route::get('/view_folder_j/{fid}', [FileController::class, 'view_folder_j'])->name('view_folder_j');
    Route::post('/update_file_folder_j', [FileController::class, 'update_file_folder_j'])->name('update_file_folder_j');

    Route::get('/folder_k/{pid}', [HomeController::class, 'folder_k'])->name('folder_k');
    Route::post('/add_file_folder_k', [FileController::class, 'add_file_folder_k'])->name('add_file_folder_k');
    Route::get('/view_folder_k/{fid}', [FileController::class, 'view_folder_k'])->name('view_folder_k');
    Route::post('/update_file_folder_k', [FileController::class, 'update_file_folder_k'])->name('update_file_folder_k');

    Route::get('/folder_l/{pid}', [HomeController::class, 'folder_l'])->name('folder_l');
    Route::post('/add_file_folder_l', [FileController::class, 'add_file_folder_l'])->name('add_file_folder_l');
    Route::get('/view_folder_l/{fid}', [FileController::class, 'view_folder_l'])->name('view_folder_l');
    Route::post('/update_file_folder_l', [FileController::class, 'update_file_folder_l'])->name('update_file_folder_l');

    Route::get('/folder_m/{pid}', [HomeController::class, 'folder_m'])->name('folder_m');
    Route::post('/add_file_folder_m', [FileController::class, 'add_file_folder_m'])->name('add_file_folder_m');
    Route::get('/view_folder_m/{fid}', [FileController::class, 'view_folder_m'])->name('view_folder_m');
    Route::post('/update_file_folder_m', [FileController::class, 'update_file_folder_m'])->name('update_file_folder_m');

    Route::get('/folder_n/{pid}', [HomeController::class, 'folder_n'])->name('folder_n');
    Route::post('/add_file_folder_n', [FileController::class, 'add_file_folder_n'])->name('add_file_folder_n');
    Route::get('/view_folder_n/{fid}', [FileController::class, 'view_folder_n'])->name('view_folder_n');
    Route::post('/update_file_folder_n', [FileController::class, 'update_file_folder_n'])->name('update_file_folder_n');

    Route::get('/folder_o/{pid}', [HomeController::class, 'folder_o'])->name('folder_o');
    Route::post('/add_file_folder_o', [FileController::class, 'add_file_folder_o'])->name('add_file_folder_o');
    Route::get('/view_folder_o/{fid}', [FileController::class, 'view_folder_o'])->name('view_folder_o');
    Route::post('/update_file_folder_o', [FileController::class, 'update_file_folder_o'])->name('update_file_folder_o');

    Route::get('/folder_p/{pid}', [HomeController::class, 'folder_p'])->name('folder_p');
    Route::post('/add_file_folder_p', [FileController::class, 'add_file_folder_p'])->name('add_file_folder_p');
    Route::get('/view_folder_p/{fid}', [FileController::class, 'view_folder_p'])->name('view_folder_p');
    Route::post('/update_file_folder_p', [FileController::class, 'update_file_folder_p'])->name('update_file_folder_p');

    Route::get('/folder_q/{pid}', [HomeController::class, 'folder_q'])->name('folder_q');
    Route::post('/add_file_folder_q', [FileController::class, 'add_file_folder_q'])->name('add_file_folder_q');
    Route::get('/view_folder_q/{fid}', [FileController::class, 'view_folder_q'])->name('view_folder_q');
    Route::post('/update_file_folder_q', [FileController::class, 'update_file_folder_q'])->name('update_file_folder_q');

    Route::get('/add_police_form', [PoliceController::class, 'add_police_form'])->name('add_police_form');
    Route::post('/adding_police', [PoliceController::class, 'adding_police'])->name('adding_police');
    Route::post('/change_status_pol/{pid}', [PoliceController::class, 'change_status_pol'])->name('change_status_pol');

    Route::get('/admin_acc_mngt', [HomeController::class, 'admin_acc_mngt'])->name('admin_acc_mngt');
    Route::get('/add_admin', [AdminController::class, 'add_admin'])->name('add_admin_form');
    Route::post('/add_admin_acc', [AdminController::class, 'add_admin_acc'])->name('add_admin_acc'); 
    Route::get('/view_admin/{aid}', [AdminController::class, 'view_admin'])->name('view_admin_form');
    Route::get('/edit_admin/{aid}', [AdminController::class, 'edit_admin'])->name('edit_admin_form');
    Route::post('/edit_admin_acc/{aid}', [AdminController::class, 'edit_admin_acc'])->name('edit_admin_acc');
    Route::post('/update_admin_acc/{aid}', [AdminController::class, 'update_admin_acc'])->name('update_admin_acc');
    Route::post('/change_status/{aid}', [AdminController::class, 'change_status'])->name('change_status');

    Route::get('/change_password_form', [AdminController::class, 'change_password_form'])->name('change_password_form');
    Route::post('/changing_password', [AdminController::class, 'changing_password'])->name('changing_password');

    Route::get('/navbar', [HomeController::class, 'navbar'])->name('navbar');
});