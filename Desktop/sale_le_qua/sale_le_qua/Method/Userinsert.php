<?php
include './DBconfig.php';
date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$inseruser_ID="";
$checktime="";
if (isset($_POST['insertuser']))
    {
    $sql_s = " SELECT User_ID FROM `user` ORDER BY User_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {      
        $checkuser_id = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
        $checktime = (int) substr($checkuser_id, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
    }
    echo "$checkuser_id";
    echo " $checktime ";
    echo " $datetime ";
    
     if ($datetime==$checktime){
        $nextVal = (int) substr($checkuser_id, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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
            
        $inseruser_ID=$stepCount.$nextVal;
    
    
        $inseruser_ID= "US".$datetime.$stepCount.$nextVal;
        }else {
            $inseruser_ID= "US".$datetime."000001";
        }
        
    echo " $inseruser_ID";
    // $inseruser_ID=$_POST['User_ID'];

    // $User_Profileimage_input = $_FILES['User_Profileimage']['tmp_name'];
    // $User_Profileimage = addslashes(file_get_contents($User_Profileimage_input));

    $inseruser_Username=$_POST['User_Username'];
    $inseruser_Password=$_POST['User_Password'];
    $inseruser_Email=$_POST['User_Email'];
    $inseruser_Firstname=$_POST['User_Firstname'];
    $inseruser_Lastname=$_POST['User_Lastname'];
    $inseruser_Tel=$_POST['User_Tel'];
    $inseruser_Address=$_POST['User_Address'];
    // $inseruser_Profileimage=$_POST['User_Profileimage'];
    
    $inseruser_Password = md5($inseruser_Password);
    $sql = "INSERT INTO user VALUES('$inseruser_ID', '$inseruser_Username','$inseruser_Password','$inseruser_Email','$inseruser_Firstname','$inseruser_Lastname','$inseruser_Tel','$inseruser_Address','null',current_timestamp(),current_timestamp())";

    echo"$sql";
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