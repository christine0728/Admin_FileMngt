<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Login</title> 
  <link rel="icon" href="{{ url('images/favicon.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-container {
      display: flex;
      max-width:900px;
      width: 100%;
    }

        .alert {
        /* border: 1px solid transparent; */
        /* border-radius: 4px; */
        padding:6px;
    }

    .alert-warning {
        background-color:#D6143B;
        border-color: black;
        color: white;
        font-size: 14px;
        text-align:center;
    }
    .login-left {
      flex: 1;
      padding: 20px;
      background-color: white;
      border-radius: 8px 0 0 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 510px;
    }

    .login-left img {
      display: block;
      margin: 0 auto;
      max-height: 100px;
    }

    .login-left p {
      margin-bottom: 10px;
    }

    .login-form {
      flex: 1;
      padding: 40px;
      background-color: white;
      border-radius: 0 8px 8px 0;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);

    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form .form-label {
      display: flex;
      align-items: center;
    }

    .login-form .form-label i {
      margin-right: 10px;
    }

    .btn-primary:hover {
      background-color: #6F79AA !important;
      color: white;
    }

    img{
      border-radius: 50px;
    }
    p{
      color:white;
    }

    .g-recaptcha {
      max-height: 100px; /* Adjust this value as needed */
      overflow: hidden;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="login-left" style="background-color: #1D0A68">
        <b><p style="font-size: 20px">Admin Department</p></b>
        <b><p style="font-size: 30px">Admin File Management System</p></b>
        <b><p style="margin-bottom: 0;font-size: 20px">Philippine National Police<br><b style="font-size:12px">Urdaneta City Police Station</b></p></b>
      </div>
      <div class="login-form" style="background-color:#D9D9D9">
        <center><img src="{{ asset('images/pnp - logo.png') }}" alt="Login Image" height="100px" width="100px"></center><br>

        <form action="{{ route('logging_in') }}" method="post">
          @if(session('error'))
            <div class="alert alert-warning">
            {{ session('error') }}
            </div>
          @endif
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label"><i class="fa fa-envelope"></i> Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
            <div class="error-message">
              @error('email')
                {{ $message }}
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label"><i class="fa fa-lock"></i> Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
              <button class="btn btn-outline-secondary" type="button" id="password-toggle-btn"><i class="fa fa-eye"></i></button>
            </div>  
            <div class="error-message">
              @error('password')
                {{ $message }}
              @enderror
            </div>
        </div>
 
          {!! NoCaptcha::renderJs() !!}
          {!! NoCaptcha::display() !!}

          @error('g-recaptcha-response')
              <p class="text-danger">{{ $message }}</p>
          @enderror
 
          <button type="submit" class="btn btn-primary w-100" style="background-color:#1D0A68"> Login&nbsp;<i class="fa fa-arrow-right"></i></button>
        </form>

        <div id="flash-message" class="mt-3" style="display: none;"></div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      fetch(this.action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          window.location.href = data.redirect;
        } else {
          document.getElementById('flash-message').innerHTML = '<div class="alert alert-danger" role="alert">Incorrect username or password.</div>';
          document.getElementById('flash-message').style.display = 'block';
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  </script>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('password-toggle-btn');
        
        toggleButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                toggleButton.innerHTML = '<i class="fa fa-eye"></i>';
            }
        });
    });
</script>
