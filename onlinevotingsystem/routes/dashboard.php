<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../");
}
$userdata= $_SESSION['userdata'];
$groupsdata= $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0)
{
    $status='<b style="color:red"> NOT VOTED </b>';
}
else{
    $status='<b style="color:green"> VOTED </b>';
}

?>


<html>
    <head>
        <title>ONLINE VOTING SYSTEM-DASHBOARD</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
             #backbtn{
                background-color:blue;
                color: white;
                padding: 5px;
                border-radius: 5px;
                border-color: black;
                float: left;

            }
            #logoutbtn{
                background-color:blue;
                color: white;
                padding: 5px;
                border-radius: 5px;
                border-color: black;
                float: right;

            }
            #profile{

                width:30%;
                padding: 15px;
                float: left;
                border: 2px solid red;
                position: relative;
            }

            #group{
              
                width:60%;
                padding: 20px;
                float: right;
                text-align: left;
                border: 2px solid red;

            }
            #votebtn{
                background-color:blue;
                color: white;
                padding: 5px;
                border-radius: 5px;
                border-color: black;
                

            }
            #voted{
                background-color:green;
                color: white;
                padding: 5px;
                border-radius: 5px;
                border-color: black;
            }
        </style>
        
        <div id="mainsection">
            <div id="headersection">
               <a href="../"> <button id="backbtn" >back</button></a>
                <a href="logout.php"><button id="logoutbtn" a href="../">logout</button></a>
                <h1>ONLINE VOTING SYSTEM</h1>
            </div>    
            <hr>

            <div id="profile">
                <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100" style=" border: 2px solid rgb(19, 235, 224);"></center><br><br>
                <b>NAME:</b><?php echo $userdata['name']?><br><br>
                <b>ROLL NUMBER: </b><?php echo $userdata['rollnumber']?><br><br>
                <b>MOBILE:</b><?php echo $userdata['mobile']?><br><br>
                <b>ADDRESS:</b><?php echo $userdata['address']?><br><br>
                <b>STATUS:</b><?php echo $status?><br><br>
            </div>

            <div id="group">
                <?php
                    if($_SESSION['groupsdata']){
                        for($i=0;$i<count($groupsdata);$i++)
                        {   
                            ?>
                            <div>
                                <img style="float: right; border: 2px solid rgb(19, 235, 224);" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height ="100" width="100" >
                                <b>GROUP NAME:</b><b> <?php echo $groupsdata[$i]['name']?> </b><br><br>
                                <b>GROUP ROLL NUMBER:</b><b> <?php echo $groupsdata[$i]['rollnumber']?> </b><br><br>
                            
                                <form action="../api/vote.php"  method="POST">
                               
                                    <input type='hidden' name='gvotes' value="<?php echo $groupsdata[$i]['votes']?>">
                                    <input type='hidden' name='gid' value="<?php echo $groupsdata[$i]['rollnumber']?>">
                                    <input type="hidden" name='usid' value="<?php echo $userdata['rollnumber']?>">
                                    <input type="hidden" name='roleid' value="<?php echo $userdata['role']?>">
                                    <?php
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                       <input type='submit' name='votebtn' value="vote" id="votebtn">
                                       <?php
                                    }
                                    else{
                                        ?>

                                    <button disabled type='button' name='votebtn' value="vote" id="voted">voted</button>
                                    <?php
                                    }
                                    ?>
                                 
                                </form>
                                
                            </div>
                            <hr>
                            <?php
                        }
                    }
                ?>
            </div>     
        </div>
    </body>
</html>