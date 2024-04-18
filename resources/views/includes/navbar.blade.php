 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 

body,h1,h2,h3,h4,h5,h6,a {
  font-family: 'Open Sans', sans-serif; 
}

body, html {
  height: 100%;
  line-height: 1.8;
}

a.active {
  background-color: white !important;
  color: black !important;
}
 
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

.hoverrr:hover{
  background-color: #6F79AA !important;
  color: white !important;
}


</style> 
 
<div class="w3-top">
  <div class="w3-bar w3-card" id="myNavbar" style="background-color: #1D0A68; color: white">
    <a href="{{ route('police_file_mngt') }}" class="w3-bar-item w3-button w3-wide hoverrr"><b>A D M I N</b></a> 
    <div class="w3-right w3-hide-small">
    <a href="{{ route('police_file_mngt') }}" class="w3-bar-item w3-button hoverrr  {{ (request()->is('police_file_mngt*')) ? 'active' : '' }}">Personnel File Management</a>
    <a href="{{ route('admin_acc_mngt') }}" class="w3-bar-item w3-button hoverrr">Admin Accounts Management</a>
    {{-- <a href="#work" class="w3-bar-item w3-button hoverrr"><i class="fa fa-user"></i>&nbsp;&nbsp;User Profile</a>  --}}

    <div class="w3-dropdown-hover">
      <button class="w3-button hoverrr" title="Notifications" style="font-size: medium">{{ Auth::guard('admin')->user()->firstname }} {{ Auth::guard('admin')->user()->lastname }}&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-card-4 w3-bar-block ">
        <a href="{{ route('view_admin_form', Auth::guard('admin')->user()->id ) }}" class="w3-bar-item w3-button hoverrr">View Profile</a>
        <a href="{{ route('admin.logout') }}" class="w3-bar-item w3-button hoverrr">Logout</a> 
      </div>
    </div>
  </div> 

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
 
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="{{ route('police_file_mngt') }}" onclick="w3_close()" class="w3-bar-item w3-button">Personnel File Management</a>
    <a href="{{ route('admin_acc_mngt') }}" onclick="w3_close()" class="w3-bar-item w3-button">Admin Accounts Management</a>
    <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user"></i>&nbsp;&nbsp;User Profile</a> 
</nav>
 
<script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
 
 
<script>  
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
    }
    
    function w3_close() {
        mySidebar.style.display = "none";
    }

    $(".list-group-item").click(function() {
  // Select all list items
  var listItems = $(".list-group-item");

  // Remove 'active' tag for all list items
  for (let i = 0; i < listItems.length; i++) {
      listItems[i].classList.remove("active");
  }

  // Add 'active' tag for currently selected item
  this.classList.add(" active");
});
</script> 
 
