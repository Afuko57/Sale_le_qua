<?php
include './DBconfig.php';

if (isset($_POST['edituser'],$_GET['usereditid']))
    {
    $originaluser_ID=$_GET['usereditid'];
    $edituser_ID=$_POST['User_ID'];
    $edituser_Username=$_POST['User_Username'];
    // $edituser_Password=$_POST['User_Password'];
    $edituser_Email=$_POST['User_Email'];
    $edituser_Firstname=$_POST['User_Firstname'];
    $edituser_Lastname=$_POST['User_Lastname'];
    $edituser_Tel=$_POST['User_Tel'];
    $edituser_Address=$_POST['User_Address'];
    // $edituser_Profileimage=$_POST['User_Profileimage']; //OLD
    // $edituser_Profileimage_input = $_FILES['User_Profileimage']['tmp_name'];
    // $edituser_Profileimage = addslashes(file_get_contents($edituser_Profileimage_input)); 
    // $edituser_Password = md5($edituser_Password);
        $sql="UPDATE `user` SET `User_Username` =  '$edituser_Username',"
            // ."`User_Password` = '$edituser_Password',"
            ."`User_Email` = '$edituser_Email',"
            ."`User_Firstname` = '$edituser_Firstname',"
            ."`User_Lastname` = '$edituser_Lastname',"
            ."`User_Tel` = '$edituser_Tel',"
            ."`User_Address` = '$edituser_Address',"
            // ."`User_Profileimage` = '$edituser_Profileimage',"
            ."`User_ID` = '$edituser_ID'"
            ." WHERE User_ID = '$originaluser_ID';";
      

    
    // echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../User_manage.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../User_manage.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../User_manage.php?msg=\"NOT fround id\" ");
     }
