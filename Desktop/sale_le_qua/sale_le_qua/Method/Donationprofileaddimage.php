<?php
include './DBconfig.php';

if (isset($_POST['Donationaddimage'],$_GET['donationaddimage_ID']))
    {
    $originalDonation_ID=$_GET['donationaddimage_ID'];
    $editDonation_Profileimage_input = $_FILES['Donation_Profileimage']['tmp_name'];
    $editDonation_Profileimage = addslashes(file_get_contents($editDonation_Profileimage_input)); 

        $sql="UPDATE `donation` SET `Donation_ProfileImage` =  '$editDonation_Profileimage'"
            ." WHERE Donation_ID  = '$originalDonation_ID';";
      

    
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
