<?php
include './DBconfig.php';

if (isset($_POST['editdonation'],$_GET['donationeditid']))
    {
        $donationeditid=$_GET['donationeditid'];
        $Donation_Name=$_POST['Donation_Name'];
        $Donation_ManagerName=$_POST['Donation_ManagerName'];
        $Donation_Email=$_POST['Donation_Email'];
        $Donation_Tel=$_POST['Donation_Tel'];
        $Donation_Address=$_POST['Donation_Address'];
        $Donation_Status=$_POST['Donation_Status'];
        $Donation_Detail=$_POST['Donation_Detail'];
        $Donation_Need=$_POST['Donation_Need'];
        $User_ID=$_POST['User_ID'];
        $DonationType_ID=$_POST['DonationType_ID'];

        
        $sql="UPDATE `donation` SET `Donation_Name` =  '$Donation_Name',"
            ."`Donation_ManagerName` = '$Donation_ManagerName',"
            ."`Donation_Email` = '$Donation_Email',"
            ."`Donation_Tel` = '$Donation_Tel',"
            ."`Donation_Address` = '$Donation_Address',"
            ."`Donation_Status` = '$Donation_Status',"
            ."`Donation_Detail` = '$Donation_Detail',"
            ."`Donation_Need` = '$Donation_Need',"
            ."`DonationType_ID` = '$DonationType_ID',"
            ."`User_ID` = '$User_ID'"
            ." WHERE Donation_ID = '$donationeditid';";

    

    
    echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Donation_manage.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../Donation_manage.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../Donation_manage.php?msg=\"NOT fround id\" ");
     }
