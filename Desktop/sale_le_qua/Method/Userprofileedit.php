<?php
include './DBconfig.php';
session_start();
if (isset($_POST['userprofileedit']))
    {
    $User_ID = $_SESSION['user_id'];
    $edituser_firstname=$_POST['firstname'];
    $edituser_lastname=$_POST['lastname'];
    $edituser_tel=$_POST['tel'];
    $edituser_email=$_POST['email'];
    $edituser_address=$_POST['address'];
    

        $sql="UPDATE `user` SET `User_Firstname` =  '$edituser_firstname',"
            ."`User_Lastname` = '$edituser_lastname',"
            ."`User_Tel` = '$edituser_tel',"
            ."`User_Email` = '$edituser_email',"
            ."`User_Address` = '$edituser_address'"
            ." WHERE User_ID = '$User_ID';";
      

    
    // echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../profile.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../profile.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../profile.php?msg=\"NOT fround id\" ");
     }
