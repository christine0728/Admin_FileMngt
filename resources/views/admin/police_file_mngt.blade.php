<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
      <a class="link-buttons" href="{{ route('add_police_form') }}" style="font-size: medium">Add Police Personnel</a>
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
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Rank</th>
              <th>Unit/Station</th>
              <th>Home Address (House No. / Street / City / Province)</th>
              <th>Sex</th>
              <th style="width: 8rem;">Action</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($police as $pol) 
              <tr>
                <td style="text-align: center">{{ $pol->per_image }}</td>
                <td style="text-align: center">{{ $pol->per_firstname }} {{ $pol->per_middlename }} {{ $pol->per_lastname }}</td>
                <td style="text-align: center">{{ $pol->per_rank }}</td>
                <td style="text-align: center">{{ $pol->per_unit_station }}</td>
                <td style="text-align: center">{{ $pol->per_house_no }}, {{ $pol->per_street }}, {{ $pol->per_city }}, {{ $pol->per_province }}</td>
                <td style="text-align: center">{{ $pol->per_sex }}</td> 
                <td style="text-align: center">
                  <a class="link-buttons" href="{{ route('view_police', [$pol->id]) }}">View</a>
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