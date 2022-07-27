<?php
session_start();
include 'DBconfig.php';
if (isset($_GET['summitid']))
    {
        $order_tracking_id = $_GET['summitid'];
        echo"$order_tracking_id";

        $sql = " UPDATE orderdetail SET `OrderDetail_Status` = 'finish' WHERE OrderDetail_ID = '$order_tracking_id';";
        
    echo"$sql";
    if ($conn->query($sql)===TRUE) 
        {
        header("location:../User_tracking.php?msg=\"Complete\" ");
        } 
    else{
        header("location:../User_tracking.php?msg=\"Fail\" ");
        }
    }
else
    {
    header("location:../User_tracking.php?msg=\"NOT fround id\" ");
}

    

?>