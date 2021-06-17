<?php
session_start();
include("connect.php");
$rollnumber= $_POST['rollnumber'];
$password= $_POST['password'];
$role= $_POST['role'];

$check= mysqli_query($connect,"SELECT * FROM user WHERE rollnumber='$rollnumber' AND password='$password' AND role='$role'");

if(mysqli_num_rows($check)>0){
    $userdata= mysqli_fetch_array($check);
    $groups= mysqli_query($connect,"SELECT * FROM user where role=2");
    $groupsdata= mysqli_fetch_all($groups, MYSQLI_ASSOC );

    $_SESSION['userdata']=$userdata;
    $_SESSION['groupsdata']=$groupsdata;

    if($role==3){
        echo '
        <script>
            window.location= "../routes/admin.php";
        </script>
        ';
    }
    else{
        echo '
        <script>
            window.location= "../routes/dashboard.php";
        </script>
        ';
    }
}
else{
    echo '
            <script>
                alert("invalid credentials !");
                window.location= "../";
            </script>
            ';
}


?>