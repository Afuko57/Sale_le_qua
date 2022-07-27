<?php
    include './DBconfig.php';
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $datetime=date('ymd');
    $inseruser_ID="";
    $checktime="";
    if (isset($_POST['addorder']))
    {



    $Payment_useraddress = $_POST['Payment_useraddress']; //ที่อยู่การจัดส่ง
    echo "$Payment_useraddress";
    if ($_POST['Donation-address']!=0){
        $Donation=$_POST['Donation-address'];
        $sql_sp = "SELECT * FROM `donation` where `Donation_ID` = '$Donation'";
        $result = $conn->query($sql_sp);
        $row = $result->fetch_array();
        $Payment_useraddress = $row[5];  
    }
    
    echo "$Payment_useraddress";





    $sql_s = " SELECT Order_ID FROM `orderbill` ORDER BY Order_ID ; ";
    $result = mysqli_query($conn, $sql_s);
    while ($row = mysqli_fetch_row($result)) {      
        $checkOrder_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
        $checktime = (int) substr($checkOrder_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
    }

    if ($datetime==$checktime){
        $nextVal = (int) substr($checkOrder_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
        $nextVal++;

        if ($nextVal >= 100000)
            $stepCount = "";
        else if ($nextVal >= 10000)
            $stepCount = "0";
        else if ($nextVal >= 1000)
            $stepCount = "00";
        else if ($nextVal >= 100)
            $stepCount = "000";
        else if ($nextVal >= 10)
            $stepCount = "0000";
        else
            $stepCount = "00000";

        $insertOrder_ID=$stepCount.$nextVal;


        $insertOrder_ID= "OR".$datetime.$stepCount.$nextVal;
        }else {
            $insertOrder_ID= "OR".$datetime."000001";
        }
        
    $insertuserID= $_SESSION['user_id'];
    echo " $insertOrder_ID <br>"; 
    echo "".$_SESSION['user_id']."<br>";
    $sql_order = "INSERT INTO orderbill VALUES('$insertOrder_ID', current_timestamp(),'pending','$Payment_useraddress','$insertuserID',null)";
    echo"$sql_order<br>";
    if ($conn->query($sql_order)===TRUE) {
        echo "insertbillsuccess";
        foreach ($_SESSION['cart'] as $key) {
            $sql_order_ID = " SELECT OrderDetail_ID FROM `orderdetail` ORDER BY Order_ID ; ";
            $result = mysqli_query($conn, $sql_order_ID);
            while ($row = mysqli_fetch_row($result)) {      
                $checkOrderDetail_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
                $checktime = (int) substr($checkOrderDetail_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
            }
        
            if ($datetime==$checktime){
                $nextVal = (int) substr($checkOrderDetail_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
                $nextVal++;
        
                if ($nextVal >= 100000)
                    $stepCount = "";
                else if ($nextVal >= 10000)
                    $stepCount = "0";
                else if ($nextVal >= 1000)
                    $stepCount = "00";
                else if ($nextVal >= 100)
                    $stepCount = "000";
                else if ($nextVal >= 10)
                    $stepCount = "0000";
                else
                    $stepCount = "00000";
        
                $insertOrderDetail_ID=$stepCount.$nextVal;
        
        
                $insertOrderDetail_ID= "OD".$datetime.$stepCount.$nextVal;
                }else {
                    $insertOrderDetail_ID= "OD".$datetime."000001";
                }
                echo "$insertOrderDetail_ID";

        $totalPrice=0;
        $sql_sp = "SELECT Productlot_SellPrice , product.Donation_typeID"
        ." FROM productlot "
        ." JOIN product ON product.Product_ID = productlot.Product_ID "
        ." WHERE productlot.Product_ID = '$key[0]' AND productlot.Productlot_ID = '$key[2]'";
        $result = $conn->query($sql_sp);
        $row = $result->fetch_assoc();

        $price = $row['Productlot_SellPrice']*$key[1];
        $Product_Donation_typeID = $row['Donation_typeID'];
        $sql_orderbill = "INSERT INTO orderdetail VALUES('$insertOrderDetail_ID', $key[1],'$price','pending','$insertOrder_ID','$key[0]','$key[2]',null,null,'$Product_Donation_typeID',current_timestamp())";
        echo "$sql_orderbill";
        if ($conn->query($sql_orderbill)===TRUE){
            unset($_SESSION['cart']);
            header("location:../Homepage_main.php?msg=\"Complete\" ");
        }else{
            header("location:../Homepage_main.php?msg=\"Fail\" ");
        }
            
        }


    }
    }
        
?>