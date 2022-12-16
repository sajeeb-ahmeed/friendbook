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
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<link rel="stylesheet" href="styleuser.css" >
<title>Hello, world!</title>

<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}


.wrapper{
margin:auto;
  background: #fff;
  max-width: 450px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

/* Users List CSS Start */
.users{
  padding: 25px 30px;
}
.users header,
.users-list a{
  display: flex;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #e6e6e6;
  justify-content: space-between;
}
.wrapper img{
  object-fit: cover;
  border-radius: 50%;
}
.users header img{
  height: 50px;
  width: 50px;
}
:is(.users, .users-list) .content{
  display: flex;
  align-items: center;
}
:is(.users, .users-list) .content .details{
  color: #000;
  margin-left: 20px;
}
:is(.users, .users-list) .details span{
  font-size: 18px;
  font-weight: 500;
}
.users header .logout{
  display: block;
  background: #333;
  color: #fff;
  outline: none;
  border: none;
  padding: 7px 15px;
  text-decoration: none;
  border-radius: 5px;
  font-size: 17px;
}
.users .search{
  margin: 20px 0;
  display: flex;
  position: relative;
  align-items: center;
  justify-content: space-between;
}
.users .search .text{
  font-size: 18px;
}
.users .search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.users .search input.show{
  opacity: 1;
  pointer-events: auto;
}
.users .search button{
  position: relative;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: #333;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.users .search button.active{
  background: #333;
  color: #fff;
}
.search button.active i::before{
  content: '\f00d';
}
.users-list{
  max-height: 430px;
  overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
  width: 0px;
}
.users-list a{
  padding-bottom: 10px;
  margin-bottom: 15px;
  padding-right: 15px;
  border-bottom-color: #f1f1f1;
}
.users-list a:last-child{
  margin-bottom: 0px;
  border-bottom: none;
}
.users-list a img{
  height: 40px;
  width: 40px;
}
.users-list a .details p{
  color: #67676a;
}
.users-list a .status-dot{
  font-size: 12px;
  color: #468669;
  padding-left: 10px;
}
.users-list a .status-dot.offline{
  color: #ccc;
}
.users header .content{display:flex;}
.users header .details{margin-left:15px;}
.users header .details span{font-size:18px;font-weight:500;}
.users-list a .content{display:flex;}
.users-list a .details{margin-left:15px;}
.users-list a .details span{font-size:18px;font-weight:500;}
.linkk{
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
<li><a href="home.php" class="nav-link px-2 link-dark"><img class="svg-main-home" height="20px" width="20px"  src="images/home.svg" > Home</a></li>
<li><a href="profile.php" class="nav-link px-2 link-dark"><img class="svg-main-profile" height="20px" width="20px"  src="images/profile.svg" > Profile</a></li>
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/search.svg" > Search</a></li>
</ul>


</header>

</div>





<div class="wrapper">
  <section class="users">
    <header>
      <div class="content">
        <img src="avatars/<?php echo $avatarm ?>" alt="">
        <div class="details">
          <span><?php echo $fnamem." ".$lnamem?></span>
          <p>Online</p>
        </div>
      </div>
      <a href="logout.php" class="logout">Logout</a>
    </header>
    <div class="search">
      <span class="text">Select an user to start chat</span>
      <input type="text" placeholder="Enter name to search...">
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="users-list">

    </div>
  </section>
</div>
<script type="text/javascript">
const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}


let xhr = new XMLHttpRequest();
xhr.open("GET", "get_users.php", true);
xhr.onload = ()=>{
if(xhr.readyState === XMLHttpRequest.DONE){
if(xhr.status === 200){
let data = xhr.response;
usersList.innerHTML = data;
}
}
}
xhr.send();

</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script  src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>