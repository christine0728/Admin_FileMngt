<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'per_lastname',
        'per_firstname',
        'per_middlename',
        'per_rank',
        'per_unit_station',
        'per_house_no',
        'per_street',
        'per_city',
        'per_province',
        'per_place_birth',
        'per_date_birth',
        'per_sex',
        'per_civil_status',
        'per_religion',
        'per_color_hair',
        'per_color_eyes',
        'per_height',
        'per_weight',
        'per_bloodtype',
        'per_build',
        'per_complexion',
        'per_languages',
        'per_identifying_marks',
        'per_ethnicgroup',
        'per_name_spouse_near_kin',
        'per_spouse_kin_occupation', 
    ];
}
