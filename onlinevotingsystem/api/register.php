<?php
    include("connect.php");

    $rollnumber=$_POST['rollnumber'];
    $name= $_POST['name'];
    $mobile= $_POST['mobile'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $address = $_POST['address'];
    $image =$_FILES['photo']['name'];
    $tmp_name= $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];
    if($role==3){
        $adver=mysqli_query($connect,"SELECT *FROM rollno where id='$rollnumber'");
        if($adver){
            if($password==$cpass)
            {
                move_uploaded_file($tmp_name,"../uploads/$image");
                $insert = mysqli_query($connect,"INSERT INTO user(rollnumber,name,mobile,password,address,photo,role,status,votes) VALUES('$rollnumber','$name','$mobile','$password', '$address','$image','$role',0,0)");
                
                if($insert){
                    echo '
                    <script>
                        alert("registration successful!");
                        window.location= "../";
                    </script>
                    ';

                }
                else{
                    echo'
                    <script>
                        alert("some error has occured!");
                        window.location= "../routes/register.html";
                    </script>
                    ';
                    
                }
            }
            else{
                echo'
                <script>
                        alert("password and confirm password does not match");
                        window.location= "../routes/register.html";
                    </script>
                    ';
            }
        }
        else{
            echo'
                <script>
                        alert("you are not an authorised admin");
                        window.location= "../routes/register.html";
                    </script>
                    ';
        }
    }
    else{
        if($password==$cpass)
        {
            move_uploaded_file($tmp_name,"../uploads/$image");
            $insert = mysqli_query($connect,"INSERT INTO user(rollnumber,name,mobile,password,address,photo,role,status,votes) VALUES('$rollnumber','$name','$mobile','$password', '$address','$image','$role',0,0)");
            
            if($insert){
                echo '
                <script>
                    alert("registration successful!");
                    window.location= "../";
                </script>
                ';
            }

        
            else{
                echo'
                <script>
                    alert("some error has occured!");
                    window.location= "../routes/register.html";
                </script>
                ';
            
            }
        }
        else{
        
            echo'
            <script>
                    alert("password and confirm password does not match");
                    window.location= "../routes/register.html";
                </script>
                ';
        }
    }
    
?>
    