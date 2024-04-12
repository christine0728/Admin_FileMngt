<?php

namespace App\Http\Controllers;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\File;
use App\Models\Police;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function navbar()
    {
        return view('admin.navbar');
    }

    public function login_view()
    {
        return view('login_view');
    }
  
    public function login(Request $request){  

        $username = $request->input('username');
        $check = $request->all();

        // $validatedData = $request->validate([ 
        //     'g-recaptcha-response' => 'required|captcha',
        // ]); 


        if(Auth::guard('admin')->attempt(['username' => $check['username'], 'password' => $check['password']])){
            // dd('here');
            if (Auth::guard('admin')->check()) {
                $pw = $check['password'];

                // dd('success');
                // if (NoCaptcha::verifyResponse($request->input('g-recaptcha-response'))) {
                //     // dd('captcha');
                //     $accepted = Admin::select('*')->where('username', $username) 
                //     ->first();

                //     dd('hereeeee');
                //         // return redirect()->route('investigator.dashboard')->with('error', 'investigator account logged in successfully'); 
                // } else {
                //     dd('hindeh');
                // } 

                return redirect()->route('police_file_mngt')->with('error', 'investigator account logged in successfully');
            } else {
                dd('User not authenticated');
            }
        }
        else{
            return back()->with('error', 'The username or password you entered is incorrect.');
        }
    }

    public function police_file_mngt()
    {
        $police = Police::get();
        return view('admin.police_file_mngt', ['police' => $police]);
    }

    public function pds_folder($pid)
    { 
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'pds')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'pds')->get();
        $police = Police::where('id', '=', $pid)->first();

        $fid = $file->id ?? 0;

        return view('admin.folder_pds', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function appt_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'appointment_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'appointment_orders')->get();
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_appt_orders', ['police' => $police, 'file'=>$file, 'files'=>$files]);
    }

    public function promotion_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_promotion_orders', ['police' => $police]);
    }

    public function sus_dem_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_sus_dem_orders', ['police' => $police]);
    }

    public function attested_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_attested_orders', ['police' => $police]);
    }

    public function cert_eli_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_cert_eli_orders', ['police' => $police]);
    }

    public function scholastic_rec_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_scholastic_rec', ['police' => $police]);
    }

    public function trainings_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_trainings', ['police' => $police]);
    }

    public function rca_longpay_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_rca_longpay_orders', ['police' => $police]);
    }

    public function assign_des_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_assign_des_orders', ['police' => $police]);
    }

    public function cases_offenses_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_cases_offenses', ['police' => $police]);
    }

    public function firearms_records_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_firearms_records', ['police' => $police]);
    }

    public function leave_orders_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_leave_orders', ['police' => $police]);
    }

    public function awards_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_awards', ['police' => $police]);
    }

    public function saln_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_saln', ['police' => $police]);
    }

    public function others_folder($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_others', ['police' => $police]);
    }

    public function admin_acc_mngt()
    {
        $admin = Admin::orderByDesc('id')->get();
        return view('admin.admin_acc_mngt', ['admin' => $admin]);
    }

    
}
