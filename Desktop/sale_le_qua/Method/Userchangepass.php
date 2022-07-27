<?php
include './DBconfig.php';
if (isset($_POST['changepassuser'],$_GET['userchangepassid']))
    {
    $changepassuser_UserID=$_GET['userchangepassid'];
    $changepassuser_Password=$_POST['User_Password'];
    $changepassuser_ConPassword=$_POST['User_ConPassword'];
    echo "$changepassuser_UserID<br>";
    echo "$changepassuser_Password<br>";
    echo "$changepassuser_ConPassword<br>";
    if ($changepassuser_Password==$changepassuser_ConPassword){
        $changepassuser_Password = md5($changepassuser_Password);

        $sql="UPDATE `user` SET `User_Password` =  '$changepassuser_Password'"
            ." WHERE User_ID = '$changepassuser_UserID';";
        echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../User_manage.php?msg=\"Complete\" ");
                } 
            else{
                header("location:../User_manage.php?msg=\"Fail\" ");
                }
            }
    }
else {
    header("location:../User_manage.php?msg=\"NOT fround id\" ");
}