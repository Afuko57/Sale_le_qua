<?php
include './DBconfig.php';

if (isset($_GET['delete']))
    {
    $del=$_GET['delete'];
    $sql = "DELETE FROM `donation` WHERE `Donation_ID` = '$del' ";
    echo $sql;

    if ($conn->query($sql)===TRUE) 
        {
        header("location:../Donation_manage.php?msg=\"Compleat\" ");
        } 
    else{
        header("location:../Donation_manage.php?msg=\"Fail\" ");
        }
    }
else
    header("location:../Donation_manage.php?msg=\"NOT fround id\" ");