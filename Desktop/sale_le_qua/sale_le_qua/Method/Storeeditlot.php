<?php
include './DBconfig.php';

if (isset($_POST['productlotedit'],$_GET['productloteditid']))
    {
    
    
    $originalproduct_ID=$_GET['product_id'];

    $originalproductlot_ID=$_GET['productloteditid'];
    $editProductlot_price=$_POST['Productlot_price'];
    $editProductlot_discount=$_POST['Productlot_discount'];
    $editProductlot_amount=$_POST['Productlot_amount'];
    $editProductType_ID=$_POST['ProductType_ID'];


        $sql="UPDATE `productlot` SET `Productlot_SellPrice` =  ' $editProductlot_price',"
            ."`Productlot_Discount` = '$editProductlot_discount',"
            ."`Productlot_Amount` = '$editProductlot_amount'"
            ." WHERE Productlot_ID = '$originalproductlot_ID';";
      

    
     echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Store_viewproduct.php?view_ID=$originalproduct_ID&msg=\"Complete\" ");
            } 
        else{
            header("location:../Store_viewproduct.php?view_ID=$originalproduct_ID&msg=\"Fail\" ");
            }
    }
else {
    header("location:../Store_viewproduct.php?view_ID=$originalproduct_ID&msg=\"NOT fround id\" ");
     }
