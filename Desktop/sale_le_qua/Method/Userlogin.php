<?php


session_start();
include './DBconfig.php';


$loginusername="";
$loginpassword="";

if(isset($_POST['userlogin'])){
    $loginusername=$_POST['username'];
    $loginpassword=$_POST['userpassword'];
}
    $loginpassword= md5($loginpassword);

$sql = "SELECT * from user where User_Username ='$loginusername' and User_Password ='$loginpassword'";
echo "$sql";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); //จะเก็บIDไว้ในSessionด้วย
        if ($result->num_rows > 0) {
            $_SESSION['user']=$loginusername;
            $_SESSION['user_id']=$row['User_ID'];
            header("location:../Homepage_main.php");
        }
        else {
            header("location:../User_login.php?fail"); 
        }
$conn->close();

//ตัวอย่าง
// $e_id=$_GET['useraddimage_ID'];
// $sql = "SELECT * FROM `user` where `User_id` = '$e_id' ";
// $query = $conn->query($sql);
// $row = $query->fetch_assoc();
// $e_pro=$row['User_Profileimage'];