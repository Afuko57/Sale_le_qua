<?php
include './DBconfig.php';
session_start();


date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$regstore_ID="";
$checktime="";
if (isset($_POST['registerstore']))
    {
    $sql_s = " SELECT Store_ID FROM store ORDER BY Store_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {
        $checkstore_id = $row[0];
        $checktime = (int) substr($checkstore_id, 2,6);
    }

    echo "$checkstore_id";
    echo "<br>";
    echo " $checktime ";
    echo "<br>";
    echo " $datetime ";
    echo "<br>";

     if ($datetime==$checktime){
        $nextVal = (int) substr($checkstore_id, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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
    
        $regstore_ID=$stepCount.$nextVal;
    
    
        $regstore_ID= "ST".$datetime.$stepCount.$nextVal;
        }else {
            $regstore_ID= "ST".$datetime."000001";
        }
        
    // echo " $regstore_ID";

    
    $regstore_Name=$_POST['Store_Name'];
    $regstore_Tel=$_POST['Store_Tel'];
    $regstore_Address=$_POST['Store_Address'];
    $regstore_Maindonation=$_POST['Store_Maindonation'];
    $regstore_Ownerid=$_SESSION['user_id'];
    $regstore_Acountnumber=$_POST['Store_Acountnumber'];
    $regstore_Bankname=$_POST['Store_Bankname'];
    if ($regstore_Bankname=='พร้อมเพย์'){
        if(strlen($regstore_Acountnumber)==10){
            $regstore_Bankname=$regstore_Bankname.'เบอร์โทรศัพท์';
        }else if (strlen($regstore_Acountnumber)==13){
            $regstore_Bankname=$regstore_Bankname.'รหัสบัตรประชาชน';
        }else {
            header("location:../Store_register.php?msg=\"Fail prompay\" ");
        }
    }


    $sql = "INSERT INTO store VALUES('$regstore_ID', '$regstore_Name','$regstore_Acountnumber','$regstore_Bankname','$regstore_Tel','$regstore_Address','null','$regstore_Maindonation','normal',current_timestamp(),current_timestamp(),'$regstore_Ownerid')";

        echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../Store_profile.php?msg=\"Complete\" ");
                } 
            else{
                header("location:../Store_profile.php?msg=\"Fail\" ");
                }
    }
else {
    header("location:../Store_profile.php?msg=\"NOT fround id\" ");
}