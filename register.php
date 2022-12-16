<?php
if(isset($_COOKIE['currentuser'])){header("location:home.php");}
echo $_COOKIE['currentuser'];
require_once("config.php");

if(isset($_POST['submit'])){
$fname =  htmlentities(mysqli_real_escape_string($conn,$_POST['fname']));
$lname =  htmlentities(mysqli_real_escape_string($conn,$_POST['lname']));
$email =  htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$pass1 =  htmlentities(mysqli_real_escape_string($conn,$_POST['pass1']));;
$pass2 =  htmlentities(mysqli_real_escape_string($conn,$_POST['pass2']));
$uniqid = rand();  
$passlength = strlen($pass1);
if($passlength>5){
if($pass1==$pass2){

$matchq = "SELECT * FROM `users` WHERE email='$email'";
$runmatchq = mysqli_query($conn,$matchq);
$checkcount = mysqli_num_rows($runmatchq);
if($checkcount>0){
header("location:register.php?email=exist");
}else{
$insertq = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `uniqid`) VALUES ('$fname','$lname','$email','$pass1','$uniqid')";
$runinsertq = mysqli_query($conn,$insertq);
if($runinsertq==true){echo "inserted";
$setcookieuser = setcookie("currentuser",$uniqid,time()+(86400*7));
$updateq = " UPDATE `users` SET `status` = 'online' WHERE `users`.`email` = '$email'";
$my = mysqli_query($conn,$updateq);
if($setcookieuser==true){header("location:home.php?id=".$uniqid."");}
}
}/*exist email*/}else{
header("location:register.php?equal=notequal");

}/*password length*/


/*$insertq = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `uniqid`) VALUES ('Bipul', 'Hossen', 'bipul@gmail.com', '12345', '865525')";
$runinsertq = mysqli_query($conn,$insertq);
if($runinsertq==true){echo "data inserted";}*/


}else{
header("location:register.php?length=less");

}/*equal password*/



} /*submit button*/
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

</style>
</head>
<body>

<div  class="container">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<img class="bi me-2" width="100" height="33" src="../images/logo2.png">
</a>

<!---->  <div class="col-md-3 text-end">

<a href="home.php" ><button type="button" class="btn btn-outline-primary me-2">Home</button></a>
<a href="login.php"<button type="button" class="btn btn-primary">Login</button></a>

</div>
</header>
</div>






<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
<div class="modal-dialog" role="document">
<div class="modal-content rounded-5 shadow">
<div class="modal-header p-5 pb-4 border-bottom-0">
<!-- <h5 class="modal-title">Modal title</h5> -->
<h2 class="fw-bold mb-0">Sign up for free</h2>
<a href="register.php"> <img height="25px" width="25px"  src="../images/reload.svg" ></a>
</div>

<div class="modal-body p-5 pt-0">
<form method="post" action="#" class="">
<div class="form-floating mb-3">
<input name="fname" type="name" class="form-control rounded-4" id="floatingInput" placeholder="Bipul">
<label for="floatingInput">First Name</label>
</div>

<div class="form-floating mb-3">
<input name="lname" type="name" class="form-control rounded-4" id="floatingInput" placeholder="Rahman">
<label for="floatingInput">Last Name</label>
</div>


<div class="form-floating mb-3">
<input name="email" type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
<label for="floatingInput">Email address</label>
<?php
if(isset($_GET['email'])){
echo "<span style='color:red;'>This email already registered. </span>";
}?>
</div>


<div class="form-floating mb-3">
<input name="pass1" type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
<label for="floatingInput">Password</label>
</div>
<div class="form-floating mb-3">
<input name="pass2" type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Confirm Password">
<label for="floatingPassword">Confirm Password</label>
<?php
if(isset($_GET['length'])){
echo "<span style='color:red;'>Password should be more than 6 character. </span>";
}
if(isset($_GET['equal'])){
echo "<span style='color:red;'>Password did not matched.</span>";
}
?>
</div>
<button name="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Sign up</button>
<small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
<hr class="my-4">
</form>
</div>
</div>
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




<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>