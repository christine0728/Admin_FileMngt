<?php

namespace App\Http\Controllers;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\File;
use App\Models\Police;
use Carbon\Carbon;
use Dompdf\Options;
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

    public function inactive()
    {
        return view('admin.inactive_status_screen');
    }
  
    public function login(Request $request){  

        $username = $request->input('username');
        $check = $request->all();

        $validatedData = $request->validate([ 
            'g-recaptcha-response' => 'required|captcha',
        ]); 


        if(Auth::guard('admin')->attempt(['username' => $check['username'], 'password' => $check['password']])){
            // dd('here');
            if (Auth::guard('admin')->check()) {
                $username = $check['username']; 

                if (NoCaptcha::verifyResponse($request->input('g-recaptcha-response'))) {
                    $active = Admin::select('*')->where('username', $username) 
                    ->first();

                    if ($active->status == 'active')
                    {
                        // dd('active');
                        return redirect()->route('police_file_mngt')->with('error', 'investigator account logged in successfully');
                    }

                    else{
                        // dd('inactive');
                        return redirect()->route('inactive');
                    } 
                } else {
                    return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA validation failed. Please try again.']); 
                } 

            } else {
                dd('User not authenticated');
            }
        }
        else{
            return back()->with('error', 'The username or password you entered is incorrect.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Admin logged out successfully');
    }

    public function police_file_mngt()
    {
        $police = Police::join('admins', 'admins.id', '=', 'police.author_id')
        ->select('police.id as pid', 'police.*')
        ->where('police.per_status', '=', 'active')->orderByDesc('police.id')->get();

        $in_police = Police::join('admins', 'admins.id', '=', 'police.author_id') 
        ->select('police.id as pid', 'police.*')
        ->where('police.per_status', '=', 'inactive')->orderByDesc('police.id')->get();

        $sch_police = Police::join('admins', 'admins.id', '=', 'police.author_id')
        ->select('police.id as pid', 'police.*')
        ->where('police.per_status', '=', 'schooling')->orderByDesc('police.id')->get();
        
        return view('admin.police_file_mngt', ['police' => $police, 'in_police' => $in_police, 'sch_police' => $sch_police]);
    }

    public function personnelfile_pdf(Request $request, $pid)
    {
        $acc_type = Auth::guard('admin')->user()->acc_type;

        $options = new Options(); 

        // Set custom margins (in millimeters)
        $options->set('defaultPaperSize', 'legal');
        $options->set('defaultPaperOrientation', 'portrait'); // Set the orientation if needed
        $options->set('margin-top', 10); // Adjust top margin
        $options->set('margin-right', 15); // Adjust right margin
        $options->set('margin-bottom', 10); // Adjust bottom margin
        $options->set('margin-left', 15); // Adjust left margin


        $police = Police::select('*')
            ->where('id', $pid)
            ->get(); 
 
        // Create the DOMPDF instance with the custom options
        $pdf = app('dompdf.wrapper', ['options' => $options]);

        $name = Auth::guard('admin')->user()->firstname;
        $rundate = Carbon::now();
  
        $pdf->loadView('admin.personnelfile_pdf', ['rundate'=>$rundate, 'police'=>$police]);
 
        return $pdf->stream('personnelfile.pdf');  
        
    }

    public function pds_folder($pid)
    { 
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'pds')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'pds')
            ->orderByDesc('created_at')
            ->get();
        $police = Police::where('id', '=', $pid)->first();

        $fid = $file->id ?? 0;

        return view('admin.folder_pds', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function psa_folder($pid)
    { 
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'psa')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'psa')
            ->orderByDesc('created_at')
            ->get();
        $police = Police::where('id', '=', $pid)->first();

        $fid = $file->id ?? 0;

        return view('admin.folder_psa', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function appt_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'appointment_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'appointment_orders')            
            ->orderByDesc('created_at')
            ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_appt_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function promotion_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'promotion_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'promotion_orders')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_promotion_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function sus_dem_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'susdem_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'susdem_orders')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_sus_dem_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function attested_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'attested_appts')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'attested_appts')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_attested_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function cert_eli_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'cert_eligibility')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'cert_eligibility')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_cert_eli_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function scholastic_rec_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'scholastic_records')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'scholastic_records')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_scholastic_rec', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function trainings_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'trainings')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'trainings')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_trainings', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function rca_longpay_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'rca_longpay_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'rca_longpay_orders')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_rca_longpay_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function assign_des_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'assign_des_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'assign_des_orders')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_assign_des_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function cases_offenses_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'cases_offenses')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'cases_offenses')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_cases_offenses', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function firearms_records_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'firearms_records')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'firearms_records')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_firearms_records', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function leave_orders_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'leave_orders')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'leave_orders')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_leave_orders', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function awards_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'awards')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'awards')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_awards', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function saln_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'saln')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'saln')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_saln', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function others_folder($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'others')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'others')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_others', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function admin_acc_mngt()
    {
        $admin = Admin::where('status', '=', 'active')->orderByDesc('id')->get();
        $inadmin = Admin::where('status', '=', 'inactive')->orderByDesc('id')->get();
        return view('admin.admin_acc_mngt', ['admin' => $admin, 'inadmin' => $inadmin]);
    }
 
}
