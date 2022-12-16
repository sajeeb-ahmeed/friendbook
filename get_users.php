<?php 

require_once("config.php");
$cookieuser = $_COOKIE['currentuser'];
$matchqq = "SELECT * FROM `users` WHERE NOT uniqid='$cookieuser'";
$runmatchqq = mysqli_query($conn,$matchqq);
while($getdataa = mysqli_fetch_array($runmatchqq)){
$fname = $getdataa["fname"];
$lnm = $getdataa["lname"];
$avatar = $getdataa["avatar"];
$uniqid = $getdataa["uniqid"];
$status = $getdataa["status"];




$sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$getdataa['uniqid']}
OR outgoing_msg_id = {$getdataa['uniqid']}) AND (outgoing_msg_id = {$cookieuser} 
OR incoming_msg_id = {$cookieuser}) ORDER BY msg_id DESC LIMIT 1";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);
(mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
(strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
if(isset($row2['outgoing_msg_id'])){
      ($cookieuser == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
      }else{
      $you = "";
      }




echo '<a class="linkk" href="message.php?id='.$uniqid.'">
<div class="content">
<img src="avatars/'.$avatar.'" alt="">
<div class="details">
<span>'.$fname." ".$lnm.'</span>
<p>'.$you.$msg.'</p>
</div>
</div>
<div class="status-dot '.$status.'"><i class="fas fa-circle"></i></div>
</a>';
}
?>