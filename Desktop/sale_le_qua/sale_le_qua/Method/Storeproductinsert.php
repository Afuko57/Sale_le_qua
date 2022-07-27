<?php
include './DBconfig.php';
session_start();
$Store_ID = $_SESSION['store_id'];

date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$insertproduct_ID="";
$checktime="";
if (isset($_POST['insertproduct']))
    {
    $sql_s = " SELECT Product_ID FROM `product` ORDER BY Product_ID ; "; //CheckProduct_ID
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {
        $checkproduct_id = $row[0];
        $checktime = (int) substr($checkproduct_id, 2,6);
    }

    echo "$checkproduct_id";
    echo "<br>";
    echo " $checktime ";
    echo "<br>";
    echo " $datetime ";
    echo "<br>";

     if ($datetime==$checktime){
        $nextVal = (int) substr($checkproduct_id, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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
    
        $insertproduct_ID=$stepCount.$nextVal;
    
    
        $insertproduct_ID= "PR".$datetime.$stepCount.$nextVal;
        }else {
            $insertproduct_ID= "PR".$datetime."000001";
        }
        
    echo " $insertproduct_ID <br>";                      //กำหนดID

    $sql_c = " SELECT Store_Maindonation FROM `store` Where Store_ID = '$Store_ID' ; ";  //กำหนดDonation
    $query = $conn->query($sql_c);
    $row = $query->fetch_assoc();
    $insertproduct_Donationtype=$row['Store_Maindonation'];
    echo "$sql_c"."<br>";
    echo "$insertproduct_Donationtype"."<br>";


    //กำหนดตัวแปรอื่นๆ
    $insertproduct_Name=$_POST['Product_Name'];       
    $insertproduct_Detail=$_POST['Product_Detail'];
    $insertproduct_Producttype=$_POST['Product_Producttype'];

    

    $insertproduct_Mainimage_input = $_FILES['Product_Mainimage']['tmp_name'];   //รูป
    $insertproduct_Mainimage = addslashes(file_get_contents($insertproduct_Mainimage_input));

    

    $sql = "INSERT INTO `product`(`Product_ID`, `Product_Name`,`Product_Detail`, `Product_Mainimage`, `Product_Status`, `Product_Score`,`Store_ID`, `Donation_typeID`,`ProductType_ID`,`Product_Timeupdate`, `Product_Timecreate`) VALUES ('$insertproduct_ID','$insertproduct_Name','$insertproduct_Detail','$insertproduct_Mainimage','normal','0','$Store_ID','$insertproduct_Donationtype','$insertproduct_Producttype',current_timestamp(),current_timestamp())";
    // echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../Store_storeproduct.php?msg=\"Complete\" ");
                } 
            else{
                header("location:../Store_storeproduct.php?msg=\"Fail\" ");
                }
        }
else {
    header("location:../Store_storeproduct.php?msg=\"NOT fround id\" ");
}