<?php
session_start();
include("connect.php");
$winner=mysqli_query($connect,"SELECT *FROM user WHERE votes= (SELECT MAX(votes) FROM user)");
$winnerdata=mysqli_fetch_all($winner,MYSQLI_ASSOC);
if( count($winnerdata)==1){
    ?>
    <html>
        <head>
            <title>results</title>
            <link rel="stylesheet" href="../css/stylesheet.css">
        </head>
        <body>
            <h1>VCE STUDENT ONLINE VOTING SYSTEM</h1>
            <br><br>
            <hr>
            <h2>WINNER IS:</h2>
            <b><?php echo $winnerdata[0]['name']?></b>
            <br>
            <br>
            
            <img style=" border: 2px solid rgb(19, 235, 224);" src="../uploads/<?php echo $groupsdata[0]['photo']?>" height ="300" width="300" >
        </body>
    </html>
    <?php
}
else{
    ?>
    <html>
        <head>
            <title>results</title>
            <link rel="stylesheet" href="../css/stylesheet.css">
        </head>
        <body>
            <h1>VCE STUDENT ONLINE VOTING SYSTEM</h1>
            <br><br>
            <hr>
            <h2>WINNER IS:</h2>
            <b style="color: red;">NO WINNER ELECTION IS INCONCLUSIVE</b>
            
        </body>
    </html>
    <?php
}


?>