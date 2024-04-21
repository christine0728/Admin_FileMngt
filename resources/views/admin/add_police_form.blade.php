<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=10">
    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <link rel="stylesheet" href="https://cdn.mobiscroll.com/4.9.0/css/mobiscroll.jquery.min.css">

    <title>Admin | Police Form</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            color: black !important;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 1rem;
        }

        .header {
            background-color: #1D0A68;
            border-radius: 0.5rem;
            padding: 1rem; 
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center; 
        }

        .header img {
            width: 80%;
            max-width: 100px;
            margin-right: 1rem;
        }

        .header b {
            color: white;
            font-size: clamp(1rem, 2.304rem + 3.4783vw, 2rem);
        }

        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            [class*="col-"] {
            width: 100%;
            }

            .header b{
                font-size: 1.5rem;
            } 

            .header img {
                width: 40% !important;
                max-width: 100px;
                margin-right: 1rem;
                margin-left: 1rem;
            }
        }

        .form-section{
            display: none;
        }

        .form-section.current{
            display: inline;
        }

        .parsley-errors-list{
            color:red;
        }

        /* Added style for active navigation link */
        .nav-link.active {
            background-color: #1D0A68;
            color: white !important;
            font-weight: bold !important;
        }

        .form-navigation {
        text-align: right;
    }

    .form-navigation .previous {
        float: left;
    }

    .form-navigation .next {
        float: right;
    } 
    </style>
</head>
<body style="background-color: #d3d3d3">

    <div class="container">
        <div class="header" style="background-color: #1D0A68; padding: 1rem;">
            <center><img src="{{ asset('images/pnp - logo.png') }}" alt="">
            <b style="color: white;">Admin Department</b></center> 
        </div> 
    </div>  

    <div class="container row" style="margin-top: -2rem">
        <div class="col-12" style="background-color: white; border-radius: 0.5rem; padding: 1.5rem">
            <form action="{{ route('adding_police') }}" class="employee-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="" style="margin-bottom: 2rem">   
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">1. LAST NAME:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_lastname" value="{{ old('per_lastname') }}"  oninput="toUpper(this)">
                                    @if ($errors->has('per_lastname')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_lastname') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">FIRST NAME:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_firstname" value="{{ old('per_firstname') }}">
                                    @if ($errors->has('per_firstname')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_firstname') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MIDDLE NAME:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_middlename" value="{{ old('per_middlename') }}">
                                    @if ($errors->has('per_middlename')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_middlename') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">2. RANK:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_rank" value="{{ old('per_rank') }}">
                                    @if ($errors->has('per_rank')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_rank') }}</span>
                                    @endif 
                                </div> 
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">3. UNIT/STATION - NSU / PRO / NHQ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_unit_station" value="{{ old('per_unit_station') }}">
                                    @if ($errors->has('per_unit_station')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_unit_station') }}</span>
                                    @endif 
                                </div> 
                            </div>
                        </div>

                        <div class="row">  
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">4. HOUSE NO. </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_house_no" value="{{ old('per_house_no') }}">
                                    @if ($errors->has('per_house_no')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_house_no') }}</span>
                                    @endif 
                                </div> 
                            </div> 

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">STREET:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_street" value="{{ old('per_street') }}">
                                    @if ($errors->has('per_street')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_street') }}</span>
                                    @endif 
                                </div> 
                            </div> 

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CITY:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_city" value="{{ old('per_city') }}">
                                    @if ($errors->has('per_city')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_city') }}</span>
                                    @endif 
                                </div> 
                            </div> 

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PROVINCE:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_province" value="{{ old('per_province') }}">
                                    @if ($errors->has('per_province')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_province') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">5. PLACE OF BIRTH:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_place_birth" value="{{ old('per_place_birth') }}">
                                    @if ($errors->has('per_place_birth')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_place_birth') }}</span>
                                    @endif 
                                </div> 
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">6. DATE OF BIRTH:</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_date_birth" value="{{ old('per_date_birth') }}">
                                    @if ($errors->has('per_date_birth')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_date_birth') }}</span>
                                    @endif 
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">7. SEX:</label>
                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_sex" value="{{ old('per_sex') }}">  --}}

                                    <select class="form-control" name="per_sex" >
                                        <option value="">Select:</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="MALE">MALE</option>
                                    </select>
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">8. CIVIL STATUS:</label>
                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_civil_status" value="{{ old('per_civil_status') }}">  --}}

                                    <select class="form-control" name="per_civil_status" >
                                        <option value="">Select:</option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="MARRIED">MARRIED</option>
                                        <option value="SEPARATED">SEPARATED</option>
                                        <option value="WIDOW/ER">WIDOW/ER</option>
                                        <option value="LIVE_IN_PARTNER">LIVE IN PARTNER</option>
                                    </select>
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">9. RELIGION:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_religion" value="{{ old('per_religion') }}">
                                    @if ($errors->has('per_religion')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_religion') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">10. COLOR OF HAIR:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_color_hair" value="{{ old('per_color_hair') }}">
                                    @if ($errors->has('per_color_hair')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_color_hair') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">11. COLOR OF EYES:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_color_eyes" value="{{ old('per_color_eyes') }}">
                                    @if ($errors->has('per_color_eyes')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_color_eyes') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">12. HEIGHT (cm):</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_height" value="{{ old('per_height') }}">
                                    @if ($errors->has('per_height')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_height') }}</span>
                                    @endif 
                                </div> 
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">13. WEIGHT (kg):</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_weight" value="{{ old('per_weight') }}">
                                    @if ($errors->has('per_weight')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_weight') }}</span>
                                    @endif 
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">14. BLOOD TYPE:</label>
                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_bloodtype" value="{{ old('per_bloodtype') }}"> --}}
                                    
                                    <select class="form-control" name="per_bloodtype" >
                                        <option value="">Select:</option>
                                        <option value="A+">A+</option>
                                        <option value="O+">O+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="A-">A-</option>
                                        <option value="O-">O-</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">15. BUILD:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_build" value="{{ old('per_build') }}">
                                    @if ($errors->has('per_build')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_build') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">16. COMPLEXION:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_complexion" value="{{ old('per_complexion') }}">
                                    @if ($errors->has('per_complexion')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_complexion') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">17. LANGUAGES:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_languages" value="{{ old('per_languages') }}">
                                    @if ($errors->has('per_languages')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_languages') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">18. IDENTIFYING MARKS:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_identifying_marks" value="{{ old('per_identifying_marks') }}">
                                    @if ($errors->has('per_identifying_marks')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_identifying_marks') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">19. ETHNIC GROUP:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_ethnicgroup" value="{{ old('per_ethnicgroup') }}">
                                    @if ($errors->has('per_ethnicgroup')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_ethnicgroup') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">20. NAME OF SPOUSE OR NEAREST KIN/ADDRESS:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_name_spouse_near_kin" value="{{ old('per_name_spouse_near_kin') }}">
                                    @if ($errors->has('per_name_spouse_near_kin')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_name_spouse_near_kin') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">21. OCCUPATION:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_spouse_kin_occupation" value="{{ old('per_spouse_kin_occupation') }}">
                                    @if ($errors->has('per_spouse_kin_occupation')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_spouse_kin_occupation') }}</span>
                                    @endif 
                                </div> 
                            </div>  

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image">Upload Police's Image:</label>
                                    <input type="file" class="form-control" id="file" name="per_image" accept="image/*" onchange="previewImage(this)">
                                </div>

                                <div id="imagePreview"></div>
                            </div>
                        </div>
                    </div>  
  
                    <div class="col-12 form-navigation">
                        <a class="link-buttons" href="{{ route('police_file_mngt') }}" style="float: left;">Cancel <i class="fa-solid fa-xmark icons"></i> </a> 
                        {{-- <a class="link-buttons" href=" " style="float: right;">Next</a>  --}}

                       {{-- <button type="button" class="next form-buttons" style="float: right; width: 5rem">Next <i class="fa-solid fa-arrow-right icons"></i></button>  --}}
                       <button type="submit" class="form-buttons" style="float: right;">Submit <i class="fa-solid fa-check icons"></i></button>
                       {{-- <button type="button" class="previous form-buttons" style="float: right; margin-right: 0.5rem; width: 5rem"><i class="fa-solid fa-arrow-left icons"></i> Back</button>  --}}
                    </div>
                </div>
            </form>
        </div> 
    </div>
  
    <script>
        function toUpper(input) { 
            let value = input.value; 
            value = value.toUpperCase(); 
            input.value = value;
        }

        function previewImage(input) {
            var previewContainer = document.getElementById('imagePreview');
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    previewContainer.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width:40%; max-height:40%;">';
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '';
            }
        }

        function previewImage2(input) {
            var previewContainer = document.getElementById('imagePreview2');
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    previewContainer.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width:25%; max-height:25%;">';
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '';
            }
        }
    </script>
    
</body>
</html>
