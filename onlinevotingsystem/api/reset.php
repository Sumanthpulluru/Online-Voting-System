<?php
session_start();
include("connect.php");
$rst=mysqli_query($connect,"UPDATE user SET  status=0 ,votes=0");
if($rst){
    
    header('location:../');
}
else{
    header('location:../routes/admin.php');
}
?>