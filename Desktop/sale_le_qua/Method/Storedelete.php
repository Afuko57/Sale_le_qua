<?php
include './DBconfig.php';

if (isset($_GET['delete']))
    {
    $del=$_GET['delete'];
    $sql = "DELETE FROM `store` WHERE `Store_ID` = '$del' ";
    echo $sql;

    if ($conn->query($sql)===TRUE) 
        {
        header("location:../Store_manage.php?msg=\"Compleat\" ");
        } 
    else{
        header("location:../Store_manage.php?msg=\"Fail\" ");
        }
    }
else
    header("location:../Store_manage.php?msg=\"NOT fround id\" ");