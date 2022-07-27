<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include './DBconfig.php';
$datetime=date('ymd');
$insertLiked_ID="";
$checktime="";
  if (empty($_SESSION['user_id'])){
    header("location:../User_login.php");
  }

  if (isset($_GET['like'])) {

    $sql_s = " SELECT Liked_ID FROM `liked` ORDER BY Liked_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {      
        $checkLiked_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
        $checktime = (int) substr($checkLiked_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
    }

    if ($datetime==$checktime){
        $nextVal = (int) substr($checkLiked_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
        $nextVal++;

        if ($nextVal >= 100000)
            $stepCount = "";
        else if ($nextVal >= 10000)
            $stepCount = "0";
        else if ($nextVal >= 1000)
            $stepCount = "00";
        else if ($nextVal >= 100)
            $stepCount = "000";
        else if ($nextVal >= 10)
            $stepCount = "0000";
        else
            $stepCount = "00000";




        $insertLiked_ID= "LK".$datetime.$stepCount.$nextVal;
        }else {
            $insertLiked_ID= "LK".$datetime."000001";
        }
    $userid = $_SESSION['user_id'];
    $pid = $_GET['productid'];
    $lot = $_GET['productlot'];
    $sql_like = "INSERT INTO liked VALUES('$insertLiked_ID', current_timestamp(),'$userid','$pid','$lot')";
    echo"$sql_like<br>";
    if ($conn->query($sql_like)===TRUE) {
        header("location:../Product_detail.php?productid=$pid&productlot=$lot&likecomplete");
    }else{
        header("location:../Product_detail.php?productid=$pid&productlot=$lot&likefail");
    }
  }
  ?>