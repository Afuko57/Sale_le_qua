<?php
include './DBconfig.php';

if (isset($_POST['storeaddimage'],$_GET['storeaddimage_ID']))
    {
    $originalstore_ID=$_GET['storeaddimage_ID'];
    $editstore_Profileimage_input = $_FILES['Store_Profileimage']['tmp_name'];
    $editstore_Profileimage = addslashes(file_get_contents($editstore_Profileimage_input)); 

        $sql="UPDATE `store` SET `Store_Profileimage` =  '$editstore_Profileimage'"
            ." WHERE Store_ID = '$originalstore_ID';";
      

    
    // echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Store_manage.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../Store_manage.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../Store_manage.php?msg=\"NOT fround id\" ");
     }
