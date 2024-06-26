<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Support\Facades\Validator;
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
        $formatted_now = $now->format('Y-m-d, g:i a');
        $filename_time = $now->format('Y-m-d_gia');
        $filename = $request->input('per_firstname') . ' ' . $request->input('per_lastname');

        if ($request->hasFile('per_image')) {
            $per_file = $request->file('per_image');
            $per_extension = $per_file->getClientOriginalExtension();
            $per_filename = $filename . '-' . $filename_time . '.' . $per_extension;
            $per_file->move('images/police/', $per_filename);
        } else {
            $per_filename = 'no image';
        }
        $validator = Validator::make($request->all(), [
            'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_sex' => 'required',
            'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_rank' => 'required|regex:/^[a-zA-Z0-9\s-]+$/',
            'per_unit_station' => 'required|regex:/^[a-zA-Z0-9\s\/-]+$/', 
            'per_street' => 'required|regex:/^[a-zA-Z\s#-]*(\d{1,5})?[a-zA-Z\s#-]*$/',
            'per_house_no' => [
                'required',
                'regex:/^(?=(?:\D*\d){0,5}\D*$)[0-9#\s]{1,}$/',
            ], 
            'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_place_birth' => 'required',
            'per_date_birth' => 'required|date|before_or_equal:-21 years',  
            'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_civil_status' =>'required',
            'per_color_hair' => 'required|regex:/^[a-zA-Z-]+$/',
            'per_color_eyes' => 'required|regex:/^[a-zA-Z]+$/',
            'per_height' => 'required|numeric',
            'per_weight' => 'required|numeric', 
            'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_bloodtype'=> 'required',
            'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_languages' => 'required|regex:/^[a-zA-Z, ]+$/',
            'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9, -]+$/',
            'per_ethnicgroup' => 'required|regex:/^[a-zA-Z, ]+$/',
            'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/', 
        ], [
            'per_lastname.required' => 'The Last Name field is required.',
            'per_lastname.regex' => 'The Last Name field must only contain letters and spaces.',
            'per_sex.required' => 'The Sex field is required.',
            'per_firstname.required' => 'The First Name field is required.',
            'per_firstname.regex' => 'The First Name field must only contain letters and spaces.',
            'per_middlename.required' => 'The Middle Name field is required.',
            'per_middlename.regex' => 'The Middle Name field must only contain letters and spaces.',
            'per_rank.required' => 'The Rank field is required.',
            'per_civil_status.required'=> ' The Civil Status is required.',
            'per_rank.regex' => 'The Rank field must only contain letters, numbers and dash.',
            'per_unit_station.required' => 'The Unit/Station field is required.',
            'per_unit_station.regex' => 'The Unit/Station field must only contain letters, numbers, dash, and slash (/).',
            'per_house_no.required' => 'The street field is required.',
            'per_house_no.regex' => 'The house number field may only contain digits, spaces, and the # symbol, with a maximum of 5 digits.',
            'per_house_no.max' => 'The street field may not be greater than :max characters.',
            'per_street.required' => 'The Street field is required.',
            'per_street.regex' => 'The Street field must only contain letters, hashtag, numbers and spaces.',
            'per_city.required' => 'The City field is required.',
            'per_bloodtype.required' => 'The Blood Type field is required.',
            'per_city.regex' => 'The City field must only contain letters and spaces.',
            'per_province.required' => 'The Province field is required.',
            'per_province.regex' => 'The Province field must only contain letters and spaces.',
            'per_place_birth.required' => 'The Place of Birth field is required.',
            'per_date_birth.required' => 'The Date of Birth field is required.',
            'per_date_birth.date' => 'The Date of Birth must be a valid date.',
            'per_date_birth.before_or_equal' => 'The Date of Birth must be before or equal to 21 years ago.',
            'per_religion.required' => 'The Religion field is required.',
            'per_religion.regex' => 'The Religion field must only contain letters and spaces.',
            'per_color_hair.required' => 'The Hair Color field is required.',
            'per_color_hair.regex' => 'The Hair Color field must only contain letters and spaces.',
            'per_color_eyes.required' => 'The Eye Color field is required.',
            'per_color_eyes.regex' => 'The Eye Color field must only contain letters and spaces.',
            'per_height.required' => 'The Height field is required.',
            'per_height.numeric' => 'The Height field must be a number.',
            'per_weight.required' => 'The Weight field is required.',
            'per_weight.numeric' => 'The Weight field must be a number.',
            'per_build.required' => 'The Build field is required.',
            'per_build.regex' => 'The Build field must only contain letters and spaces.',
            'per_complexion.required' => 'The Complexion field is required.',
            'per_complexion.regex' => 'The Complexion field must only contain letters and spaces.',
            'per_languages.required' => 'The Languages field is required.',
            'per_languages.regex' => 'The Languages field must only contain letters, commas, and spaces.',
            'per_identifying_marks.required' => 'The Identifying Marks field is required.',
            'per_identifying_marks.regex' => 'The Identifying Marks field must only contain letters, numbers, spaces, commas, and dashes.',
            'per_ethnicgroup.required' => 'The Ethnic Group field is required.',
            'per_ethnicgroup.regex' => 'The Ethnic Group field must only contain letters, commas, and spaces.',
            'per_name_spouse_near_kin.required' => 'The Name of Spouse or Near Kin field is required.',
            'per_name_spouse_near_kin.regex' => 'The Name of Spouse or Near Kin field must only contain letters and spaces.',
            'per_spouse_kin_occupation.required' => 'The Spouse or Kin Occupation field is required.',
            'per_spouse_kin_occupation.regex' => 'The Spouse or Kin Occupation field must only contain letters and spaces.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $rules = [
        //     'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_rank' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_unit_station' => 'required|regex:/^[a-zA-Z,]+$/',
        //     'per_house_no' => 'required|regex:/^[a-zA-Z0-9\s#]+$/',
        //     'per_street' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_place_birth' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_date_birth' => 'required|date|before_or_equal:-21 years',  
        //     'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_color_hair' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_color_eyes' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_height' => 'required|numeric',
        //     'per_weight' => 'required|numeric', 
        //     'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_languages' => 'required',
        //     'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9 -]+$/',
        //     'per_ethnicgroup' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/',
        //     // Add more validation rules as needed
        // ];
 
        // // Custom error messages
        // $messages = [
        //     'required' => 'The field is required.',
        //     'regex' => 'The field must only contain letters, spaces, dashes, commas, numbers, hash symbols, or special characters.',
        //     'before_or_equal' => 'The must be a date before or equal to 21 years ago.',
        //     'in' => 'The selected is invalid.',
        //     'numeric' => 'The must be a number.',
        //     'date' => 'The must be a valid date.',
        // ];
 
     
 
        // dd('backkk');

        // $police = Police::create([
        //     'per_image' => $per_filename,
        //     'per_lastname' => $validatedData['per_lastname'],
        //     'per_firstname' => $validatedData['per_firstname'],
        //     'per_middlename' => $validatedData['per_middlename'],
        //     'per_rank' => $validatedData['per_rank'],
        //     'per_unit_station' => $validatedData['per_unit_station'],
        //     'per_house_no' => $validatedData['per_house_no'],
        //     'per_street' => $validatedData['per_street'],
        //     'per_city' => $validatedData['per_city'],
        //     'per_province' => $validatedData['per_province'],
        //     'per_place_birth' => $validatedData['per_place_birth'],
        //     'per_date_birth' => $validatedData['per_date_birth'],
        //     'per_sex' => $request->input('per_sex'),
        //     'per_civil_status' => $request->input('per_civil_status'),
        //     'per_religion' => $validatedData['per_religion'],
        //     'per_color_hair' => $validatedData['per_color_hair'],
        //     'per_color_eyes' => $validatedData['per_color_eyes'],
        //     'per_height' => $validatedData['per_height'],
        //     'per_weight' => $validatedData['per_weight'],
        //     'per_bloodtype' => $request->input('per_bloodtype'),
        //     'per_build' => $validatedData['per_build'],
        //     'per_complexion' => $validatedData['per_complexion'],
        //     'per_languages' => $validatedData['per_languages'],
        //     'per_identifying_marks' => $validatedData['per_identifying_marks'],
        //     'per_ethnicgroup' => $validatedData['per_ethnicgroup'],
        //     'per_name_spouse_near_kin' => $validatedData['per_name_spouse_near_kin'],
        //     'per_spouse_kin_occupation' => $validatedData['per_spouse_kin_occupation'],
        //     'created_at' => $now,
        // ]);

        $user = Police::create([ 
            'per_image' => $per_filename,
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

    public function change_status_pol(Request $request, $pid)
    { 
        Police::where('id', $pid)
        ->update([
            'per_status' => $request->input('per_status'),  
        ]);

        return redirect()->route('police_file_mngt')->with('edited', 'Admin Account edited successfully!');
    }

    public function edit_police_file($pid){
        $police = Police::where('id', '=', $pid)->first();
        return view('admin.edit_police_file', ['police'=>$police]);
    }

    public function update_police_file(Request $request, $pid){
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');
        $filename_time = $now->format('Y-m-d_gia');
        $filename = $request->input('per_firstname') . ' ' . $request->input('per_lastname');
  

        if ($request->hasFile('image')) {
            $per_file = $request->file('image');
            $per_extension = $per_file->getClientOriginalExtension();
            $per_filename = $filename . '-' . $filename_time . '.' . $per_extension;
            $per_file->move('images/police/', $per_filename);
        } else {
            $police = Police::findOrFail($pid);
            $per_image = $police->per_image;
            $per_filename = $per_image;
        }
        $validator = Validator::make($request->all(), [
            'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_sex' => 'required',
            'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_rank' => 'required|regex:/^[a-zA-Z0-9\s-]+$/',
            'per_unit_station' => 'required|regex:/^[a-zA-Z0-9\s-]+$/',

            
            'per_street' => 'required|regex:/^[a-zA-Z\s#-]*(\d{1,5})?[a-zA-Z\s#-]*$/',
            'per_house_no' => [
                'required',
                'regex:/^(?=(?:\D*\d){0,5}\D*$)[0-9#\s]{1,}$/',
            ],

            'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_place_birth' => 'required',
            'per_date_birth' => 'required|date|before_or_equal:-21 years',  
            'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_civil_status' =>'required',
            'per_color_hair' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_color_eyes' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_height' => 'required|numeric',
            'per_weight' => 'required|numeric', 
            'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_bloodtype'=> 'required',
            'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_languages' => 'required|regex:/^[a-zA-Z ]+$/',
            'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9 -]+$/',
            'per_ethnicgroup' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
            'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/',
            // Add more validation rules as needed
        ], [
            'per_lastname.required' => 'The Last Name field is required.',
            'per_lastname.regex' => 'The Last Name field must only contain letters and spaces.',
            'per_sex.required' => 'The Sex field is required.',
            'per_firstname.required' => 'The First Name field is required.',
            'per_firstname.regex' => 'The First Name field must only contain letters and spaces.',
            'per_middlename.required' => 'The Middle Name field is required.',
            'per_middlename.regex' => 'The Middle Name field must only contain letters and spaces.',
            'per_rank.required' => 'The Rank field is required.',
            'per_civil_status.required'=> ' The Civil Status is required.',
            'per_rank.regex' => 'The Rank field must only contain letters, numbers and dash.',
            'per_unit_station.required' => 'The Unit/Station field is required.',
            'per_unit_station.regex' => 'The Unit/Station field must only contain letters, numbers and dash.',
            'per_house_no.required' => 'The street field is required.',
            'per_house_no.regex' => 'The house number field may only contain digits, spaces, and the # symbol, with a maximum of 5 digits.',
            'per_house_no.max' => 'The street field may not be greater than :max characters.',
            'per_street.required' => 'The Street field is required.',
            'per_street.regex' => 'The Street field must only contain letters, hashtag, numbers and spaces.',
            'per_city.required' => 'The City field is required.',
            'per_bloodtype.required' => 'The Blood Type field is required.',
            'per_city.regex' => 'The City field must only contain letters and spaces.',
            'per_province.required' => 'The Province field is required.',
            'per_province.regex' => 'The Province field must only contain letters and spaces.',
            'per_place_birth.required' => 'The Place of Birth field is required.',
            'per_date_birth.required' => 'The Date of Birth field is required.',
            'per_date_birth.date' => 'The Date of Birth must be a valid date.',
            'per_date_birth.before_or_equal' => 'The Date of Birth must be before or equal to 21 years ago.',
            'per_religion.required' => 'The Religion field is required.',
            'per_religion.regex' => 'The Religion field must only contain letters and spaces.',
            'per_color_hair.required' => 'The Hair Color field is required.',
            'per_color_hair.regex' => 'The Hair Color field must only contain letters and spaces.',
            'per_color_eyes.required' => 'The Eye Color field is required.',
            'per_color_eyes.regex' => 'The Eye Color field must only contain letters and spaces.',
            'per_height.required' => 'The Height field is required.',
            'per_height.numeric' => 'The Height field must be a number.',
            'per_weight.required' => 'The Weight field is required.',
            'per_weight.numeric' => 'The Weight field must be a number.',
            'per_build.required' => 'The Build field is required.',
            'per_build.regex' => 'The Build field must only contain letters and spaces.',
            'per_complexion.required' => 'The Complexion field is required.',
            'per_complexion.regex' => 'The Complexion field must only contain letters and spaces.',
            'per_languages.required' => 'The Languages field is required.',
            'per_languages.regex' => 'The Languages field must only contain letters and spaces.',
            'per_identifying_marks.required' => 'The Identifying Marks field is required.',
            'per_identifying_marks.regex' => 'The Identifying Marks field must only contain letters, numbers, spaces, and dashes.',
            'per_ethnicgroup.required' => 'The Ethnic Group field is required.',
            'per_ethnicgroup.regex' => 'The Ethnic Group field must only contain letters and spaces.',
            'per_name_spouse_near_kin.required' => 'The Name of Spouse or Near Kin field is required.',
            'per_name_spouse_near_kin.regex' => 'The Name of Spouse or Near Kin field must only contain letters and spaces.',
            'per_spouse_kin_occupation.required' => 'The Spouse or Kin Occupation field is required.',
            'per_spouse_kin_occupation.regex' => 'The Spouse or Kin Occupation field must only contain letters and spaces.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $validator = Validator::make($request->all(), [
        //     'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_sex' => 'required',
        //     'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_rank' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_unit_station' => 'required|regex:/^[a-zA-Z,]+$/',
        //     'per_house_no' => 'required|regex:/^[a-zA-Z0-9\s#]+$/',
        //     'per_street' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_place_birth' => 'required',
        //     'per_date_birth' => 'required|date|before_or_equal:-21 years',  
        //     'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_color_hair' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_color_eyes' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_height' => 'required|numeric',
        //     'per_weight' => 'required|numeric', 
        //     'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_bloodtype'=>'required',
        //     'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_languages' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9 -]+$/',
        //     'per_ethnicgroup' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/',
        //     // Add more validation rules as needed
        // ], [
        //     'per_lastname.required' => 'The Last Name field is required.',
        //     'per_lastname.regex' => 'The Last Name field must only contain letters and spaces.',
        //     'per_sex.required' => 'The Sex field is required.',
        //     'per_firstname.required' => 'The First Name field is required.',
        //     'per_firstname.regex' => 'The First Name field must only contain letters and spaces.',
        //     'per_middlename.required' => 'The Middle Name field is required.',
        //     'per_middlename.regex' => 'The Middle Name field must only contain letters and spaces.',
        //     'per_rank.required' => 'The Rank field is required.',
        //     'per_rank.regex' => 'The Rank field must only contain letters and spaces.',
        //     'per_unit_station.required' => 'The Unit/Station field is required.',
        //     'per_unit_station.regex' => 'The Unit/Station field must only contain letters and commas.',
        //     'per_house_no.required' => 'The House Number field is required.',
        //     'per_house_no.regex' => 'The House Number field must only contain letters, numbers, spaces, and #.',
        //     'per_street.required' => 'The Street field is required.',
        //     'per_street.regex' => 'The Street field must only contain letters and spaces.',
        //     'per_city.required' => 'The City field is required.',
        //     'per_city.regex' => 'The City field must only contain letters and spaces.',
        //     'per_province.required' => 'The Province field is required.',
        //     'per_province.regex' => 'The Province field must only contain letters and spaces.',
        //     'per_place_birth.required' => 'The Place of Birth field is required.',
        //     'per_date_birth.required' => 'The Date of Birth field is required.',
        //     'per_date_birth.date' => 'The Date of Birth must be a valid date.',
        //     'per_date_birth.before_or_equal' => 'The Date of Birth must be before or equal to 21 years ago.',
        //     'per_religion.required' => 'The Religion field is required.',
        //     'per_religion.regex' => 'The Religion field must only contain letters and spaces.',
        //     'per_color_hair.required' => 'The Hair Color field is required.',
        //     'per_color_hair.regex' => 'The Hair Color field must only contain letters and spaces.',
        //     'per_color_eyes.required' => 'The Eye Color field is required.',
        //     'per_color_eyes.regex' => 'The Eye Color field must only contain letters and spaces.',
        //     'per_height.required' => 'The Height field is required.',
        //     'per_height.numeric' => 'The Height field must be a number and period only.',
        //     'per_weight.required' => 'The Weight field is required.',
        //     'per_weight.numeric' => 'The Weight field must be a number and a period only.',
        //     'per_bloodtype.required' => 'The Blood Type field is required.',
        //     'per_build.required' => 'The Build field is required.',
        //     'per_build.regex' => 'The Build field must only contain letters and spaces.',
        //     'per_complexion.required' => 'The Complexion field is required.',
        //     'per_complexion.regex' => 'The Complexion field must only contain letters and spaces.',
        //     'per_languages.required' => 'The Languages field is required.',
        //     'per_languages.regex' => 'The Languages field must only contain letters and spaces.',
        //     'per_identifying_marks.required' => 'The Identifying Marks field is required.',
        //     'per_identifying_marks.regex' => 'The Identifying Marks field must only contain letters, numbers, spaces, and dashes.',
        //     'per_ethnicgroup.required' => 'The Ethnic Group field is required.',
        //     'per_ethnicgroup.regex' => 'The Ethnic Group field must only contain letters and spaces.',
        //     'per_name_spouse_near_kin.required' => 'The Name of Spouse or Near Kin field is required.',
        //     'per_name_spouse_near_kin.regex' => 'The Name of Spouse or Near Kin field must only contain letters and spaces.',
        //     'per_spouse_kin_occupation.required' => 'The Spouse or Kin Occupation field is required.',
        //     'per_spouse_kin_occupation.regex' => 'The Spouse or Kin Occupation field must only contain letters and spaces.',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // $rules = [
        //     'per_lastname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_firstname' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_middlename' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_rank' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_unit_station' => 'required|regex:/^[a-zA-Z,]+$/',
        //     'per_house_no' => 'required|regex:/^[a-zA-Z0-9\s#]+$/',
        //     'per_street' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_city' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_province' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_place_birth' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_date_birth' => 'required|date|before_or_equal:-21 years',  
        //     'per_religion' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_color_hair' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_color_eyes' => 'required|regex:/^[a-zA-Z ]+$/',
        //     'per_height' => 'required|numeric',
        //     'per_weight' => 'required|numeric', 
        //     'per_build' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_complexion' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_languages' => 'required',
        //     'per_identifying_marks' => 'required|regex:/^[a-zA-Z0-9 -]+$/',
        //     'per_ethnicgroup' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_name_spouse_near_kin' => 'required|regex:/^[a-zA-Z -]+$/',
        //     'per_spouse_kin_occupation' => 'required|regex:/^[a-zA-Z -]+$/', 
        // ];
  
        // $messages = [
        //     'required' => 'The field is required.',
        //     'regex' => 'The field must only contain letters, spaces, dashes, commas, numbers, hash symbols, or special characters.',
        //     'before_or_equal' => 'The must be a date before or equal to 21 years ago.',
        //     'in' => 'The selected is invalid.',
        //     'numeric' => 'The must be a number.',
        //     'date' => 'The must be a valid date.',
        // ];
  
        // $validatedData = $request->validate($rules, $messages); 
        
        Police::where('id', $pid)
        ->update([
            'per_image' => $per_filename,
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

        return redirect()->route('police_file_mngt')->with('message', 'Personnel File edited successfully!');
    }
}
