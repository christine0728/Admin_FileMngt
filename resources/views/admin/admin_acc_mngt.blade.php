<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=10">

    <title>Admin | Admin Account Mngt.</title>
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
      <a class="link-buttons" href="{{ route('add_admin_form') }}" style="font-size: medium">Add Admin Account</a>
    </div>

    <div class="col-12" style="padding: 1rem; margin-top: -1rem">
      @if(Session::has('added')) 
        <div class="alert alert-success col-12" role="alert">
          <b>{{ session::get('added') }}</b>
        </div>
      @endif 

      @if(Session::has('edited')) 
        <div class="alert alert-warning col-12" role="alert">
          <b>{{ session::get('edited') }}</b>
        </div>
      @endif 
    </div>

    <div class="col-12" style="margin-top: -1rem">
      <div style="padding: 1rem; background-color: white; border-radius: 0.5rem">
        <table id="harvTbl" class="display" >
          <thead>
            <tr>
              <th>Fullname</th>
              <th>Username</th>
              <th>Status</th>
              <th>Created At</th> 
              <th style="width: 10rem;">Action</th>
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
                  <center>  
                    <a class="edit-btn" href="{{ route('edit_admin_form', [ $ad->id ]) }}">&nbsp;&nbsp;&nbsp;Edit Account<i class="fa fa-edit" style="font-size: large; padding: 0.5rem"></i></a>  
                </center>
                </td>
              </tr>
            @endforeach 
            </form>
          </tbody>
        </table>
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