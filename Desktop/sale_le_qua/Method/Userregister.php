<?php
include './DBconfig.php';
date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$reguser_ID="";
$checktime="";
if (isset($_POST['registeruser']))
    {
    $sql_s = " SELECT User_ID FROM `user` ORDER BY User_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {
        $checkuser_id = $row[0];
        $checktime = (int) substr($checkuser_id, 2,6);
    }
    //US210904000008

    // echo "$checkuser_id";
    // echo "<br>";
    // echo " $checktime ";
    // echo "<br>";
    // echo " $datetime ";
    // echo "<br>";


    //210904 vs 210912
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
    
        // $reguser_ID=$stepCount.$nextVal;
    
    
        $reguser_ID= "US".$datetime.$stepCount.$nextVal;
        }else {
            $reguser_ID= "US".$datetime."000001";
        }
        
    echo " $reguser_ID";

    


    $reguser_Username=$_POST['User_Username'];
    $reguser_Password=$_POST['User_Password'];
    $reguser_ConfirmPassword=$_POST['User_ConfirmPassword'];
    $reguser_Email=$_POST['User_Email'];
    $reguser_Firstname=$_POST['User_Firstname'];
    $reguser_Lastname=$_POST['User_Lastname'];
    $reguser_Tel=$_POST['User_Tel'];

    $Address1=$_POST['User_Address1'];
    $Address2=$_POST['User_Address2'];
    $Address3=$_POST['User_Address3'];
    $Address4=$_POST['User_Address4'];
    $Address5=$_POST['User_Address5'];




    $reguser_Address = $Address1.$Address2.$Address3.$Address4.$Address5 ;

    
    if ($reguser_Password==$reguser_ConfirmPassword){
        $reguser_Password = md5($reguser_Password);

        $sql = "INSERT INTO user VALUES('$reguser_ID', '$reguser_Username','$reguser_Password','$reguser_Email','$reguser_Firstname','$reguser_Lastname','$reguser_Tel','$reguser_Address','null',current_timestamp(),current_timestamp())";

        echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../User_login.php?msg=\"Complete\" ");
                } 
            else{
                header("location:../User_register.php?msg=\"Fail\" ");
                }
            }
    }
else {
    header("location:../User_login.php?msg=\"NOT fround id\" ");
}