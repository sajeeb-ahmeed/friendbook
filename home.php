<?php
require_once("config.php");
if(isset($_POST["submit"])){








$post = htmlentities(mysqli_real_escape_string($conn,$_POST['post']));
$postimg = $_FILES["postimg"];
$postimgerror = $postimg["error"];
$postimgname = $postimg["name"];
$tmpname = $postimg["tmp_name"];

if($postimgerror=="4"){
$uniqname = "default.png";
}else{
$uniqname = uniqid().date("Y-m-d-H-i-s").$postimgname;

  $dest = "uploaded/".$uniqname;
move_uploaded_file($tmpname,$dest); 


}

if($postimgerror=="4"and$post==""){}else{


$cookieuser = $_COOKIE['currentuser'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$cookieuser'";
$runmatchq = mysqli_query($conn,$matchq);
while($getdatao = mysqli_fetch_array($runmatchq)){
$fnameo = $getdatao["fname"];
$lnameo = $getdatao["lname"];
$avataro = $getdatao["avatar"];
$uniqido = $getdatao["uniqid"];
$GLOBALS['avataro'];
}
$insertqi = "INSERT INTO `post` (`uniqid`, `fname`, `lname`, `avatar`, `post`, `postimg`) VALUES ('$uniqido','$fnameo','$lnameo','$avataro','$post','$uniqname')";

$runinsq = mysqli_query($conn,$insertqi);

header("location:home.php");


}

}
?>
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


@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

html,
body {
    height: 100%
}

body {
    display: grid;
    place-items: center;
    font-family: 'Manrope', sans-serif;
}

.cardd {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    padding: 20px;
    padding-bottom:0px;
    width: 100%;
    word-wrap: break-word;
    background-color: #ddd;
    background-clip: border-box;
    border-radius: 6px;
    moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
resize: none;
border: 1px solid #ad9f9f;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000
}

.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202
}

#preview img{margin-bottom:5px;border:1.5px solid black; border-radius:4px;max-width: 100%;}

.linko{
text-decoration:none;
color:black;

}


</style>
</head>
<body>

<div  class="container">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<img class="bi me-2" width="100" height="33" src="images/logo2.png">
</a>

<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

<li><a href="profile.php" class="nav-link px-2 link-dark"><img class="svg-main-profile" height="20px" width="20px"  src="images/profile.svg" > Profile</a></li>
<li><a href="chat.php" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/chat.svg" > Chat</a></li>
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/search.svg" > Search</a></li>
</ul>
<?php
if(!isset($_COOKIE['currentuser'])){
echo "<div class='col-md-3 text-end'>

<a href='login.php'><button type='button' class='btn btn-outline-primary me-2'>Login</button></a>
<a href='register.php'><button type='button' class='btn btn-primary'>Sign-up</button></a>

</div>";
}{
}

?>

</header>


<?php
$cookieuser = $_COOKIE['currentuser'];
$matchq = "SELECT * FROM `users` WHERE uniqid='$cookieuser'";
$runmatchq = mysqli_query($conn,$matchq);
while($getdatao = mysqli_fetch_array($runmatchq)){
$avataroo = $getdatao["avatar"];
}
if(isset($_COOKIE['currentuser'])){echo "<div class='cardd'>
    <div class='row'>
        <div class='col-2'> <img src='avatars/".$avataroo."' width='50' height='50' style='border:2px solid blue;' class='rounded-circle mt-2'> </div>
        <div class='col-10'>
            <div class='comment-box ml-2'>
                <h4>What's on your mind..?</h4>

                <div class='comment-area'>
                <form action='#' enctype='multipart/form-data' method='post'> <textarea name='post' class='form-control' placeholder='Write your post.' rows='4'></textarea> </div>
                <div class='comment-btns mt-2'>
                <div id='preview'></div>
                    <div class='row'>
                        <div style='' class='col-6'>
                            <div class='pull-left'> <div class='mb-3'>
                            <input style='display:none;' placeholder='Enter Name' id='upload_file' onchange='getImagePreview(event)'
                             type='file' accept='image/png, image/gif, image/jpeg' name='postimg' ><label for='upload_file'><img height='40px' width='40px'  src='images/image.svg'></label>
                            </div>
                             </div>
                        </div>
                        <div style='' class='col-6'>
                            <div class='pull-right'> <input style='float: right;' class='btn btn-success' name='submit' value='Post' type='submit'> 
                             </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";}



?>


<?php

$matchqq = "SELECT * FROM `post` ORDER BY id DESC";
$runmatchqq = mysqli_query($conn,$matchqq);
while($getdata = mysqli_fetch_array($runmatchqq)){
$postm = $getdata["post"];
$postimgm = $getdata["postimg"];
$uniqidm = $getdata["uniqid"];
$fnamem = $getdata["fname"];
$lnamem = $getdata["lname"];
$avatarm = $getdata["avatar"];
echo "<div style='margin-top:30px;box-shadow:0px 0px 4px #000; border-radius:4px;' class='col'>
  <div  class='card'>

    <div class='card-body'>
    <a class='linko' href='profile.php?id=".$uniqidm."'>  <img style='border-radius:50%; border:2px solid blue;margin-right:5px; margin-bottom:5px;'  src='avatars/".$avatarm."' height='50px' width='50px'   > <h3 style='display:inline-block;' class='card-title'>".$fnamem." ".$lnamem." </h3> </a> <span style='margin-left:7px;'> at: 11-04 pm</span>
      <p class='card-text'>".$postm."</p>
    </div>
        <img style=' border-radius:4px;' class='bd-placeholder-img card-img-top' width='100%' height='' src='uploaded/".$postimgm."'  preserveAspectRatio='xMidYMid slice' focusable='false'>
  </div>
</div>";

}



?>








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


<script type="text/javascript">




function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.height="100";
    imagediv.appendChild(newimg);
  }
</script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script  src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>