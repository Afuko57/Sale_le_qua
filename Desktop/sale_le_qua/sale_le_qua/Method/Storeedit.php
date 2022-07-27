<?php
include './DBconfig.php';

if (isset($_POST['editstore'],$_GET['storeeditid']))
    {
        $originalstore_ID=$_GET['storeeditid'];
        $editstore_ID=$_POST['Store_ID'];
        $editstore_Name=$_POST['Store_Storename'];
        $editstore_Acountnumber=$_POST['Store_Acountnumber'];
        $editstore_Bankname=$_POST['Store_Bankname'];
        $editstore_Tel=$_POST['Store_Tel'];
        $editstore_Address=$_POST['Store_Address'];
        $editstore_Maindonation=$_POST['Store_Maindonation'];
        $editstore_Status=$_POST['Store_Status'];
        $editstore_Owner=$_POST['Store_Owner'];

        if ($editstore_Bankname=='พร้อมเพย์'){
            if(strlen($editstore_Acountnumber)==10){
                $editstore_Bankname=$editstore_Bankname.'เบอร์โทรศัพท์';
            }else if (strlen($editstore_Acountnumber)==13){
                $editstore_Bankname=$editstore_Bankname.'รหัสบัตรประชาชน';
            }else {
                header("location:../Store_edit.php?msg=\"Fail prompay\" ");
            }
        }
        
        $sql="UPDATE store SET Store_Name =  '$editstore_Name',"
            ."`Store_Acountnumber` = '$editstore_Acountnumber',"
            ."`Store_Bankname` = '$editstore_Bankname',"
            ."`Store_Tel` = '$editstore_Tel',"
            ."`Store_Address` = '$editstore_Address',"
            ."`Store_Maindonation` = '$editstore_Maindonation',"
            ."`Store_Status` = '$editstore_Status',"
            ."`User_ID` = '$editstore_Owner'"
            ." WHERE Store_ID = '$originalstore_ID';";

    

    
    echo "$sql";
    if ($conn->query($sql)===TRUE) 
            {
            header("location:../Store_manage.php?msg=\"Complete\" ");
            } 
        else{
            header("location:../Store_manage.php?msg=\"Fail\" ");
            }
    }
else {
    header("location:../Store_manage.php?msg=\"NOT fround id\" ");
     }