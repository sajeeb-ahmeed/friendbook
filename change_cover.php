<?php
require_once("config.php");
if(isset($_POST['cover'])){

$avata = $_FILES['cover'];
$tmpname = $avata['tmp_name']; 
$name = $avata['name']; 
$type = $avata['type'];
if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg" || $type=="pjp"){
$uniqname = uniqid().date("Y-m-d-H-i-s").$name;

  $dest = "covers/".$uniqname;
move_uploaded_file($tmpname,$dest); 
$cookieuser = $_COOKIE['currentuser'];
$avatarq = "UPDATE `users` SET `cover` = '$uniqname' WHERE `users`.`uniqid` = '$cookieuser'";
$runavatarq = mysqli_query($conn,$avatarq);
if($runavatarq==true){
header("location:profile.php");
}



}}else{
header("location:profile.php");
}
header("location:profile.php");
?>