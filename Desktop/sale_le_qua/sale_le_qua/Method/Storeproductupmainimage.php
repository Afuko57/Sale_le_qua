<?php
include './DBconfig.php';

if (isset($_POST['productaddimage'],$_GET['productaddimage_ID']))
    {
    $originalproduct_ID=$_GET['productaddimage_ID'];
    $editproduct_productimage_input = $_FILES['Product_Mainimage']['tmp_name'];
    $editproduct_productimage_input = addslashes(file_get_contents($editproduct_productimage_input)); 

        $sql="UPDATE `product` SET `Product_Mainimage` =  '$editproduct_productimage_input'"
            ." WHERE Product_ID = '$originalproduct_ID';";
      

    
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
