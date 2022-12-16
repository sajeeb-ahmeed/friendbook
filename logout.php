<?php
require_once("config.php");
$cookieuser = $_COOKIE['currentuser'];
$updateq = " UPDATE `users` SET `status` = 'offline' WHERE `users`.`uniqid` = '$cookieuser'";
$my = mysqli_query($conn,$updateq);
$logout = setcookie("currentuser","",time()-99999999);
header("location:home.php");