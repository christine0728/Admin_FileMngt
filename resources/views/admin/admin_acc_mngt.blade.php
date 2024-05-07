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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=12">

    <title>Admin | Admin Account Mngt.</title>

    <style>
      .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
      }

      /* Style the buttons inside the tab */
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
    </style>
</head>
<body style="background-color: #d3d3d3">
  @include('includes.navbar')

  <div class="col-12" style="margin-top: 4rem">
    <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">

    <div class="col-12" style="margin-top: -3rem">
      <h1><b>Admin Account Management</b></h1>
    </div>

    <div class="col-12" style="margin-top: -2rem">
      <a class="link-buttons" href="{{ route('add_admin_form') }}" style="font-size: medium; width: 14rem">Add Admin Account&nbsp;&nbsp;<i class="fas fa-user-plus"></i></a>
    </div>

    <div class="col-12">
      <div class="col-12" style="padding: 1rem; background-color: white; border-radius: 0.5rem; margin-bottom: 4rem">
        <div class="tab" >
          <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'active')">Active Accounts</button>
          <button class="tablinks" onclick="openCity(event, 'inactive')">Inactive Accounts</button>  
        </div>

        <div class="col-12" style="padding: 1rem; margin-top: -1rem;">
          @if(Session::has('added')) 
            <div class="alert alert-success col-12" role="alert" style="margin-top: 1rem">
              <b>{{ session::get('added') }}</b>
            </div>
          @endif 
    
          @if(Session::has('edited')) 
            <div class="alert alert-warning col-12" role="alert" style="margin-top: 1rem">
              <b>{{ session::get('edited') }}</b>
            </div>
          @endif 
        </div>

        <div id="active" class="tabcontent" style="overflow-x:auto;">
          <table id="harvTbl" class="display" >
            <thead>
              <tr>
                <th style="width: 9rem; text-align: center">Fullname</th>
                <th style="width: 9rem; text-align: center">Username</th>
                <th style="width: 6rem; text-align: center">Status</th>
                <th style="width: 9rem; text-align: center">Created At</th> 
                <th style="width: 12rem;">Change Status</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($admin as $ad) 
                <tr>
                  <td style="text-align: center">{{ $ad->firstname }} {{ $ad->middle_initial }} {{ $ad->lastname }}</td>
                  <td style="text-align: center">{{ $ad->username }} </td>
                  <td > 
                    <center>
                      @if ($ad->status == 'active')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 4rem; border: none; font-size: medium" readonly>
                      @elseif ($ad->status == 'inactive')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 5rem; border: none; font-size: medium" readonly>
                      @endif  
                    </center>  
                  </td>  
                  <td style="text-align: center">{{ $ad->created_at }}</td>
                  <td >
                    {{-- <center>  
                      <a class="edit-btn" href="{{ route('edit_admin_form', [ $ad->id ]) }}">&nbsp;&nbsp;&nbsp;Edit Account<i class="fa fa-edit" style="font-size: large; padding: 0.5rem"></i></a>  
                    </center> --}}

                    <div class="col-12"> 
                      <div class="form-group" style=" align-items: flex-end;">
                        {{-- <label for="teamSelect" >CHANGE STATUS:</label> --}}
                        <form action="{{ route('change_status', [$ad->id]) }}" method="post">
                          @csrf
                          <select class="form-control" id="teamSelect" name="status" style="width: 80%">
                            <option value="{{ $ad->status }}">Select here:</option>
                            <option value="active">ACTIVE</option>
                            <option value="inactive">INACTIVE</option> 
                          </select> 
                          <button type="submit" class="form-buttons" style="float: left; width: 7rem; margin-top:0.5rem">Update status</i></button>
                        </form>
                      </div> 
                    </div>
                  </td>
                </tr>
              @endforeach 
              </form>
            </tbody>
          </table>
        </div>

        <div id="inactive" class="tabcontent" style="overflow-x:auto;">
          <table id="tbl2" class="display" >
            <thead>
              <tr>
                <th style="width: 9rem; text-align: center">Fullname</th>
                <th style="width: 9rem; text-align: center">Username</th>
                <th style="width: 6rem; text-align: center">Status</th>
                <th style="width: 9rem; text-align: center">Created At</th> 
                <th style="width: 12rem;">Change Status</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($inadmin as $inad) 
                <tr>
                  <td style="text-align: center">{{ $inad->firstname }} {{ $inad->middle_initial }} {{ $inad->lastname }}</td>
                  <td style="text-align: center">{{ $inad->username }} </td>
                  <td > 
                    <center>
                      @if ($inad->status == 'active')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 4rem; border: none; font-size: medium" readonly>
                      @elseif ($inad->status == 'inactive')
                        <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 5rem; border: none; font-size: medium" readonly>
                      @endif  
                    </center>  
                  </td>  
                  <td style="text-align: center">{{ $inad->created_at }}</td>
                  <td >
                    {{-- <center>  
                      <a class="edit-btn" href="{{ route('edit_admin_form', [ $inad->id ]) }}">&nbsp;&nbsp;&nbsp;Edit Account<i class="fa fa-edit" style="font-size: large; padding: 0.5rem"></i></a>  
                    </center> --}}

                    <div class="col-12"> 
                      <div class="form-group" style=" align-items: flex-end;">
                        {{-- <label for="teamSelect" >CHANGE STATUS:</label> --}}
                        <form action="{{ route('change_status', [$ad->id]) }}" method="post">
                          @csrf
                          <select class="form-control" id="teamSelect" name="status" style="width: 80%">
                            <option value="{{ $ad->status }}">Select here:</option>
                            <option value="active">ACTIVE</option>
                            <option value="inactive">INACTIVE</option> 
                          </select> 
                          <button type="submit" class="form-buttons" style="float: left; width: 7rem; margin-top:0.5rem">Update status</i></button>
                        </form>
                      </div> 
                    </div>
                  </td>
                </tr>
              @endforeach 
              </form>
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