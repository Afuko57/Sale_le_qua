<?php
include './DBconfig.php';

if (isset($_GET['delete']))
    {
    $del=$_GET['delete'];
    $product_id=$_GET['product_id'];
    $sql = "DELETE FROM `productlot` WHERE `Productlot_ID` = '$del' ";
    echo $sql;

    if ($conn->query($sql)===TRUE) 
        {
        header("location:../Store_viewproduct.php?view_ID=$product_id&msg=\"Compleat\" ");
        } 
    else{
        header("location:../Store_viewproduct.php?view_ID=$product_id&msg=\"Fail\" ");
        }
    }
else
    header("location:../Store_viewproduct.php?view_ID=$product_id&msg=\"NOT fround id\" ");