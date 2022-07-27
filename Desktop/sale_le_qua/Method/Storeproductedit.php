<?php
include './DBconfig.php';

if (isset($_POST['productedit'],$_GET['producteditid']))
    {
    
        // <label>Product_Name</label>
        // <label>Product_OriginalPrice</label>
        // <label>Product_SellPrice</label>
        // <label>Product_Discount</label>
        // <label>Product_Amount</label>
        // <label>Product_Detail</label>
        // <label>Product_Productdate</label>
        // <label>Product_Exdate</label>
        // <label>Product_Extype</label>
        // <label>Product_Status</label>
        // <label>Product_Lotnumber</label>
        // <label>Promotion_ID</label>
        // <label>ProductType_ID</label>
        // <label>Shipment_ID</label>



    $originalproduct_ID=$_GET['producteditid'];
    $editProduct_Productname=$_POST['Product_Name'];
    $editProduct_Detail=$_POST['Product_Detail'];
    // $editProduct_Lotnumber=$_POST['Product_Lotnumber'];
    $editProductType_ID=$_POST['ProductType_ID'];


        $sql="UPDATE `product` SET `Product_Name` =  '$editProduct_Productname',"
            ."`Product_Detail` = '$editProduct_Detail',"
            ."`ProductType_ID` = '$editProductType_ID'"
            ." WHERE Product_ID = '$originalproduct_ID';";
      

    
     echo "$sql";
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
