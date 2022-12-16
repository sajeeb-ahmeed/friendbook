<?php 

require_once("config.php");
if(!isset($_COOKIE['currentuser'])){header("location:login.php");}
$cookieuser = $_COOKIE['currentuser'];
$chatuserq =  htmlentities(mysqli_real_escape_string($conn,$_GET['id']));
$matchqa = "SELECT * FROM `users` WHERE uniqid='$chatuserq'";
$runmatchqa = mysqli_query($conn,$matchqa);
$checkcounta = mysqli_num_rows($runmatchqa);
if($checkcounta!=1 or $chatuserq==$cookieuser or $chatuserq==null){
header("location:chat.php");
}
$matchq = "SELECT * FROM `users` WHERE uniqid='$chatuserq'";
$runmatchq = mysqli_query($conn,$matchq);
while($getdata = mysqli_fetch_array($runmatchq)){
$fnamem = $getdata["fname"];
$lnamem = $getdata["lname"];
$avatarm = $getdata["avatar"];
$status = $getdata["status"];
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
<title>Hello, world!</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 

</script> 
<style type="text/css">

.wrapper{

margin:auto;
margin-top:-25px;
  background: #fff;
  max-width: 400px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

.chat-area header{
  display: flex;
  align-items: center;
  padding: 18px 30px;
}
.chat-area header .back-icon{
  color: #333;
  font-size: 18px;
}
.chat-area header img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
}
.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
}
.chat-box{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 0px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box .chat{
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 35px;
}
.chat-box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #fff;
  color: #333;
  border-radius: 18px 18px 18px 0;
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 45px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  border: none;
  outline: none;
  background: #333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}

.linko{
text-decoration:none;
color:black;

}
.typing-area button.active{
  opacity: 1;
  pointer-events: auto;
}

.nnn{
background:#ddd;
padding-left:15px;
padding-right:15px;
padding-top:6px;
border-radius: 0px 5px 5px 0px;
}
.nnn i{
font-size:30px;
}
iMg{
border-radius:50%;
}
.chat-box{

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
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main-home" height="20px" width="20px"  src="images/home.svg" > Home</a></li>
<li><a href="profile.php" class="nav-link px-2 link-dark"><img class="svg-main-profile" height="20px" width="20px"  src="images/profile.svg" > Profile</a></li>
<li><a href="chat.php" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/chat.svg" > Chat</a></li>
<li><a href="#" class="nav-link px-2 link-dark"><img class="svg-main" height="20px" width="20px"  src="images/search.svg" > Search</a></li>
</ul>


</header>

</div>





<div class="wrapper">
  <section class="chat-area">
    <header>
        <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
    <a class="linko"  href="profile.php?id=<?php echo $chatuserq;?>">  <img class="iMg" src="avatars/<?php echo $avatarm;?>" alt="">
      <div class="details">
        <span><?php echo $fnamem." ".$lnamem;?></span></a>
        <p><?php echo $status;?></p>
      </div>
    </header>
    <div id="chat" class="chat-box">

    </div>
    <form action="#" class="typing-area">
      <input id="userid" type="text" class="incoming_id" name="incoming_id" value="<?php echo $chatuserq;?>" hidden>
      <input id="message" type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
      <input id="Btnn" class="btn" type="submit" name="submit" hidden><label class="nnn" for="Btnn"><i class="fab fa-telegram-plane"></i></label></button>
    </form>
  </section>
</div><br>
<script type="text/javascript">
const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".nnn"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onscroll = ()=>{
    chatBox.classList.add("active");
}


chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

jQuery(function($) {
$('.chat-box').on('scroll', function() {
if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
    chatBox.classList.remove("active");
}
})
});


chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
  
  
  
  
  
  
  

</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script  src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>