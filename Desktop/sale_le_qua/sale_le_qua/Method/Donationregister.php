<?php
include './DBconfig.php';
session_start();
date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$regDonation_ID ="";
$checktime="";

if (isset($_POST['registerdonation']))
    {
    $sql_s = " SELECT Donation_ID  FROM `donation` ORDER BY Donation_ID  ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {
        $checkDonation_ID = $row[0];
        $checktime = (int) substr($checkDonation_ID , 2,6);
    }

     if ($datetime==$checktime){
        $nextVal = (int) substr($checkDonation_ID , 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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

        $regDonation_ID= "DN".$datetime.$stepCount.$nextVal;
        }else {
            $regDonation_ID= "DN".$datetime."000001";
        }
        


    
    $regDonation_Name=$_POST['Donation_Name'];
    $regDonation_ManagerName=$_POST['Donation_ManagerName'];
    $regDonation_Email=$_POST['Donation_Email'];
    $regDonation_Tel=$_POST['Donation_Tel'];
    $regDonation_Address=$_POST['Donation_Address'];
    $regDonation_Detail=$_POST['Donation_Detail'];
    $regDonationType_ID=$_POST['DonationType_ID'];
    $regDonation_Owner=$_SESSION['user_id'];
    


    $sql = "INSERT INTO `donation` VALUES('$regDonation_ID', '$regDonation_Name','$regDonation_ManagerName','$regDonation_Email','$regDonation_Tel','$regDonation_Address','null','pending','$regDonation_Detail','null',current_timestamp(),current_timestamp(),'$regDonation_Owner','$regDonationType_ID')";

        echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../Homepage_main.php?msg=\"Complete\" ");
                } 
            else{
                header("location:../Homepage_main.php?msg=\"Fail\" ");
                }
    }
else {
    header("location:../Homepage_main.php?msg=\"NOT fround id\" ");
}