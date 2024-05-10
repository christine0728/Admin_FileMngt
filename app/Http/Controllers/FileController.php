<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function add_file_folder_a(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');
  
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_a-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_a/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid, 
                    'author_id' => $aid, 
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_a', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }
  
        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_a($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_a\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_a(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_a-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_a/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_a', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_b(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_b-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_b/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid, 
                    'author_id' => $aid, 
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_b', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'folder_b-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_folder_b/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'folder_b', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_b($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_b\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_b(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_b-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_b/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid, 
                    'author_id' => $aid, 
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_b', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'psa-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_psa/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'psa', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_c(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_c-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_c/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                // dd('here');
                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_c', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_c($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_c\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_c(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_c-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_appt_orders/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_c', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'appt_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_appt_orders/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id; 
        //     'complete_filename' => $file,
        //     'folder' => 'appointment_orders', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_d(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_d-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_d/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_d', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'folder_d-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_folder_d/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'folder_d', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_d($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_d\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_d(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_d-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_d/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_d', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'promotion_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_promotion_orders/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'promotion_orders', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }
    
    public function add_file_folder_e(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_e-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_e/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_e', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'folder_e-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_folder_e/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
  
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'folder_e', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_e($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_e\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_e(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_e-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_e/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_e', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'susdem_orders-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_susdem_orders/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'susdem_orders', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_f(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_f-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_f/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_f', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'folder_f-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_folder_f/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'folder_f', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_f($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_f\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_f(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_f-updates-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_f/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_f', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'attested_appts-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_attested_appts/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'attested_appts', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_g(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_g-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_g/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_g', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_g($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_g\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_g(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_g-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_g/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_g', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_h(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_h-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_h/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_h', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_h($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_h\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_h(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_h-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_h/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_h', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'scholastic_rec-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_scholastic_rec/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'scholastic_records', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_i(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_i-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_i/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_i', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_i($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_i\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_i(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');
        
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_i-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_i/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_i', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_j(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');  
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_j-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_j/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_j', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_j($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_j\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_j(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_j-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_j/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_j', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_k(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_k-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_k/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_k', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_k($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_k\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_folder_k(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_k-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_k/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_k', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_l(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_l-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_l/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_l', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_l($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_l\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_folder_l(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');
        
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_l-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_l/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_l', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_m(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_m-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_m/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_m', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_m($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_m\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_folder_m(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_m-update' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_m/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_m', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_n(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_n-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_n/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_n', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_n($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_n\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_folder_n(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_n-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_n/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_n', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }
    
    public function add_file_folder_o(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_o-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_o/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_o', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'folder_o-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_folder_o/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'folder_o', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_o($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_o\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    } 

    public function update_file_folder_o(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_o-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_o/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_o', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_p(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_p-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_p/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_p', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_p($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_p\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_p(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_p-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_p/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_p', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        }

        // if ($request->hasFile('file')) {
        //     $filee = $request->file('file'); 
        //     $file = $filename . '-' . 'saln-update-' . $filename_time . '.' . $filee->getClientOriginalExtension();
        //     $filee->move('files/files_saln/', $file);  
        // }else {
        //     return redirect()->back();
        // }

        // $aid = Auth::guard('admin')->user()->id;
 
        //     'police_id' => $request->input('pid'),
        //     'filename' => $filename,
        //     'complete_filename' => $file,
        //     'folder' => 'saln', 
        //     'created_at' => $formatted_now,
        //     'updated_at' => $formatted_now,
        // ]);

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

    public function add_file_folder_q(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_q-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_q/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_q', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 
        
        return redirect()->back()->with('message', 'The file has been added successfully!');
    }

    public function view_folder_q($fid)
    {
        $file = File::find($fid);

        if ($file) {
            $filePath = public_path('files\\files_folder_q\\' . $file->complete_filename);
            // dd($filePath);
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        } 
        abort(404);
    }

    public function update_file_folder_q(Request $request)
    {
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');

        // dd($now);

        // $filename = $request->input('pol_fullname');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile){
                $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $filee = $request->file('file'); 
                $file = $filename . '-' . 'folder_q-update-' . $filename_time . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move('files/files_folder_q/', $file);  

                $aid = Auth::guard('admin')->user()->id;

                $files = File::create([
                    'author_id' => $aid,  
                    'police_id' => $request->input('pid'),
                    'filename' => $filename,
                    'complete_filename' => $file,
                    'folder' => 'folder_q', 
                    'created_at' => $formatted_now,
                    'updated_at' => $formatted_now,
                ]);
            }   
        }else {
            return redirect()->back();
        } 

        return redirect()->back()->with('message', 'The file has been uploaded successfully!');
    }

}
