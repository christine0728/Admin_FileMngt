<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=8">

    <title>Admin | View Police Personnel</title>

    <style>
        .folder:hover { 
            background-color: #6F79AA !important;
            color: white !important;
        } 
        
    </style>
</head>
<body class=" w3-light-grey">
    @include('includes.navbar')

    <div class="col-12" style="margin-top: 4rem">
        <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
    </div>

    <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">
        <div class="col-12" style="margin-top: -3rem">
            <h1>{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}</h1>
        </div>

        <div class="col-12" style="margin-top: -1rem;">
            <div style=" background-color: white; border-radius: 0.5rem; padding: 1rem">
                <div class="row" style="margin-top: -1rem;">
                    <div class="col-6" style="margin-top: -1rem; margin-left: 0.5rem">
                        <p style="font-size: large"><i class="fa-solid fa-user" style="color: #1D0A68"></i>&nbsp;&nbsp;&nbsp;{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class=" " href="{{ route('add_police_form') }}">View Police Personal File</a></p>  
                    </div> 

                    <div class="col-12">
                        <hr style="margin-top: -1.5rem; border-top: 1px solid #1D0A68">
                    </div>
                    

                    <div class="col-12" style="margin-top: -1.5rem">
                        <div class="row"> 
                            <a href="{{ route('pds_folder', $police->id) }}" >
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem;">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">PDS</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Appointment Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Promotion Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1; margin-top: 0.5rem">Suspension/<br>Demolition Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Attested Appointments</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="" >
                                <div>
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Certificate of Eligibility</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Scholastic Records</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Trainings</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">RCA and Long Pay Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Assignment and<br>Designation Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="" >
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Cases and Offenses</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Firearms Records</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Leave Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Awards</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">SALN</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="" >
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem; height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Other PNP Documents</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Scholastic Records</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Trainings</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">RCA and Long Pay Orders</span>
                                    </div>
                                </div> 
                            </a>
                            <a href="">
                                <div >
                                    <div class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                        <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                        <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">Assignment and<br>Designation Orders</span>
                                    </div>
                                </div> 
                            </a>
                        </div>
                    </div>
                    
                </div> 
                
            </div> 
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
    </script>
</body>
</html>