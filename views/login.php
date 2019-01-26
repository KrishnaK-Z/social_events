<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
  .grid
  {
      position: absolute;
      top: 40%;
      right: 30%;
      transform:  translate(50%,-70%) ;
  }

  nav a {
    top: 50%;
    left: 15%;
  }

</style>
</head>

<body>

<nav class="btn-effect">
		<a href="#"><span>Join with us</span><span>Gateway to community</span></a>
</nav>


<form method="POST" action="http://localhost/social_events/public/login" enctype="multipart/form-data" class="grid" id="loginform">


<div class="grid_item full_part">
<div class="input_label">E-Mail </div>
<input type="email" name="userEmail" class="input_box">
<div class="error"></div>
</div>

<div class="grid_item full_part">
<div class="input_label">Password </div>
<input type="password" name="password" class="input_box">
<div class="error"> </div></div>


<div class="grid_item full_part" style="justify-content: center;">
<button type="submit" name="logon" class="grid_item log_btn" id="logbtn">Log On</button>
</div>

</form>

<script src="./ajaxrequest/ajaxrequest.js"></script>

</body>
</html>
