<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Admin | Change Password</title>
</head>
<body style="background-color: #d3d3d3">
  @include('includes.navbar')

  <div class="col-12" style="margin-top: 4rem">
    <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">

    <div class="col-12" style="margin-top: -3rem">
      <h1><b>Change Password</b></h1>
    </div> 

    <div class="col-12" style="margin-top: -1rem"> 
      <div class="row col-12" style="padding: 1rem; background-color: white; border-radius: 0.5rem; margin: 0rem auto 0rem auto; width: 100%">

        @if(Session::has('error')) 
          <div class="alert alert-success col-12" role="alert">
            <b>{{ session::get('error') }}</b> 
          </div> 
        @endif

        {{-- @foreach ($admin as $ad)  --}}
          <form action="{{ route('changing_password') }}" method="post">
            @csrf
            <div class="" style="width: 50%; margin: 1.5rem auto 0rem auto">
              <div class="form-group">
                <label for="exampleInputEmail1"><b>USERNAME:</b></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username"> 
              </div> 
            </div>

            <div class="" style="width: 50%; margin: 1.5rem auto 0rem auto">
              <div class="form-group">
                <label for="exampleInputEmail1"><b>CURRENT PASSWORD:</b></label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="curr_password"> 
              </div> 
            </div>

            <div class="" style="width: 50%; margin: 1.5rem auto 0rem auto">
              <div class="form-group">
                <label for="exampleInputEmail1"><b>NEW PASSWORD:</b></label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password">
              </div> 
            </div> 

            <div class="col-12" style="margin-top: 1.5rem">
              <center><button type="submit" class="form-buttons" style=" width: 10rem">Save Changes&nbsp;&nbsp;<i class="fa-solid fa-check icons"></i></button> </center>

              {{-- <a class="link-buttons" href="{{ route('edit_admin_form', Auth::guard('admin')->user()->id) }}" style="float: right">&nbsp;&nbsp;&nbsp;Edit Account<i class="fa fa-edit" style="font-size: large; padding: 0.5rem"></i></a>

              <a class="link-buttons" href="{{ route('edit_admin_form', Auth::guard('admin')->user()->id) }}" style="float: right; margin-right: 0.5rem">&nbsp;&nbsp;&nbsp;Change Password<i class="fa-solid fa-key" style="font-size: large; padding: 0.5rem"></i></a> --}}
            </div>
          </form> 
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
          @include('includes.footer')
</body>
</html>