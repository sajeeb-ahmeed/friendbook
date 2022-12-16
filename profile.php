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
$avatarm = $getdata["avatar"];
$coverm = $getdata["cover"];
$nicm = $getdata["nic"];
$genderm = $getdata["gender"];
$locationm = $getdata["location"];
$birthdaym = $getdata["birthday"];
$contactm = $getdata["contact"];
}
?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">

<title>Hello, world!</title>
<style type="text/css">
.svg-main-home{margin-bottom:5px;}
.svg-main-profile{margin-bottom:3px;}




.card {
width: 380px;
border: none;
border-radius: 15px;
padding: 8px;
background-color: #fff;
position: relative;
height: 300px
}

.upper {
height: 100px
}

.upper img {
width: 100%;
height:140px;
border-top-left-radius: 10px;
border-top-right-radius: 10px
}

.user {
position: relative
}

.profile img {
height: 80px;
width: 80px;
margin-top: 2px
}

.profile {
position: absolute;
top: -50px;
left: 38%;
height: 90px;
width: 90px;
border: 3px solid #fff;
border-radius: 50%
}

.follow {
border-radius: 15px;
padding-left: 20px;
padding-right: 20px;
height: 35px
}

.stats span {
font-size: 29px
}


.dropdown-content {
  display: none;
  position: absolute;
  top:35px;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-contentb {
  display: none;
  position: absolute;
  top:35px;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.show {display: block;}



</style>
</head>
<body>

<div  class="container">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<img class="bi me-2" width="100" height="33" src="../images/logo2.png">
</a>

<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<li><a href="home.php" class="nav-link px-2 link-dark"><img class="svg-main-home" height="20px" width="20px"  src="../images/home.svg" > Home</a></li>
<li><a href="chat.php" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="../images/chat.svg" > Chat</a></li>
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="../images/search.svg" > Search</a></li>
<li><a href="logout.php" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="../images/exit.svg" > LogOut</a></li>
</ul>

</header>
</div>
<!-- Header menu end -->



<?php $pepoole = $_GET['id'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$pepoole'";
$runmatchq = mysqli_query($conn,$matchq);
$checkcount = mysqli_num_rows($runmatchq);
if($checkcount==1 && $pepoole != $cookieuser){
while($getdata = mysqli_fetch_array($runmatchq)){
$avatarp = $getdata["avatar"];
$coverp = $getdata["cover"];

}
 echo "<div class='container d-flex justify-content-center align-items-center'>
 <div class='card'>
 <div class='upper'> <img src='covers/".$coverp."' class='img-fluid'> </div>
 <div class='user text-center'>
 <div class='profile'> <img  onclick='myFunction()' src='avatars/".$avatarp."' class='rounded-circle dropbtn' width='80'> </div>
 ";
}


?>



<?php if($_GET['id']==""){ echo "
<div class='container d-flex justify-content-center align-items-center'>
<div class='card'>
<div class='upper'> <img onclick='mygunction()' src='covers/".$coverm."' class='img-fluid'> </div>
<div class='user text-center'>
<div class='profile'> <img  onclick='myFunction()' src='avatars/".$avatarm."' class='rounded-circle dropbtn' width='80'> </div>
<div id='myDropdownb' class='dropdown-contentb'>
<h4>Choose Cover Photo</h4>
<form action='change_cover.php' method='post' enctype='multipart/form-data'  ><input type='file' class='form-control form-control-lg' name='cover'><input style='margin:5px;' type='submit' class='btn btn-success' name='cover' value='Upload'>
 <span onclick='showoff()' style='margin:5px;' class='btn btn-danger'>Cancel</span></form>
</div>
<div id='myDropdown' class='dropdown-content'>
<h4>Choose Profile Photo</h4>
<form action='change_avatar.php' method='post' enctype='multipart/form-data' ><input type='file' name='avatar'><input style='margin:5px;' type='submit' name='avatar' class='btn btn-success' value='Upload'><span onclick='showofff()' style='margin:5px;' class='btn btn-danger'>Cancel</span></form>
</div>";}
if($_GET['id']==$cookieuser){echo "
<div class='container d-flex justify-content-center align-items-center'>
<div class='card'>
<div class='upper'> <img onclick='mygunction()' src='covers/".$coverm."' class='img-fluid'> </div>
<div class='user text-center'>
<div class='profile'> <img  onclick='myFunction()' src='avatars/".$avatarm."' class='rounded-circle dropbtn' width='80'> </div>
<div id='myDropdownb' class='dropdown-contentb'>
<h4>Choose Cover Photo</h4>
<form action='change_cover.php' method='post' enctype='multipart/form-data'  ><input type='file' name='cover'><input style='margin:5px;' type='submit' class='btn btn-success' name='cover' value='Upload'>
<span onclick='showoff()' style='margin:5px;' class='btn btn-danger'>Cancel</span></form>
</div>
<div id='myDropdown' class='dropdown-content'>
<h4>Choose Profile Photo</h4>
<form action='change_avatar.php' method='post' enctype='multipart/form-data' ><input type='file' name='avatar'><input style='margin:5px;' type='submit' name='avatar' class='btn btn-success' value='Upload'><span onclick='showofff()' style='margin:5px;' class='btn btn-danger'>Cancel</span></form>
</div>";}
?>

</div>
<div class="mt-5 text-center">
<?php $pepoole = $_GET['id'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$pepoole'";
$runmatchq = mysqli_query($conn,$matchq);
$checkcount = mysqli_num_rows($runmatchq);
if($checkcount==1 && $pepoole!=$cookieuser){
while($getdata = mysqli_fetch_array($runmatchq)){
$fnamep = $getdata["fname"];
$lnamep = $getdata["lname"];
$nicp = $getdata["nic"];
}
 echo "<h4 class='mb-0'>".$fnamep." ".$lnamep."</h4> <span class='text-muted d-block mb-2'>".$nicp."</span><a href='message.php?id=".$pepoole."'><button class='btn btn-primary btn-sm follow'>Send message</button></a>";

}
if($_GET['id']==$cookieuser){ echo "<h4 class='mb-0'>".$fnamem." ".$lnamem."</h4> <span class='text-muted d-block mb-2'>".$nicm."</span>";}
if($_GET['id']==""){ echo "<h4 class='mb-0'>".$fnamem." ".$lnamem."</h4> <span class='text-muted d-block mb-2'>".$nicm."</span>";}
?>

<?php
if($_GET['id']==""){ echo "<a href='edit_profile.php' ><button class='btn btn-primary btn-sm follow'>Edit Profile</button></a>";}
if($_GET['id']==$cookieuser){ echo "<a href='edit_profile.php' ><button class='btn btn-primary btn-sm follow'>Edit Profile</button></a>";}
?>

<h6 class="mb-0">Bio:</h6>
<span class="text-muted d-block mb-2"><?php

$pepoole = $_GET['id'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$pepoole'";
$runmatchq = mysqli_query($conn,$matchq);
$checkcount = mysqli_num_rows($runmatchq);
if($checkcount==1){
while($getdata = mysqli_fetch_array($runmatchq)){
$fnamep = $getdata["fname"];
$lnamep = $getdata["lname"];
$biop = $getdata['bio'];
}
 echo $biop;
}

if($_GET['id']==""){ echo $biom;}



?></span>
</div>
</div>
</div>





<div style="margin-top:-20px;" class="container px-4 py-5" id="icon-grid">
<h2 class="pb-2 border-bottom">About Me.</h2>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">

<?php $pepoole = $_GET['id'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$pepoole'";
$runmatchq = mysqli_query($conn,$matchq);
$checkcount = mysqli_num_rows($runmatchq);
if($checkcount==1){
while($getdata = mysqli_fetch_array($runmatchq)){
$genderp = $getdata["gender"];
$locationp = $getdata["location"];
$birthdayp = $getdata["birthday"];
$contactp = $getdata["contact"];
}
 echo "<div class='col d-flex align-items-start'>
 <img height='30px' width='30px'   src='../images/gender.svg' >
 <div>
 <h5 class='fw-bold mb-0'>Gender : ".$genderp."</h5>
 </div></div>
 
 <div class='col d-flex align-items-start'>
 <img height='30px' width='30px'   src='../images/location.svg' >
 <div>
 <h5 class='fw-bold mb-0'>From : ".$locationp."</h5>
 </div></div>
 
 <div class='col d-flex align-items-start'>
 <img style='margin-right:5px;' height='28px' width='28px'   src='../images/calendar.svg' >
 <div>
 <h5 class='fw-bold mb-0'>Date Of Birth : ".$birthdayp."</h5>
 </div></div>
 
 <div class='col d-flex align-items-start'>
 <img height='30px' width='30px'   src='../images/gender.svg' >
 <div>
 <h5 class='fw-bold mb-0'>Contact Info : ".$contactp."</h5>
 </div></div>
 

 ";
}







if($_GET['id']==""){ echo "<div class='col d-flex align-items-start'>
<img height='30px' width='30px'   src='../images/gender.svg' >
<div>
<h5 class='fw-bold mb-0'>Gender : ".$genderm."</h5>
</div></div>

<div class='col d-flex align-items-start'>
<img height='30px' width='30px'   src='../images/location.svg' >
<div>
<h5 class='fw-bold mb-0'>From : ".$locationm."</h5>
</div></div>

<div class='col d-flex align-items-start'>
<img style='margin-right:5px;' height='25px' width='25px'   src='../images/calendar.svg' >
<div>
<h5 class='fw-bold mb-0'>Date Of Birth : ".$birthdaym."</h5>
</div></div>

<div class='col d-flex align-items-start'>
<img height='27px' width='27px'   src='../images/contact.svg' >
<div>
<h5 class='fw-bold mb-0'>Contact Info : ".$contactm."</h5>
</div></div>


";}
?>
</div>
</div>





<!-- Footer Start -->
<div class="container">
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

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


function mygunction() {
  document.getElementById("myDropdownb").classList.toggle("show");
}
function showoff(){
  document.getElementById("myDropdownb").classList.toggle("show");
 }
 
 function showofff(){
 document.getElementById("myDropdown").classList.toggle("show");
 }
</script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>