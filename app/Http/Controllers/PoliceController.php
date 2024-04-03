<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use App\Models\Police;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    public function add_police_form()
    {
        return view('admin.add_police_form');
    }

    public function adding_police(Request $request){  
        $now = Carbon::now();
        $now->setTimezone('Asia/Manila');

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

        return redirect()->back()->with('message', 'The record has been added successfully!');
    }
}
