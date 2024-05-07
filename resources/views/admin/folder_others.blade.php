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

  <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version=12">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <title>Admin | Others Folder</title>

  <style>
    .folder:hover { 
      background-color: #6F79AA !important;
      color: white !important;
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
    <a class="back-btn" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
  </div>

  <div class="row" style="width: 75%; margin: 0rem auto 0rem auto">
    <div class="col-12" style="margin-top: -3rem">
      <h1><b>{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}</b></h1>
    </div>

    <div class="col-12" style="margin-top: 0rem; background-color: white; border-radius: 0.5rem; margin-bottom: 5rem">
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

        <div class="col-12">
          <hr style="margin-top: -1.5rem; border-top: 1px solid #1D0A68">
        </div>
                
        <div class="col-12" style="margin-top: -2rem">
          <i class="fa-regular fa-folder-closed" style="font-size: 1rem;  color: #1D0A68; padding: 0.29rem; border-radius: 0.2rem"></i>
          <span style="font-size: medium; font-weight: bold; color: #1D0A68;">Others Folder</span>
        </div>

        <div class="col-12" style="padding: 1rem; margin-top: -1rem">
          @if(Session::has('message')) 
            <div class="alert alert-success col-12" role="alert">
              <b>{{ session::get('message') }}</b>
            </div>
          @endif 
        </div>
          
        @if($fid == 0)
        <form method="post" action="{{ route('add_file_others') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="pid" value="{{ $police->id }}">
          <input type="hidden" name="pol_fullname" value="{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}"> 
          <div class="col-6" style="margin-top: -1rem"> 
            <label for="image">Add File in Other PNP Documents folder:</label>
            <input type="file" class="form-control" id="file" name="file[]" accept="application/pdf" multiple> 
          </div>   

          <div class="col-12" style="margin-top: -1rem">
            <button type="submit" class="form-buttons" style="float: left; width: 7rem">Submit <i class="fa-solid fa-check icons"></i></button>
          </div>
        </form>  
        @else    
          <div class="col-12" style="margin-top: -1rem;">
            <form method="post" action="{{ route('update_file_others') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="pid" value="{{ $police->id }}">
              <input type="hidden" name="pol_fullname" value="{{ $police->per_firstname }} {{ $police->per_middlename }} {{ $police->per_lastname }}"> 
              <div class="col-6" style="margin-top: -1rem"> 
                <label for="image"><b>Update File in Other PNP Documents folder:</b></label>
                <input type="file" class="form-control" id="file" name="file[]" accept="application/pdf" multiple> 
              </div>   

              <div class="col-12" style="margin-top: -1rem; margin-bottom: 1.5rem">
                <button type="submit" class="form-buttons" style="float: left; width: 11rem">Submit Changes <i class="fa-solid fa-check icons"></i></button>
              </div>
            </form>

            <div style="padding: 1rem; border-radius: 0.5rem; margin-top: -2rem">
              <table id="harvTbl" class="display" >
                <thead>
                  <tr style="text-align: center">
                    <th>Preview</th>
                    <th>Filename</th>
                    <th>Upload date</th> 
                    <th style="width: 8rem;">Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach ($files as $f) 
                    <tr> 
                      <td><embed src="{{ route('view_others', $f->id) }}" type="application/pdf" width="100%" height="200px" /></td>
                      <td style="text-align: center">{{ $f->complete_filename}} </td>
                      <td style="text-align: center">{{ $f->created_at }}</td> 
                      <td style="text-align: center">
                        <a class="link-buttons" href="{{ route('view_others', $f->id) }}">View</a>
                      </td>
                    </tr>
                  @endforeach 
                  </form>
                </tbody>
              </table>
            </div> 
          </div> 
        @endif   
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