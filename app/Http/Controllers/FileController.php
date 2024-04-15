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
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'pds-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_pds/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'pds', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
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

    public function update_file_pds(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'pds-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_pds/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'pds', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_psa(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'psa-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_psa/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'psa', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_psa($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_psa\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_psa(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'psa-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_psa/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'psa', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_appt_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'appt_orders-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_appt_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'appointment_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
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

    public function update_file_appt_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'appt_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_appt_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'appointment_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_promotion_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'promotion_orders-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_promotion_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'promotion_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_promotion_orders($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_promotion_orders\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_promotion_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'promotion_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_promotion_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'promotion_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }
    
    public function add_file_susdem_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'susdem_orders-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_susdem_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'susdem_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_susdem_orders($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_susdem_orders\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_susdem_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'susdem_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_susdem_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'susdem_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_attested_appts(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'attested_appts-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_attested_appts/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'attested_appts', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_attested_appts($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_attested_appts\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_attested_appts(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'attested_appts-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_attested_appts/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'attested_appts', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_cert_eli(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cert_eli-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cert_eli/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cert_eligibility', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_cert_eli($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_cert_eli\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_cert_eli(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cert_eli-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cert_eli/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cert_eligibility', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_scholastic_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'scholastic_rec-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_scholastic_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'scholastic_records', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_scholastic_rec($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_scholastic_rec\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_scholastic_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'scholastic_rec-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_scholastic_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'scholastic_records', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_trainings(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'trainings-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_trainings/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'trainings', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_trainings($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_trainings\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_trainings(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'trainings-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_trainings/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'trainings', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_rca_longpay(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');  
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'rca_longpay-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_rca_longpay/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'rca_longpay_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_rca_longpay($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_rca_longpay\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_rca_longpay(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'rca_longpay_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_rca_longpay/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'rca_longpay_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_assign_des(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'assign_des-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_assign_des/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'assign_des_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_assign_des($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_assign_des\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_assign_des(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'assign_des-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_assign_des/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'assign_des_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_cases_offenses(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cases_offenses-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cases_offenses/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cases_offenses', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_cases_offenses($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_cases_offenses\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_cases_offenses(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'cases_offenses-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_cases_offenses/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'cases_offenses', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_firearms_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'firearms_rec-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_firearms_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'firearms_records', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_firearms_rec($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_firearms_rec\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_firearms_rec(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'firearms_rec-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_firearms_rec/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'firearms_records', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_leave_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'leave_orders-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_leave_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'leave_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_leave_orders($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_leave_orders\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_leave_orders(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'leave_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_leave_orders/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'leave_orders', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }
    
    public function add_file_awards(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'awards-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_awards/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'awards', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_awards($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_awards\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_awards(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'awards-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_awards/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'awards', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_saln(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'saln-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_saln/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'saln', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_saln($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_saln\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_saln(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'saln-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_saln/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'saln', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_others(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'others-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_others/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'others', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_others($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_others\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_others(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            $filee = $request->file('file'); 
            $file = $filename . '-' . 'others-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
            $filee->move('files/files_others/', $file);  
        }else {
            return redirect()->back();
        }

        $files = File::create([ 
            'police_id' => $request->input('pid'),
            'filename' => $filename,
            'complete_filename' => $file,
            'folder' => 'others', 
            'created_at' => $formatted_now,
            'updated_at' => $formatted_now,
        ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

}
