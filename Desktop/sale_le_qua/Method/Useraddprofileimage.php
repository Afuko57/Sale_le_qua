<?php
include './DBconfig.php';

if (isset($_POST['useraddimage'],$_GET['useraddimage_ID']))
    {
    $originaluser_ID=$_GET['useraddimage_ID'];
    $edituser_Profileimage_input = $_FILES['User_Profileimage']['tmp_name'];
    $edituser_Profileimage = addslashes(file_get_contents($edituser_Profileimage_input)); 

        $sql="UPDATE `user` SET `User_Profileimage` =  '$edituser_Profileimage'"
            ." WHERE User_ID = '$originaluser_ID';";
      

    
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
