<?php
include './DBconfig.php';
date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$insertImage_ID="";
$checktime="";

if (isset($_POST['productaddimages'],$_GET['productaddimages_ID']))
    {
    $sql_s = " SELECT Image_ID FROM `images` ORDER BY Image_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {      
        $checkImage_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
        $checktime = (int) substr($checkImage_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
    }
    // echo "$checkImage_ID";
    // echo " $checktime ";
    // echo " $datetime ";
    
     if ($datetime==$checktime){
        $nextVal = (int) substr($checkImage_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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
            

    
    
        $insertImage_ID= "IM".$datetime.$stepCount.$nextVal;
        }else {
        $insertImage_ID= "IM".$datetime."000001";
        }
        
    


    $originalproduct_ID=$_GET['productaddimages_ID'];
    $insertproduct_productimage_input = $_FILES['product_images']['tmp_name'];
    $insertproduct_productimage_input = addslashes(file_get_contents($insertproduct_productimage_input)); 
    echo " $insertImage_ID";
    echo " $originalproduct_ID";    
        $sql = "INSERT INTO images VALUES('$insertImage_ID', '$insertproduct_productimage_input', '$originalproduct_ID')";
        // $sql="UPDATE `product` SET `Product_Mainimage` =  '$editproduct_productimage_input'"
        //     ." WHERE Product_ID = '$originalproduct_ID';";
 
    // echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Store_viewproduct.php?view_ID=$originalproduct_ID&msg=\"Complete\" ");
            } 
        else{
            header("location:../Store_viewproduct.php?view_ID=$originalproduct_ID&msg=\"Fail\" ");
            }
    }
else {
    header("location:../Store_storeproduct.php?msg=\"NOT fround id\" ");
     }
