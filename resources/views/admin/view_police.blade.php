<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=8">

    <title>Admin | View Police Personnel</title>

    <style>
        .folder:hover { 
            background-color: #6F79AA !important;
            color: white !important;
            cursor: pointer !important;
        } 
        
    </style>
</head>
<body style="background-color: #d3d3d3">
    @include('includes.navbar')

    <div class="col-12" style="margin-top: 4rem">
        <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
    </div>

    <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">
        <div class="col-12" style="margin-top: -3rem">
            <h1>{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}</h1>
        </div>

        <div class="col-12" style="margin-top: 0rem; background-color: white; border-radius: 0.5rem;  ">
            {{-- <div style="background-color: white; border-radius: 0.5rem; "> --}}
                <div class="row" style="margin-top: -1rem; ">
                    <div class="col-6" style="margin-top: 0.5rem; margin-left: 0.5rem;  ">
                        <p style="font-size: large"><i class="fa-solid fa-user" style="color: #1D0A68"></i>&nbsp;&nbsp;&nbsp;{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class=" " href="{{ route('view_police_file', $police->id) }}">View Police Personal File</a></p>  
                    </div> 

                    <div class="col-12" style="padding: 1rem 1.5rem 1rem 1.5rem">
                        <hr style="margin-top: -1.5rem; border-top: 1px solid #1D0A68;">
                    </div>

                    <div class="col-4" style="margin-top: -2rem; padding: 1rem 2rem 1rem 2rem"> 
                        <label>Search folder: </label><input type="text" class="form-control" id="folderSearch" placeholder="Search folder" style="margin-bottom: 10px;">
                    </div>

                    <div class="col-12" style="margin-top: -1.5rem; padding: 2rem 3rem 1rem 3rem">
                        <div class="row" style="">  
                            <div onclick="window.location.href='{{ route('pds_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">PDS</span>
                            </div> 
                            
                            <div onclick="window.location.href='{{ route('psa_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">PSA Birth Certificates</span>
                            </div> 
                            
                            <div onclick="window.location.href='{{ route('appt_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Appointment Orders</span>
                            </div>
                        
                            <div onclick="window.location.href='{{ route('promotion_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1; margin-top: 0.5rem">Promotion Orders</span>
                            </div>
                        
                            <div onclick="window.location.href='{{ route('sus_dem_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Suspension/<br>Demolition Orders</span>
                            </div> 
                            <div onclick="window.location.href='{{ route('attested_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Attested Appointments</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('cert_eli_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Certificate of Eligibility</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('scholastic_rec_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Scholastic Records</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('trainings_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Trainings</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('rca_longpay_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">RCA and Long Pay Orders</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('assign_des_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Assignment and<br>Designation Orders</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('cases_offenses_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Cases and Offenses</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('firearms_records_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Firearms Records</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('leave_orders_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Leave Orders</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('awards_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Awards</span>
                            </div> 

                            <div onclick="window.location.href='{{ route('saln_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">SALN</span>
                            </div>

                            <div onclick="window.location.href='{{ route('others_folder', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Other PNP Documents</span>
                            </div>
                                 
                        </div>
                    </div>
                    
                </div> 
                
            {{-- </div>  --}}
        </div>
    </div> 
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
          $('#harvTbl').DataTable({
            "order": [[0, "desc"]]
          });
        });

        $('#folderSearch').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.folder').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    </script>
</body>
</html>