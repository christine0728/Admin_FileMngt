<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function add_file_pds(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'pds-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_pds/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'pds', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_pds($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_pds\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function add_file_appt_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'appt_orders-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_appt_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'appointment_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_appt_orders($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_appt_orders\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function add_file_promotion_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'promotion_orders-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_promotion_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'promotion_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }
    
    public function add_file_susdem_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'susdem_orders-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_susdem_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'susdem_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_attested_appts(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'attested_appts-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_attested_appts/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'attested_appts', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_cert_eli(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cert_eli-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cert_eli/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cert_eli', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_scholastic_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'scholastic_rec-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_scholastic_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'scholastic_records', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_trainings(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'trainings-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_trainings/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'trainings', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_rca_longpay(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'rca_longpay-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_rca_longpay/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'rca_longpay_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_assign_des(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'assign_des-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_assign_des/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'assign_des_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_cases_offenses(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cases_offenses-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cases_offenses/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cases_offenses', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_firearms_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'firearms_rec-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_firearms_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'firearms_records', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_leave_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'leave_orders-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_leave_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'leave_orders', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }
    
    public function add_file_awards(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'awards-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_awards/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'awards', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_saln(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'saln-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_saln/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'saln', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function add_file_others(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'others-' . time() . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_others/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'others', 
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

}
