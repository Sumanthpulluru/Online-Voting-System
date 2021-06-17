<?php
session_start();
include("connect.php");


$votes=$_POST['gvotes'];
$total_votes= $votes+1;
$gid= $_POST['gid'];
$usid= $_POST['usid'];
$roleid=$_POST['roleid'];

$update_votes= mysqli_query($connect,"UPDATE user SET votes='$total_votes' where rollnumber='$gid'");
$update_user_status= mysqli_query($connect, "UPDATE user SET status= 1 where rollnumber='$usid' ");

if($update_votes and $update_user_status)
{
    $groups= mysqli_query($connect,"SELECT * FROM user where role=2");
    $groupsdata= mysqli_fetch_all($groups, MYSQLI_ASSOC);
    
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupsdata']= $groupsdata;
    
    if($roleid==3){
        echo '
            <script>
                alert("voted successfully!");
                window.location= "../routes/admin.php";
            </script>
            ';
    }
    else{
        echo '
            <script>
                alert("voted successfully!");
                window.location= "../routes/dashboard.php";
            </script>
            ';
    }
    
}
else{
    echo '
            <script>
                alert("some error has occured!");
                window.location= "../routes/dashboard.php";
            </script>
        ';
}
?>
