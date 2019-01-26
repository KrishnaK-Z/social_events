<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

<nav class="btn-effect">
		<a href="#"><span>Key to be part</span><span>Gateway to community</span></a>
</nav>


<form method="POST" action="http://localhost/social_events/public/register" enctype="multipart/form-data" class="grid" id="registerForm">

<div class="grid_item">
<div class="input_label">User Name *</div>
<input type="text" name="userName" class="input_box" id="userName">
<div class="error"></div>
</div>


<div class="grid_item item_pic_upload">
<div class="image"><img src="img/default_pic.jpg"></div>
<input type="file" name="profilePic" accept="image" class="input_box" style="position: absolute; bottom: 0;" id="profilePic"><br/>
</div>

<div class="grid_item">
<div class="input_label">I am a</div>
<select name="roleType" class="input_box" id="roleType">
<option value="participant">Participant</option>
<option value="coordinator">Coordinator</option>
<option value="organisation">Organisation</option>
</select>
</div>

<div class="grid_item full_part" >
<div class="input_label">Phone Number *</div>
<input type="text" name="phonenumber" class="input_box" id="phonenumber">
<div class="error"></div>
</div>

<div class="grid_item full_part" >
<div class="input_label">Street Address *</div>
<input type="text" name="streetAddress" class="input_box" id="streetAddress">
<div class="error"></div>
</div>

<div class="grid_item">
<div class="input_label">Area</div>
<input type="text" name="area" class="input_box" id="area">
</div>

<div class="grid_item">
<div class="input_label">Pin Code</div>
<input type="number" name="pincode" class="input_box" id="pincode">
</div>

<div class="grid_item full_part">
<div class="input_label">E-Mail *</div>
<input type="email" name="userEmail" class="input_box" id="userEmail">
<div class="error"></div>
</div>

<div class="grid_item">
<div class="input_label">Password *</div>
<input type="password" name="password" class="input_box" id="password">
<div class="error"> </div>
</div>

<div class="grid_item">
<div class="input_label">Confirm Password *</div>
<input type="password" name="confpass" class="input_box" id="confpass"><br/>
<div class="error"></div>
</div>

<div class="grid_item full_part" style="justify-content: center;">
<button type="submit" name="logon" class="grid_item log_btn" id="subbtn">Sign up</button>
</div>

</form>

<script src="./ajaxrequest/ajaxrequest.js"></script>
</body>
</html>
