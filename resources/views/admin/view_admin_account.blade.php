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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <title>Admin | View Admin Form</title>
</head>
<body style="background-color: #d3d3d3">
  @include('includes.navbar')

  <div class="col-12" style="margin-top: 4rem">
    <a class="back-btn" href="#"  onclick="window.history.back();"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">

    <div class="col-12" style="margin-top: -3rem">
      <h1><b>View Admin Account</b></h1>
    </div> 

    <div class="col-12" style="margin-top: -1rem"> 
      <div class="row col-12" style="padding: 1rem; background-color: white; border-radius: 0.5rem; margin: 0rem auto 0rem auto">

        @if(Session::has('error')) 
          <div class="alert alert-success col-12" role="alert">
            <b>{{ session::get('error') }}</b> 
          </div> 
        @endif

        @foreach ($admin as $ad) 
          <form action="{{ route('edit_admin_acc', [$ad->id]) }}" method="post">
            @csrf
            <div class="col-4">
              <div class="form-group">
                <label for="exampleInputEmail1">FIRST NAME:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="firstname" value="{{ $ad->firstname }}" readonly>
                @if ($errors->has('firstname')) 
                  <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('firstname') }}</span>
                @endif 
              </div> 
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="exampleInputEmail1">MIDDLE INITIAL:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="middle_initial" value="{{ $ad->middle_initial }}" readonly>
                @if ($errors->has('middle_initial')) 
                  <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('middle_initial') }}</span>
                @endif 
              </div> 
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="exampleInputEmail1">LAST NAME:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lastname" value="{{ $ad->lastname }}" readonly>
                @if ($errors->has('lastname')) 
                  <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('lastname') }}</span>
                @endif 
              </div> 
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="exampleInputEmail1">USERNAME:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="{{ $ad->username }}" readonly>
                @if ($errors->has('username')) 
                  <span class="text-red text-sm" style="color:red; font-size: small; float: left">{{ $errors->first('username') }}</span>
                @endif 
              </div> 
            </div>  
            <div class="col-4"> 
              <div class="form-group" style=" align-items: flex-end;">
                <div class="form-group">
                  <label for="exampleInputEmail1">STATUS:</label>
                  @if ($ad->status == 'active')
                    <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACTIVE" style="background-color: palegreen; font-weight: bold; color: darkgreen; width: 5.5rem; border: none; font-size: medium" readonly>
                  @elseif ($ad->status == 'inactive')
                    <input name="" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="INACTIVE" style="background-color: pink; font-weight: bold; color: darkred; width: 7rem; border: none; font-size: medium" readonly>
                  @endif   
                </div> 
              </div> 
            </div>

            <div class="col-12">
              {{-- <button type="submit" class="form-buttons" style="float: right; width: 10rem">Save Changes&nbsp;&nbsp;<i class="fa-solid fa-check icons"></i></button> --}} 
              <a class="link-buttons" href="{{ route('edit_admin_form', Auth::guard('admin')->user()->id) }}" style="float: right">&nbsp;&nbsp;&nbsp;Edit Account<i class="fa fa-edit" style="font-size: large; padding: 0.5rem"></i></a>

              <a class="link-buttons" href="{{ route('change_password_form') }}" style="float: right; margin-right: 0.5rem">&nbsp;&nbsp;&nbsp;Change Password<i class="fa-solid fa-key" style="font-size: large; padding: 0.5rem"></i></a>
            </div>
          </form>
        @endforeach
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
        });
    </script>
</body>
</html>