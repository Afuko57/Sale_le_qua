<?php 
session_start();
include 'DBconfig.php';
date_default_timezone_set("Asia/Bangkok");
$datetime=date('ymd');
$checktime="";

if (isset($_POST['insertscore']) and isset($_GET['product'])){
       $user_id = $_SESSION['user_id'];
       $score_product = $_POST['rating'];
       $score_product = (int) $score_product;
       $comment_detail = $_POST['comment_detail'];

       $product_id = $_GET['product'];
       $order_id = $_GET['order'];
       $productlot_id = $_GET['productlot_id'];

       $sql = " SELECT Review_ID FROM `review` ORDER BY Review_ID ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {      
            $checkReview_ID = $row[0];        //หาตัวไอดีตัวสุดท้ายเพื่อสร้างเลขรหัสตัวต่อไป
            $checktime = (int) substr($checkReview_ID, 2,6); //ตัดส่วนอักษรข้างหน้าออกและส่วนท้ายที่เป็นตัวเลขจำนวน
        }
        if ($datetime==$checktime){
            $nextVal = (int) substr($checkReview_ID, 8);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
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

            $insertReview_ID= "PM".$datetime.$stepCount.$nextVal;
        }else {
                $insertReview_ID= "PM".$datetime."000001";
            }
       
       $sql_insertreview = "INSERT INTO review VALUES('$insertReview_ID',current_timestamp(),'$score_product','$comment_detail','$user_id','$product_id','$productlot_id')";
       echo"$sql_insertreview<br>";
       if ($conn->query($sql_insertreview)===TRUE) {
              $sql_updateorder = " UPDATE orderdetail SET `OrderDetail_Status` = 'complete' WHERE OrderDetail_ID = '$order_id';";
              //   echo "$sql_updateorder";

              $sql_checkscore = " SELECT (sum(`Review_score`)+$score_product)/(COUNT(`Review_score`)+1) FROM `review` WHERE `Product_ID` = '$product_id';";
              $result = $conn->query($sql_checkscore);
              $rowsc = $result->fetch_array();

              $sql_updatescore = " UPDATE product SET `Product_Score` = '$rowsc[0]' WHERE Product_ID  = '$product_id';";
            
              if ($conn->query($sql_updateorder)===TRUE){
                    $conn->query($sql_updatescore);
                     header("location:../User_tracking.php?msg=\"Complete\" ");
              }else{
                     header("location:../User_tracking.php?msg=\"Fail\" ");
              }
       }     
}
?>