<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="{{ url('images/favicon.ico') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=18">

  <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <title>Admin | Police File Mngt.</title>

  <style> 
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }
 
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    .tab button:hover {
      background-color: #6F79AA;
      color: white !important;
    }

    .tab button.active {
      background-color: #1D0A68;
      color: white !important; 
    }

    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
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
    <!-- <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a> -->
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">

    <div class="col-12" style="margin-top: -1rem">
      <h1><b>Personnel File Management</b></h1>
    </div>

    <div class="col-12" style="margin-top: -2rem">
      <a class="link-buttons" href="{{ route('add_police_form') }}" style="font-size: medium; width: 15rem">Add Police Personnel&nbsp;&nbsp;<i class="fas fa-user-plus"></i> </a>
    </div>

    <div class="col-12" > 
      <div class="col-12" style="padding: 1rem; background-color: white; border-radius: 0.5rem">
        <div class="tab" >
          <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'active')">Active Personnels</button>
          <button class="tablinks" onclick="openCity(event, 'inactive')">Inactive Personnels</button> 
          <button class="tablinks" onclick="openCity(event, 'schooling')">Schooling Personnels</button> 
        </div>

        <div class="col-12" style="padding: 1rem; margin-top: 0.5rem">
          @if(Session::has('message')) 
            <div class="alert alert-success col-12" role="alert">
              <b>{{ session::get('message') }}</b>
            </div>
          @endif 
        </div>

        <div id="active" class="tabcontent" style="overflow-x:auto; background-color: white; border-radius: 0.5rem; margin-top: 1rem; margin-bottom: 5rem">
          <table id="harvTbl" class="display" >
            <thead>
              <tr style="text-align: center">
                <th>Image</th>
                <th style="min-width: 10rem">Name</th>
                <th>Rank</th>
                <th>Unit/Station</th> 
                {{-- <th>Sex</th> --}}
                <th>Status</th>
                <th>Change Status</th>
                <th style="width: 8rem;">Action</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($police as $pol) 
                <tr>
                  <td style="text-align: center"> 
                    @if($pol->per_image != 'no image')
                      <img src="{{ asset('images/police/' . $pol->per_image) }}" alt="{{ $pol->per_firstname }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                    @else
                      <img src="{{ asset('images/default.png') }}" id="previewImage" alt="{{ $pol->per_firstname }}" class="img-thumbnail"  style="max-width: 30%; max-height: 30%;">      
                    @endif
                  </td>
                  <td style="text-align: center">{{ $pol->per_firstname }} {{ $pol->per_middlename }} {{ $pol->per_lastname }}</td>
                  <td style="text-align: center">{{ $pol->per_rank }}</td>
                  <td style="text-align: center">{{ $pol->per_unit_station }}</td> 
                  {{-- <td style="text-align: center">{{ $pol->per_sex }}</td>   --}}
                  <td>  
                    <center>
                      @if ($pol->per_status == 'active')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 4rem; border: none; font-size: medium" readonly>
                      @elseif ($pol->per_status == 'inactive')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 5rem; border: none; font-size: medium" readonly>
                      @endif  
                    </center> 
                  </td> 
                  <td>
                    <form action="{{ route('change_status_pol', $pol->id) }}" method="post">
                      @csrf
                      <select class="form-control" name="per_status" style="border-radius: 0.3125rem; width: 8rem; padding: 0.4rem; font-size: medium; margin-bottom: 0.5rem" required>
                        <option value="">Select status:</option>
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option> 
                        <option value="schooling">SCHOOLING</option> 
                      </select>
                      <button type="submit" class="form-buttons" > Change status </button>
                    </form>
                  </td>
                  <td style="text-align: center;">
                    <div class="d-inline-block" style="width: 150px;"> <!-- Adjust the width as needed -->
                      <a href="{{ route('view_police', [$pol->id]) }}" class="icon btn btn-primary" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-folder" style="color: white"></i>&nbsp;&nbsp;View Folders</a>
                      <a href="{{ route('view_police_file', [$pol->id]) }}" class="icon btn btn-info" style="font-size: 15px; margin-left: 0.5rem; margin-right: 0.5rem; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-eye" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">View File</span></a>
                      <a href="{{ route('edit_police_file', [$pol->id]) }}" class="icon btn btn-success" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-edit" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">Edit File</span></a>
                    </div>
                  </td>
                </tr>
              @endforeach  
            </tbody>
          </table>
        </div>

        <div id="inactive" class="tabcontent" style="overflow-x:auto; background-color: white; border-radius: 0.5rem; margin-top: 1rem; margin-bottom: 5rem">
          <table id="tbl2" class="display" >
            <thead>
              <tr style="text-align: center">
                <th>Image</th>
                <th style="min-width: 10rem">Name</th>
                <th>Rank</th>
                <th>Unit/Station</th> 
                {{-- <th>Sex</th> --}}
                <th>Status</th>
                <th>Change Status</th>
                <th style="width: 8rem;">Action</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($in_police as $inp) 
                <tr>
                  <td style="text-align: center"> 
                    @if($pol->per_image != 'no image')
                      <img src="{{ asset('images/police/' . $pol->per_image) }}" alt="{{ $pol->per_firstname }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                    @else
                      <img src="{{ asset('images/default.png') }}" id="previewImage" alt="{{ $pol->per_firstname }}" class="img-thumbnail"  style="max-width: 60%; max-height: 60%;">      
                      @endif
                  </td>
                  <td style="text-align: center">{{ $inp->per_firstname }} {{ $inp->per_middlename }} {{ $inp->per_lastname }}</td>
                  <td style="text-align: center">{{ $inp->per_rank }}</td>
                  <td style="text-align: center">{{ $inp->per_unit_station }}</td> 
                  {{-- <td style="text-align: center">{{ $inp->per_sex }}</td>   --}}
                  <td>  
                    <center>
                      @if ($inp->per_status == 'active')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 4rem; border: none; font-size: medium" readonly>
                      @elseif ($inp->per_status == 'inactive')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 5rem; border: none; font-size: medium" readonly>
                      @endif  
                    </center> 
                  </td> 
                  <td>
                    <form action="{{ route('change_status_pol', $inp->id) }}" method="post">
                      @csrf
                      <select required class="form-control" name="per_status" style="border-radius: 0.3125rem; width: 8rem; padding: 0.4rem; font-size: medium; margin-bottom: 0.5rem" required>
                        <option value="">Select status:</option>
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option> 
                        <option value="schooling">SCHOOLING</option> 
                      </select>
                      <button type="submit" class="form-buttons" > Change status </button>
                    </form>
                  </td>
                  <td style="text-align: center">
                    <div class="d-inline-block" style="width: 150px;"> <!-- Adjust the width as needed -->
                      <a href="{{ route('view_police', [$pol->id]) }}" class="icon btn btn-primary" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-folder" style="color: white"></i>&nbsp;&nbsp;View Folders</a>
                      <a href="{{ route('view_police_file', [$pol->id]) }}" class="icon btn btn-info" style="font-size: 15px; margin-left: 0.5rem; margin-right: 0.5rem; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-eye" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">View File</span></a>
                      <a href="{{ route('edit_police_file', [$pol->id]) }}" class="icon btn btn-success" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-edit" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">Edit File</span></a>
                    </div> 
                  </td>
                </tr>
              @endforeach  
            </tbody>
          </table>
        </div>

        <div id="schooling" class="tabcontent" style="overflow-x:auto; background-color: white; border-radius: 0.5rem; margin-top: 1rem; margin-bottom: 5rem">
          <table id="tbl3" class="display" >
            <thead>
              <tr style="text-align: center">
                <th>Image</th>
                <th style="min-width: 10rem">Name</th>
                <th>Rank</th>
                <th>Unit/Station</th> 
                {{-- <th>Sex</th> --}}
                <th>Status</th>
                <th>Change Status</th>
                <th style="width: 8rem;">Action</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($sch_police as $sch) 
                <tr>
                  <td style="text-align: center"> 
                    @if($pol->per_image != 'no image')
                      <img src="{{ asset('images/police/' . $pol->per_image) }}" alt="{{ $pol->per_firstname }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                    @else
                      <img src="{{ asset('images/default.png') }}" id="previewImage" alt="{{ $pol->per_firstname }}" class="img-thumbnail" style="max-width: 60%; max-height: 60%;">      
                    @endif
                  </td>
                  <td style="text-align: center">{{ $sch->per_firstname }} {{ $sch->per_middlename }} {{ $sch->per_lastname }}</td>
                  <td style="text-align: center">{{ $sch->per_rank }}</td>
                  <td style="text-align: center">{{ $sch->per_unit_station }}</td> 
                  {{-- <td style="text-align: center">{{ $sch->per_sex }}</td>   --}}
                  <td>  
                    <center>
                      @if ($sch->per_status == 'active')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 4rem; border: none; font-size: medium" readonly>
                      @elseif ($sch->per_status == 'inactive')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 5rem; border: none; font-size: medium" readonly>
                      @elseif ($sch->per_status == 'schooling')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="SCHOOLING" style="background-color: #b5e8ff; font-weight: bold; color: rgb(0, 0, 78); width: 6.5rem; border: none; font-size: medium" readonly>
                      @endif  
                    </center> 
                  </td> 
                  <td>
                    <form action="{{ route('change_status_pol', $sch->id) }}" method="post">
                      @csrf
                      <select required class="form-control" name="per_status" style="border-radius: 0.3125rem; width: 8rem; padding: 0.4rem; font-size: medium; margin-bottom: 0.5rem" required>
                        <option value="">Select status:</option>
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option> 
                        <option value="schooling">SCHOOLING</option> 
                      </select>
                      <button type="submit" class="form-buttons" > Change status </button>
                    </form>
                  </td>
                  <td style="text-align: center">
                    <div class="d-inline-block" style="width: 150px;"> <!-- Adjust the width as needed -->
                      <a href="{{ route('view_police', [$pol->id]) }}" class="icon btn btn-primary" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-folder" style="color: white"></i>&nbsp;&nbsp;View Folders</a>
                      <a href="{{ route('view_police_file', [$pol->id]) }}" class="icon btn btn-info" style="font-size: 15px; margin-left: 0.5rem; margin-right: 0.5rem; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-eye" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">View Data</span></a>
                      <a href="{{ route('edit_police_file', [$pol->id]) }}" class="icon btn btn-success" style="font-size: 15px; width: 7.5rem; margin-bottom: 0.5rem"><i class="fas fa-edit" style="color: white"></i>&nbsp;&nbsp;<span style="color: white">Edit File</span></a>
                    </div> 
                 </td>
                </tr>
              @endforeach  
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>  
@include('includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    $('#harvTbl').DataTable({
      "order": [[0, "desc"]]
    });

    $('#tbl2').DataTable({
      "order": [[0, "desc"]]
    });

    $('#tbl3').DataTable({
      "order": [[0, "desc"]]
    });
  });

  document.addEventListener("DOMContentLoaded", function() { 
    document.getElementById("defaultOpen").click();
  });

  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script> 
</body>
</html>