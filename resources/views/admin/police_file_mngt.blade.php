<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=12">

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Admin | Police File Mngt.</title>
</head>
<body style="background-color: #d3d3d3">
  @include('includes.navbar')

  <div class="col-12" style="margin-top: 4rem">
    <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">

    <div class="col-12" style="margin-top: -3rem">
      <h1><b>Personnel File Management</b></h1>
    </div>

    <div class="col-12" style="margin-top: -2rem">
      <a class="link-buttons" href="{{ route('add_police_form') }}" style="font-size: medium">Add Police Personnel&nbsp;&nbsp;<i class="fa-solid fa-plus"></i></a>
    </div>

    <div class="col-12" >
      <div class="col-12" style="padding: 1rem; margin-top: 0.5rem">
        @if(Session::has('message')) 
          <div class="alert alert-success col-12" role="alert">
            <b>{{ session::get('message') }}</b>
          </div>
        @endif 
      </div>

      <div style="padding: 1rem; background-color: white; border-radius: 0.5rem">
        <table id="harvTbl" class="display" >
          <thead>
            <tr style="text-align: center">
              <th>Image</th>
              <th style="min-width: 10rem">Name</th>
              <th>Rank</th>
              <th>Unit/Station</th> 
              <th>Sex</th>
              <th>Status</th>
              <th>Change Status</th>
              <th style="width: 8rem;">Action</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($police as $pol) 
              <tr>
                <td style="text-align: center"> 
                  @if($pol->per_image)
                    <img src="{{ asset('images/police/' . $pol->per_image) }}" alt="{{ $pol->per_firstname }}" class="img-thumbnail" style="max-width: 110px; max-height: 110px;">
                    @else
                      No Image
                    @endif
                </td>
                <td style="text-align: center">{{ $pol->per_firstname }} {{ $pol->per_middlename }} {{ $pol->per_lastname }}</td>
                <td style="text-align: center">{{ $pol->per_rank }}</td>
                <td style="text-align: center">{{ $pol->per_unit_station }}</td> 
                <td style="text-align: center">{{ $pol->per_sex }}</td>  
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
                    <select class="form-control" name="per_status" style="border-radius: 0.3125rem; width: 8rem; padding: 0.4rem; font-size: medium; margin-bottom: 0.5rem">
                        <option>Select status:</option>
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option> 
                        <option value="schooling">SCHOOLING</option> 
                    </select>
                    <button type="submit" class="form-buttons" > Change status </button>
                  </form>
                </td>
                <td style="text-align: center">
                  <a class="link-buttons" href="{{ route('view_police', [$pol->id]) }}">View&nbsp;&nbsp;<i class="fa-regular fa-eye"></i></a>

                  <br><a class="edit-btn" href="{{ route('view_police', [$pol->id]) }}" style="margin-top: 0.5rem">Edit&nbsp;&nbsp;<i class="fa fa-edit"></i></a>
                </td>
              </tr>
            @endforeach 
            </form>
          </tbody>
        </table>
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