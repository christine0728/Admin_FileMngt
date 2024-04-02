<?php

namespace App\Http\Controllers;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function login_view()
    {
        return view('login_view');
    }

    public function add_admin()
    {
        return view('add_admin_form');
    }

    public function add_admin_acc(Request $request){  
        $user = Admin::create([ 
            'username' => $request->input('username'),
            'password' => Hash::make($request->password), 
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('message', 'The record has been added successfully!');
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

                return redirect()->route('personnel_file_mngt')->with('error', 'investigator account logged in successfully');
            } else {
                dd('User not authenticated');
            }
        }
        else{
            return back()->with('error', 'The username or password you entered is incorrect.');
        }
    }

    public function personnel_file_mngt()
    {
        return view('admin.personnel_file_mngt');
    }
}
