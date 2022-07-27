<?php
include './DBconfig.php';

if (isset($_GET['delete']))
    {
    $del=$_GET['delete'];
    $sql = "DELETE FROM `product` WHERE Product_ID = '$del' ";
    echo $sql;

    if ($conn->query($sql)===TRUE) 
        {
        header("location:../Store_storeproduct.php?msg=\"Compleat\" ");
        } 
    else{
        header("location:../Store_storeproduct.php?msg=\"Fail\" ");
        }
    }
else
    header("location:../Store_storeproduct.php?msg=\"NOT fround id\" ");