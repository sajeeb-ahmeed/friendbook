<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<title>Hello, world!</title>
<style type="text/css">
.svg-main-home{margin-bottom:5px;}
.svg-main-profile{margin-bottom:3px;}

</style>
</head>
<body>

<div  class="container">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<img class="bi me-2" width="100" height="33" src="images/logo2.png">
</a>

<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main-home" height="20px" width="20px"  src="images/home.svg" > Home</a></li>
<li><a href="profile.php" class="nav-link px-2 link-dark"><img class="svg-main-profile" height="20px" width="20px"  src="images/profile.svg" > Profile</a></li>
<li><a href="chat.php" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/chat.svg" > Chat</a></li>
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/search.svg" > Search</a></li>
</ul>
<?php

require_once("config.php");
if(!isset($_COOKIE['currentuser'])){header("location:login.php");}
$cookieuser = $_COOKIE['currentuser'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$cookieuser'";
$runmatchq = mysqli_query($conn,$matchq);
while($getdata = mysqli_fetch_array($runmatchq)){
$fnamem = $getdata["fname"];
$lnamem = $getdata["lname"];
$biom = $getdata["bio"];
$nicm = $getdata["nic"];
$genderm = $getdata["gender"];
$locationm = $getdata["location"];
$birthdaym = $getdata["birthday"];
$contactm = $getdata["contact"];
}

if(isset($_POST['submit'])){
$bio = htmlentities(mysqli_real_escape_string($conn,$_POST['bio']));
$nic = htmlentities(mysqli_real_escape_string($conn,$_POST['nic']));
$gender = htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
$location = htmlentities(mysqli_real_escape_string($conn,$_POST['location']));
$birthday = htmlentities(mysqli_real_escape_string($conn,$_POST['birthday']));
$contact = htmlentities(mysqli_real_escape_string($conn,$_POST['contact']));
$updateq = " UPDATE `users` SET `nic` = '$nic', `bio` = '$bio', `gender` = '$gender', `location` = '$location', `birthday` = '$birthday', `contact` = '$contact' WHERE `users`.`uniqid` = '$cookieuser'";
$runupdateq = mysqli_query($conn,$updateq);
if($updateq==true){header("location:profile.php?updated");}else{header("location:profile.php?notupdated");}
}
?>
</header>

<div align='center' class='bd-example h2'>
<p class='h1'>Hello :  <span class='badge bg-primary'><?php echo $fnamem." ".$lnamem;?></span></p>
</div>

<h6 align='center'>Update your profile information from here</h6>
<form action="#" method="post">
<div style='margin-top:25px;' class='input-group mb-3'>
<span class='input-group-text'>Bio :</span>
<textarea name="bio"  class='form-control' aria-label='My bio' ><?php echo $biom;?></textarea>
</div>

<div class='input-group mb-3'>
<span style='padding-right:21px;' style='padding-right:38px;' class='input-group-text' id='basic-addon1'>Nickname:</span>
<input name="nic" value="<?php echo $nicm;?>" type='text' class='form-control' placeholder='My nickname' aria-label='Username' aria-describedby='basic-addon1'>
</div>

<div class='input-group mb-3'>
<span style='padding-right:42px;' class='input-group-text' id='basic-addon1'>Gender:</span>
<select name="gender" class='form-select' >
<option selected>Select Your Gender</option>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
<option value='Other'>Other</option>
</select>
</div>

<div class='input-group mb-3'>
<span style='padding-right:31px;' class='input-group-text' id='basic-addon1'>Location:</span>
<input name="location" value="<?php echo $locationm;?>" type='text' class='form-control' placeholder='Example: Protapnanar' aria-label='Username' aria-describedby='basic-addon1'>
</div>

<div class='input-group mb-3'>
<span style='padding-right:34px;' class='input-group-text' id='basic-addon1'>Birthday:</span>
<input name="birthday" type='date' value="<?php echo $birthdaym;?>" class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
</div>

<div class='input-group mb-3'>
<span style='padding-right:5px;' class='input-group-text' id='basic-addon1'>Contact Info:</span>
<input name="contact" type='text' value="<?php echo $contactm;?>" class='form-control' placeholder='Email or phone number' aria-label='Username' aria-describedby='basic-addon1'>
</div>
<input name="submit" style='display:inline-block; width:180px; float:left;' type='submit' value='Update' class='btn btn-success' ></form><a href='profile.php'><button style='float:right;width:180px;' class='btn btn-danger'>Back</button></a>




<!-- Footer Start -->
<div style="margin-top:70px;" class="container">
<footer class="py-3 my-4">
<ul class="nav justify-content-center border-bottom pb-3 mb-3">
<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
</ul>
<p class="text-center text-muted">&copy; 2021 Company, Inc</p>
</footer>
</div>
<!-- Footer end -->


</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>