<?php
include './DBconfig.php';
session_start();

date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$insertproduct_ID="";
$checktime="";
if (isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    echo "product_id = $product_id";
}

if (isset($_POST['insertproductlot']))
    {
    $sql_s = " SELECT Productlot_ID FROM `productlot` ORDER BY Productlot_ID; "; //CheckProduct_ID
    echo $sql_s;
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {
        $checkproductlot_id = $row[0];
        $checktime = (int) substr($checkproductlot_id, 2,6);
    }

    echo "$checkproductlot_id";
    echo "<br>";
    echo " $checktime ";
    echo "<br>";
    echo " $datetime ";
    echo "<br>";

     if ($datetime==$checktime){
        $nextVal = (int) substr($checkproductlot_id, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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
    
  
    
    
        $insertproductlot_ID= "PL".$datetime.$stepCount.$nextVal;
        }else {
            $insertproductlot_ID= "PL".$datetime."000001";
        }
        
    echo " $insertproductlot_ID <br>";                      //กำหนดID
    $insertProductlot_OriginalPrice=$_POST['Productlot_OriginalPrice'];       
    $insertProductlot_SellPrice=$_POST['Productlot_SellPrice'];
    $insertProductlot_Discount=$_POST['Productlot_Discount'];
    $insertProductlot_Amount=$_POST['Productlot_Amount'];
    $insertProductlot_Productdate=$_POST['Productlot_Productdate'];
    $insertProductlot_Exdate=$_POST['Productlot_Exdate'];
    $insertProductlot_Extype=$_POST['Productlot_Extype'];

    $insertproduct_Mainimage_input = $_FILES['Productlot_Img']['tmp_name'];   //รูป
    $insertProductlot_Img = addslashes(file_get_contents($insertproduct_Mainimage_input));

    

    $sql = "INSERT INTO `productlot` VALUES ('$insertproductlot_ID','$product_id','$insertProductlot_OriginalPrice','$insertProductlot_SellPrice','$insertProductlot_Discount','$insertProductlot_Amount','$insertProductlot_Productdate','$insertProductlot_Exdate','$insertProductlot_Extype','normal',current_timestamp(),current_timestamp(),'$insertProductlot_Img')";
    // echo "$sql";
            if ($conn->query($sql)===TRUE) 
                {
                header("location:../Store_viewproduct.php?view_ID=$product_id&msg=\"Complete\" ");
                } 
            else{
                header("location:../Store_viewproduct.php?view_ID=$product_id&msg=\"Fail\" ");
                }
        }
else {
    header("location:../Store_storeproduct.php?msg=\"NOT fround id\" ");
}