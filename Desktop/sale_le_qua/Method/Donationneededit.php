<?php
include './DBconfig.php';
session_start();
if (isset($_POST['donationneededit']))
    {
        $Don_ID = $_SESSION['donation_id'];
        $need = $_POST['need'];
    

        $sql="UPDATE `donation` SET `Donation_Need` =  '$need'"
            ." WHERE Donation_ID = '$Don_ID';";
      

    
    // echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Donation_profile.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../Donation_profile.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../Donation_profile.php?msg=\"NOT fround id\" ");
     }
