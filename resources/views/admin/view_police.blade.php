<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="icon" href="{{ url('images/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=18">

    <title>Admin | View Police Personnel</title>

    <style>
        .folder:hover { 
            background-color: #6F79AA !important;
            color: white !important;
            cursor: pointer !important;
        } 
        
        .icon:hover {
            background-color: #6F79AA;
            color: white !important;
            border-color: #6F79AA !important;
        }
    </style>
</head>
<body style="background-color: #d3d3d3">
    @include('includes.navbar')

    <div class="col-12" style="margin-top: 4rem">
        <a class="back-btn" href="/admin/police_file_mngt"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
    </div>

    <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">
        <div class="col-12" style="margin-top: -3rem">
            <h1><b>{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}</b></h1>
        </div>

        <div class="col-12" style="margin-top: 0rem; background-color: white; border-radius: 0.5rem; margin-bottom: 5rem">
            {{-- <div style="background-color: white; border-radius: 0.5rem; "> --}}
                <div class="row" style="margin-top: -1rem; ">
                    <div class="col-12" style="margin-top: 0.5rem; margin-left: 0.5rem;  ">
                        <p style="font-size: large"> 
                            @if($police->per_image)
                                <img src="{{ asset('images/police/' . $police->per_image) }}" alt="{{ $police->per_firstname }}" class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                            @else
                            <i class="fa-solid fa-user" style="color: #1D0A68"></i>
                            @endif

                            &nbsp;&nbsp;&nbsp;{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            {{-- <a class=" " href="{{ route('view_police_file', $police->id) }}">View Police Personal File</a></p>   --}}
                            {{-- <a class="btn btn-info" href="{{ route('view_police_file', [$police->id]) }}" style="margin-top: 0.5rem">View Data&nbsp;&nbsp;<i class="fa fa-edit"></i></a> --}}

                            <a href="{{ route('view_police_file', [$police->id]) }}" class="icon btn btn-info" style="font-size: 15px; margin-left: 0.5rem; margin-right: 0.5rem; width: 12rem; margin-bottom: 0.5rem"><i class="fas fa-eye" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">View Personal File</span></a>
                        </p>
                    </div> 

                    <div class="col-12" style="padding: 1rem 1.5rem 1rem 1.5rem">
                        <hr style="margin-top: -1.5rem; border-top: 1px solid #1D0A68;">
                    </div>

                    <div class="col-4" style="margin-top: -2rem; padding: 1rem 2rem 1rem 2rem"> 
                        <label>Search folder: </label><input type="text" class="form-control" id="folderSearch" placeholder="Search folder" style="margin-bottom: 10px;">
                    </div>

                    <div class="col-12" style="margin-top: -1.5rem; padding: 2rem 3rem 1rem 3rem">
                        <div class="row" style="">  
                            <div onclick="window.location.href='{{ route('folder_a', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER A</span>
                            </div> 
                            
                            <div onclick="window.location.href='{{ route('folder_b', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER B</span>
                            </div> 
                            
                            <div onclick="window.location.href='{{ route('folder_c', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER C</span>
                            </div>
                        
                            <div onclick="window.location.href='{{ route('folder_d', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1; margin-top: 0.5rem"><br>FOLDER D</span>
                            </div>
                        
                            <div onclick="window.location.href='{{ route('folder_e', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER E</span>
                            </div> 
                            <div onclick="window.location.href='{{ route('folder_f', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER F</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('folder_g', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER G</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_h', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER H</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_i', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER I</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_j', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER J</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_k', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER K</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('folder_l', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER L</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_m', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER M</span>
                            </div>
                         
                            <div onclick="window.location.href='{{ route('folder_n', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER N</span>
                            </div>
                        
                    
                            <div onclick="window.location.href='{{ route('folder_o', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 0rem 1.8rem 0.5rem;  height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER O</span>
                            </div> 

                            <div onclick="window.location.href='{{ route('folder_p', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 1.9rem 1.8rem 0rem; height: 13rem;">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER P</span>
                            </div>

                            <div onclick="window.location.href='{{ route('folder_q', $police->id) }}'" class="col-2 folder" style="text-align: center; background-color: #1D0A68; border-radius: 0.5rem; margin: 0.5rem 2.1rem 1.8rem 0.5rem; height: 13rem">
                                <i class="fa-regular fa-folder-closed" style="font-size: 5rem; color: white; margin-bottom: 0.5rem"></i>
                                <br><span style="font-size: medium; font-weight: bold; color: white; flex-grow: 1;">FOLDER Q</span>
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
      @include('includes.footer')
</body>
</html>