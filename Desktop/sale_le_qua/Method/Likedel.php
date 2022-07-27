<?php
session_start();
include './DBconfig.php';
    $userid = $_SESSION['user_id'];
    $pid = $_GET['productid'];
    $lot = $_GET['productlot'];
    $sql_like = "DELETE FROM liked WHERE `User_ID`= '$userid' AND `Product_ID` = '$pid ' AND `Productlot_ID` ='$lot';";
    echo"$sql_like<br>";
    if ($conn->query($sql_like)===TRUE) {
        header("location:../Product_detail.php?productid=$pid&productlot=$lot&likedelcomplete");
    }else{
        header("location:../Product_detail.php?productid=$pid&productlot=$lot&likedelfail");
    }
  
  ?>