<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function add_admin()
    {
        return view('admin.add_admin_account');
    }

    public function add_admin_acc(Request $request){  
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $user = Admin::create([ 
            'firstname' => $request->input('firstname'),
            'middle_initial' => $request->input('middle_initial'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->password), 
            'conf_password' => Hash::make($request->conf_password),
            'created_at' => $now,
        ]);

        return redirect()->route('admin_acc_mngt')->with('added', 'Admin Account added successfully!'); 
    }

    public function view_admin($aid)
    {
        $admin = Admin::where('id', '=', $aid)->get();
        return view('admin.view_admin_account', ['admin'=>$admin]);
    }

    public function edit_admin($aid)
    {
        $admin = Admin::where('id', '=', $aid)->get();
        return view('admin.edit_admin_account', ['admin'=>$admin]);
    }

    public function edit_admin_acc(Request $request, $aid)
    {
        $admin = Admin::where('id', '=', $aid)->get();
        Admin::where('id', $aid)
        ->update([
            'firstname' => $request->input('firstname'), 
            'lastname' => $request->input('lastname'),
            'middle_initial' => $request->input('middle_initial'),  
            'username' => $request->input('username'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin_acc_mngt')->with('edited', 'Admin Account edited successfully!');
    }

    public function update_admin_acc(Request $request, $aid)
    {
        $admin = Admin::where('id', '=', $aid)->get();
        Admin::where('id', $aid)
        ->update([
            'firstname' => $request->input('firstname'), 
            'lastname' => $request->input('lastname'),
            'middle_initial' => $request->input('middle_initial'),  
            'username' => $request->input('username'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin_acc_mngt')->with('edited', 'Admin Account edited successfully!');
    }

    public function change_password_form()
    {
        $admin = Admin::get();
        return view('admin.change_password', ['admin'=>$admin]);
    }

    public function changing_password(Request $request)
    { 
        $aid = Auth::guard('admin')->user()->id;
        $username = $request->input('username');
        $invs = Admin::where('id', '=', $aid)
            ->first();
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['username' => $check['username'], 'password' => $check['curr_password']])){
            if(Auth::guard('admin')->check()){
                // dd('goods');
                Admin::where('id', $aid)
                ->update([
                    'password' => Hash::make($request->new_password),
                ]);
                // dd('napalitan');
                return redirect()->route('view_admin_form', ['aid'=>$aid])->with('error', "Password changed successfully!");
            }
        }
        else{
            return redirect()->back()->with('error', 'The username or current password you entered is incorrect.');
        }
    }
}
