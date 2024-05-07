<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personnel File</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        * {
            box-sizing: border-box;
        }
        
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        
        [class*="col-"] {
            float: left;
            padding: 15px;
        }


        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }

        @media only screen and (min-width: 768px) {
            /* For desktop: */
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}
        } 

        table, th, td {
            border: 1px solid;
        }

        @page {
            margin: 10mm; 
        }
    </style>
</head>
<body>
    <span>Rundate: {{ $rundate }}</span>

    <div style="margin: 1.5rem">
        <center><b style="font-size: x-large; font-weight: bold">POLICE PERSONAL FILE</b></center>
    </div>

    <div style=""> 
        <table style="border-collapse: collapse;">  
            @foreach ($police as $pol) 
            <tr>
                <td colspan="4" style="padding: 0rem 0.5rem 0rem 0.5rem"> 
                    <center><b>I. GENERAL INFORMATION</b></center>
                </td>  
            </tr>
            <tr>
                <td colspan="1" rowspan="2" style="padding: 0rem 0.5rem 0rem 0.5rem; width: 30%">
                    {{-- {{ $pol->per_image }} --}}

                    @if($pol->per_image)
                        <center><img src="{{ asset('images/police/' . $pol->per_image) }}" alt="{{ $pol->per_lastname }}" class="img-thumbnail" style="max-width: 70%; max-height: 70%;"></center>
                    @else
                        No Image
                    @endif
                </td> 
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>1. NAME (Last name</b>
                    <br>&nbsp;{{ $pol->per_lastname }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>Firstname</b>
                    <br>{{ $pol->per_firstname }}
                </td> 
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>Middle Initial)</b>
                    <br>{{ $pol->per_middlename }}
                </td> 
                {{-- <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>Qualifier)</b>
                    <br> 
                </td>  --}}
            </tr>
            <tr>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>2. RANK</b>
                    <br>&nbsp;{{ $pol->per_rank }}
                </td>
                <td colspan="2" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>3. UNIT/STATION - NSU / PRO / NHQ</b>
                    <br>&nbsp;{{ $pol->per_unit_station }}
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>4. HOME ADDRESS (House No. / Street / City / Province)</b>
                    <br>&nbsp;{{ $pol->per_house_no }} / {{ $pol->per_street }} / {{ $pol->per_city }} / {{ $pol->per_province }}
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>5. PLACE OF BIRTH</b>
                    <br>&nbsp;{{ $pol->per_place_birth }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>6. DATE OF BIRTH</b>
                    <br>&nbsp;{{ $pol->per_date_birth }}
                </td>
            </tr>
            <tr>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>7. SEX</b>
                    <br>&nbsp;{{ $pol->per_sex }}
                </td>
                <td colspan="2" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>8. CIVIL STATUS</b>
                    <br>&nbsp;{{ $pol->per_civil_status }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>9. RELIGION</b>
                    <br>&nbsp;{{ $pol->per_religion }}
                </td>
            </tr>
            <tr>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>10. COLOR OF HAIR</b>
                    <br>&nbsp;{{ $pol->per_color_hair }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem"> 
                    <b>11. COLOR OF EYES</b>
                    <br>&nbsp;{{ $pol->per_color_eyes }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>12. HEIGHT (cm)</b>
                    <br>&nbsp;{{ $pol->per_height }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>13. WEIGHT (kg)</b>
                    <br>&nbsp;{{ $pol->per_weight }}
                </td>
            </tr>
            <tr>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>14. BLOOD TYPE</b>
                    <br>&nbsp;{{ $pol->per_bloodtype }}
                </td>
                <td colspan="2" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>15. BUILD</b>
                    <br>&nbsp;{{ $pol->per_build }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>16. COMPLEXION</b>
                    <br>&nbsp;{{ $pol->per_complexion }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 0rem 0.5rem 0rem 0.5rem; width: 30%">
                    <b>17. LANGUAGES</b>
                    <br>&nbsp;{{ $pol->per_languages }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>18. IDENTIFYING MARKS</b>
                    <br>&nbsp;{{ $pol->per_identifying_marks }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>19. ETHNIC GROUP</b>
                    <br>&nbsp;{{ $pol->per_ethnicgroup }}
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>20. NAME OF SPOUSE OR NEAREST KIN/ADDRESS</b>
                    <br>&nbsp;{{ $pol->per_name_spouse_near_kin }}
                </td>
                <td colspan="1" style="padding: 0rem 0.5rem 0rem 0.5rem">
                    <b>21. OCCUPATION</b>
                    <br>&nbsp;{{ $pol->per_spouse_kin_occupation }}
                </td> 
            </tr>
        </table>
    @endforeach
</body>
</html>