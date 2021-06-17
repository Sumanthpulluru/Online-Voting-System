<?php
session_start();
include("connect.php");
$rollnumber= $_POST['rollnumber'];

$var=mysqli_query($connect,"INSERT INTO rollno(id) VALUES('$rollnumber')");
if($var)
{
    echo'
    <script>
    alert("added successfuly");
    window.location="../routes/admin.php";
    </script>
    ';
}
else{
    echo'
    <script>
    alert("not added....some error has occured");
    window.location="../routes/admin.php";
    </script>
    ';
}

?>