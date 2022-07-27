
<?php
    session_start();
    include './DBconfig.php';
     if (isset($_POST['payment'])) {
        date_default_timezone_set("Asia/Bangkok");
            $datetime=date('ymd');
            $checktime="";

            $paybill_id = $_POST['paybill_id'];
            $Payment_Tel = $_POST['Payment_Tel'];
            $Payment_Firstname= $_POST['Payment_Firstname'];
            $Payment_Lastname= $_POST['Payment_Lastname'];
            $PaymentOwner = $Payment_Firstname.' '.$Payment_Lastname;
            // echo "$Payment_Tel";


        $sql = " SELECT Payment_ID FROM `payment` ORDER BY Payment_ID ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {      
            $checkPayment_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
            $checktime = (int) substr($checkPayment_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
        }
        if ($datetime==$checktime){
            $nextVal = (int) substr($checkPayment_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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

            $insertPayment_ID= "PM".$datetime.$stepCount.$nextVal;
        }else {
                $insertPayment_ID= "PM".$datetime."000001";
            }
        
    $insertuserID= $_SESSION['user_id'];
    $sql_insertpayment = "INSERT INTO payment VALUES('$insertPayment_ID','$PaymentOwner','$Payment_Tel','$insertuserID',current_timestamp())";
    echo"$sql_insertpayment<br>";
    if ($conn->query($sql_insertpayment)===TRUE) {
        echo "insertbillsuccess"; 
        $sql_updatebill = " UPDATE orderbill SET `Payment_ID` = '$insertPayment_ID', `Order_Status` = 'paid' WHERE Order_ID = '$paybill_id';"; //สถานะbill
        echo "$sql_updatebill";
        if ($conn->query($sql_updatebill)===TRUE){
            $sql_checkamount = " SELECT orderdetail.OrderDetail_ID,"   //ลบตามจำนวนสินค้าที่ซื้อ
            ." orderdetail.Product_ID,"
            ." product.Product_Name,"
            ." productlot.Productlot_Amount,"
            ." orderdetail.Product_Quantity,"
            ." orderdetail.Order_ID," 
            ." orderdetail.OrderDetail_Lotnumber" 
            ." FROM orderdetail "
            ." Left join product on orderdetail.Product_ID = product.Product_ID"
            ." JOIN productlot ON orderdetail.Product_ID = productlot.Product_ID"
            ." WHERE Order_ID= '$paybill_id' "
            ." GROUP BY product.Product_ID;";
            echo "$sql_checkamount";
            $result_checkamount= mysqli_query($conn, $sql_checkamount);
            while ($row_updateamount = $result_checkamount->fetch_array()) {
                echo "$row_updateamount[0]";
                echo "$row_updateamount[2]";
                echo "$row_updateamount[4]";
                $sql_updateproductamount = " UPDATE productlot SET Productlot_Amount = Productlot_Amount-$row_updateamount[4] WHERE Product_ID = '$row_updateamount[1]' and Productlot_ID ='$row_updateamount[6]';";
                echo "$sql_updateproductamount";
                if ($conn->query($sql_updateproductamount)){
                    echo "success";
                }else {
                    header("location:../User_tracking.php?msg=\"Fail\"&productid=$row_updateamount[1]");
                }
            }
            header("location:../User_tracking.php?msg=\"Complete\" ");
        }else{
            header("location:../User_tracking.php?msg=\"Fail\" ");
         
            
        }
    }   
}
?>
