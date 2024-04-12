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
            /* background-color: #9947B6; */
            border-radius: 0.5rem;
            /* padding: 1rem; */
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .header img {
            width: 80%;
            max-width: 100px;
            margin-right: 1rem;
            margin-left: 6rem;
            
        }

        .header b {
            /* color: white; */
            /* font-size: clamp(1rem, 2.304rem + 3.4783vw, 2rem); */
            font-size:clamp(1rem, 2.304rem + 3.4783vw, 2rem);
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
<body>

    <div class="container">
        <div class="header" style="background-color: #1D0A68; padding: 1rem;">
            <img src="{{ asset('images/pnp - logo.png') }}" alt="">
            <b style="color: white;">Women and Children Protection Center</b>
        </div> 
    </div> 
  
    <div class="container" style="margin-top: -2rem;">
        <div class="nav nav-fill" style="background-color: white;">
            {{-- <label class="nav-link shadow-sm step0 border ml-2 active">Offense Data</label> --}}
            {{-- <label class="nav-link shadow-sm step1 border ml-2 ">Section B<br>Victim's Data</label>
            <label class="nav-link shadow-sm step2 border ml-2 ">Section C<br>Offender's Data</label> --}}
            {{-- <label class="nav-link shadow-sm step3 border ml-2 ">Evidence Data</label>
            <label class="nav-link shadow-sm step4 border ml-2 ">Case Disposition</label> --}}
        </div>
    </div> 

    <div class="container row" style="margin-top: -1rem">
        <div class="col-12">
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
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_sex" value="{{ old('per_sex') }}">
                                    @if ($errors->has('per_sex')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_sex') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">8. CIVIL STATUS:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_civil_status" value="{{ old('per_civil_status') }}">
                                    @if ($errors->has('per_civil_status')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_civil_status') }}</span>
                                    @endif 
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
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_bloodtype" value="{{ old('per_bloodtype') }}">
                                    @if ($errors->has('per_bloodtype')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_bloodtype') }}</span>
                                    @endif 
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
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">20. NAME OF SPOUSE OR NEAREST KIN/ADDRESS:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_name_spouse_near_kin" value="{{ old('per_name_spouse_near_kin') }}">
                                    @if ($errors->has('per_name_spouse_near_kin')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_name_spouse_near_kin') }}</span>
                                    @endif 
                                </div> 
                            </div> 
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">21. OCCUPATION:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_spouse_kin_occupation" value="{{ old('per_spouse_kin_occupation') }}">
                                    @if ($errors->has('per_spouse_kin_occupation')) 
                                        <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('per_spouse_kin_occupation') }}</span>
                                    @endif 
                                </div> 
                            </div>  
                        </div>
                    </div>  
  
                    <div class="col-12 form-navigation">
                        <a class="link-buttons" href=" " style="float: left;">Cancel <i class="fa-solid fa-xmark icons"></i> </a> 
                        {{-- <a class="link-buttons" href=" " style="float: right;">Next</a>  --}}

                       {{-- <button type="button" class="next form-buttons" style="float: right; width: 5rem">Next <i class="fa-solid fa-arrow-right icons"></i></button>  --}}
                       <button type="submit" class="form-buttons" style="float: right;">Submit <i class="fa-solid fa-check icons"></i></button>
                       <button type="button" class="previous form-buttons" style="float: right; margin-right: 0.5rem; width: 5rem"><i class="fa-solid fa-arrow-left icons"></i> Back</button> 
                    </div>
                </div>
            </form>
        </div> 
    </div>

    <script> 
        $(function(){
    var $sections = $('.'); 
    var $navLinks = $('.nav-link');
    
    function navigateTo(index){ 
        $sections.removeClass('current').eq(index).addClass('current'); 
        
        $navLinks.removeClass('active');
        $navLinks.eq(index).addClass('active');
        
        $('.form-navigation .previous').toggle(index > 0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd); 

        $('html, body').scrollTop(0);
    }

    function curIndex(){ 
        return $sections.index($sections.filter('.current'));
    }

    // Function to handle navigation when nav-link is clicked
    // $navLinks.click(function() {
    //     var index = $(this).index(); // Get the index of the clicked nav-link
    //     navigateTo(index);
    // });

    $('.form-navigation .previous').click(function(){
        var currentIndex = curIndex();
        if (currentIndex > 0) {
            navigateTo(currentIndex - 1);
        }
    });

    $('.form-navigation .next').click(function(){
        var currentIndex = curIndex();
        $('.employee-form').parsley().whenValidate({
            group:'block-'+currentIndex
        }).done(function(){
            navigateTo(currentIndex + 1);
        });
    });

    $sections.each(function(index, section){
        $(section).find(':input').attr('data-parsley-group', 'block-'+index);
    });

    navigateTo(0); 
});

        
        function showfield(name){
            if(name=='Others')document.getElementById('div1').innerHTML='Pls. specify: <input type="text" name="others" class="form-control" />';
            else document.getElementById('div1').innerHTML='';

            if(name=='Others2')document.getElementById('div2').innerHTML='Pls. specify: <input type="text" name="others2" class="form-control" />';
            else document.getElementById('div2').innerHTML='';

            if(name=='Others3')document.getElementById('div3').innerHTML='Pls. specify: <input type="text" name="others3" class="form-control" />';
            else document.getElementById('div3').innerHTML='';

            if(name=='Others4')document.getElementById('div4').innerHTML='Pls. specify: <input type="text" name="others4" class="form-control" />';
            else document.getElementById('div4').innerHTML='';  
        }

        function showfield2(name){   
            if(name=='Others5')document.getElementById('div5').innerHTML='Pls. specify: <input type="text" name="others5" class="form-control" />';
            else document.getElementById('div5').innerHTML='';
        } 

        mobiscroll.select('#multiple-select', {
        inputElement: document.getElementById('my-input'),
        touchUi: false
    });
    </script>
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
                    previewContainer.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width:25%; max-height:25%;">';
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
