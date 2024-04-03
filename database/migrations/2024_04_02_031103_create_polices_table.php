<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('polices', function (Blueprint $table) {
            $table->id();
            $table->string('per_image');
            $table->string('per_lastname');
            $table->string('per_firstname');
            $table->string('per_middlename');
            $table->string('per_rank');
            $table->string('per_unit_station');
            $table->string('per_house_no');
            $table->string('per_street');
            $table->string('per_city');
            $table->string('per_province');
            $table->string('per_place_birth');
            $table->string('per_date_birth');
            $table->string('per_sex');
            $table->string('per_civil_status');
            $table->string('per_religion');
            $table->string('per_color_hair');
            $table->string('per_color_eyes');
            $table->float('per_height');
            $table->float('per_weight');
            $table->string('per_bloodtype');
            $table->string('per_build');
            $table->string('per_complexion');
            $table->string('per_languages');
            $table->string('per_identifying_marks');
            $table->string('per_ethnicgroup');
            $table->string('per_name_spouse_near_kin');
            $table->string('per_spouse_kin_occupation'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polices');
    }
};
