<?php
session_start();
include 'DBconfig.php';
if (isset($_GET['order_tracking']) and isset($_POST['inserttracking']))
    {
        $order_tracking_id = $_GET['order_tracking'];
        $order_shipment_number = $_POST['Shipment_Code'];
        $order_shipment_type = $_POST['Shipment_ID'];
        echo"$order_tracking_id";
        echo"$order_shipment_number";
        echo"$order_shipment_type";

        $sql = " UPDATE orderdetail SET `OrderDetail_Status` = 'delivery', `Shipment_Code` = '$order_shipment_number', `Shipment_ID` = '$order_shipment_type' WHERE OrderDetail_ID = '$order_tracking_id';";
        
    echo"$sql";
    if ($conn->query($sql)===TRUE) 
        {
        header("location:../Store_orders_manage.php?msg=\"Complete\" ");
        } 
    else{
        header("location:../Store_orders_manage.php?msg=\"Fail\" ");
        }
    }
else
    {
    header("location:../Store_orders_manage.php?msg=\"NOT fround id\" ");
}

    

?>