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

    public function folder_a($pid)
    { 
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_a')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_a')
            ->orderByDesc('created_at')
            ->get();
        $police = Police::where('id', '=', $pid)->first();

        $fid = $file->id ?? 0;

        return view('admin.folder_a', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_b($pid)
    { 
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_b')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_b')
            ->orderByDesc('created_at')
            ->get();
        $police = Police::where('id', '=', $pid)->first();

        $fid = $file->id ?? 0;

        return view('admin.folder_b', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_c($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_c')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_c')            
            ->orderByDesc('created_at')
            ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_c', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_d($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_d')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_d')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_d', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_e($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_e')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_e')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_e', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_f($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_f')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_f')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_f', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_g($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_g')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_g')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_g', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_h($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_h')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_h')        
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_h', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_i($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_i')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_i')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_i', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_j($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_j')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_j')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_j', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_k($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_k')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_k')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_k', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_l($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_l')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_l')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_l', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_m($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_m')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_m')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_m', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_n($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_n')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_n')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_n', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_o($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_o')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_o')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_o', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_p($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_p')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_p')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_p', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function folder_q($pid)
    {
        $file = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_q')->first();
        $files = File::where('police_id', '=', $pid)->where('folder', '=', 'folder_q')
        ->orderByDesc('created_at')
        ->get();

        $fid = $file->id ?? 0;

        $police = Police::where('id', '=', $pid)->first();
        return view('admin.folder_q', ['police' => $police, 'file'=>$file, 'files'=>$files, 'fid'=>$fid]);
    }

    public function admin_acc_mngt()
    {
        $admin = Admin::where('status', '=', 'active')->orderByDesc('id')->get();
        $inadmin = Admin::where('status', '=', 'inactive')->orderByDesc('id')->get();
        return view('admin.admin_acc_mngt', ['admin' => $admin, 'inadmin' => $inadmin]);
    }
 
}
