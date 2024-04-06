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
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=6">

    <title>Admin | Others Folder</title>

    <style>
        .folder:hover { 
            background-color: #6F79AA !important;
            color: white !important;
        } 
        
    </style>
</head>
<body class="w3-light-grey">
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