<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use App\Models\Police;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    public function view_police($pid)
    {
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.view_police', ['police' => $police]);
    }

    public function view_police_file($pid){
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.view_police_file', ['police'=>$police]);
    }

    public function add_police_form()
    {
        return view('admin.add_police_form');
    }

    public function adding_police(Request $request){  
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
 
        $rules = [
            'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_rank' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_unit_station' => 'required|regex:/^[a-zA-Z,]+$/',
            'per_house_no' => 'required|regex:/^[a-zA-Z0-9\s#]+$/',
            'per_street' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_place_birth' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_date_birth' => 'required|date|before_or_equal:-21 years',
            'per_sex' => 'required|in:Male,Female',
            'per_civil_status' => 'required',
            'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_color_hair' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_color_eyes' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_height' => 'required|numeric',
            'per_weight' => 'required|numeric',
            'per_bloodtype' => 'required',
            'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_languages' => 'required',
            'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9 -]+$/',
            'per_ethnicgroup' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/',
            // Add more validation rules as needed
        ];

        // Custom error messages
        $messages = [
            'required' => 'The field is required.',
            'regex' => 'The field must only contain letters, spaces, dashes, commas, numbers, hash symbols, or special characters.',
            'before_or_equal' => 'The must be a date before or equal to 21 years ago.',
            'in' => 'The selected is invalid.',
            'numeric' => 'The must be a number.',
            'date' => 'The must be a valid date.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, create the Police record
        $now = Carbon::now()->setTimezone('Asia/Manila');

        $police = Police::create([
            'per_lastname' => $validatedData['per_lastname'],
            'per_firstname' => $validatedData['per_firstname'],
            'per_middlename' => $validatedData['per_middlename'],
            'per_rank' => $validatedData['per_rank'],
            'per_unit_station' => $validatedData['per_unit_station'],
            'per_house_no' => $validatedData['per_house_no'],
            'per_street' => $validatedData['per_street'],
            'per_city' => $validatedData['per_city'],
            'per_province' => $validatedData['per_province'],
            'per_place_birth' => $validatedData['per_place_birth'],
            'per_date_birth' => $validatedData['per_date_birth'],
            'per_sex' => $validatedData['per_sex'],
            'per_civil_status' => $validatedData['per_civil_status'],
            'per_religion' => $validatedData['per_religion'],
            'per_color_hair' => $validatedData['per_color_hair'],
            'per_color_eyes' => $validatedData['per_color_eyes'],
            'per_height' => $validatedData['per_height'],
            'per_weight' => $validatedData['per_weight'],
            'per_bloodtype' => $validatedData['per_bloodtype'],
            'per_build' => $validatedData['per_build'],
            'per_complexion' => $validatedData['per_complexion'],
            'per_languages' => $validatedData['per_languages'],
            'per_identifying_marks' => $validatedData['per_identifying_marks'],
            'per_ethnicgroup' => $validatedData['per_ethnicgroup'],
            'per_name_spouse_near_kin' => $validatedData['per_name_spouse_near_kin'],
            'per_spouse_kin_occupation' => $validatedData['per_spouse_kin_occupation'],
            'created_at' => $now,
        ]);

        $user = Police::create([ 
            'per_lastname' => $request->input('per_lastname'),
            'per_firstname' => $request->input('per_firstname'),
            'per_middlename' => $request->input('per_middlename'),
            'per_rank' => $request->input('per_rank'),
            'per_unit_station' => $request->input('per_unit_station'),
            'per_house_no' => $request->input('per_house_no'),
            'per_street' => $request->input('per_street'),
            'per_city' => $request->input('per_city'),
            'per_province' => $request->input('per_province'),
            'per_place_birth' => $request->input('per_place_birth'),
            'per_date_birth' => $request->input('per_date_birth'),
            'per_sex' => $request->input('per_sex'),
            'per_civil_status' => $request->input('per_civil_status'),
            'per_religion' => $request->input('per_religion'),
            'per_color_hair' => $request->input('per_color_hair'),
            'per_color_eyes' => $request->input('per_color_eyes'),
            'per_height' => $request->input('per_height'),
            'per_weight' => $request->input('per_weight'),
            'per_bloodtype' => $request->input('per_bloodtype'),
            'per_build' => $request->input('per_build'),
            'per_complexion' => $request->input('per_complexion'),
            'per_languages' => $request->input('per_languages'),
            'per_identifying_marks' => $request->input('per_identifying_marks'),
            'per_ethnicgroup' => $request->input('per_ethnicgroup'),
            'per_name_spouse_near_kin' => $request->input('per_name_spouse_near_kin'),
            'per_spouse_kin_occupation' => $request->input('per_spouse_kin_occupation'), 
            'created_at' => $now,
        ]);

        return redirect()->route('police_file_mngt')->with('message', 'The record has been added successfully!');
    }
}
