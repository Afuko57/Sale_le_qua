<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart_insertbill</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
    <!--------------------NAV---------------------->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

   
    <!--------------------Pay bill---------------------->
    <link rel="stylesheet" type="text/css" href="paybill-cart/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="paybill-cart/paybill.css?V=1">
    <!--------------------style---------------------->
    <link rel="stylesheet" type="text/css" href="style-home/style.css">

</head>

<body>

    <!-- Nav --> <?php require_once("nav_footer_cate/navbar.php"); ?></div>
    <?php
    // session_start();
    include './Method/DBconfig.php';
    date_default_timezone_set("Asia/Bangkok");
    $datemonth = date('m');
    $dateyear = date('Y');
    ?>

    <?php //Get Address
    if (isset($_GET['paybillid'])) {
        $paybill_id = $_GET['paybillid'];
        echo "$paybill_id";
    }
    ?>

   

    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user` where `User_ID` = '$user_id' ";
    // echo "$sql";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    $usertel = $row['User_Tel'];
    $userfirst  = $row['User_Firstname'];
    $userlast  = $row['User_Lastname'];
    // $useraddress  = $row['User_Address'];
    // echo "$usertel";
    // echo "$userfirst";
    // echo "$userlast";
    // echo "$useraddress";
    ?>

    <div class="container">
        <div class="main-paybill">
            <form method="POST" action="./Method/Paymentbill.php" enctype="multipart/form-data" class="form-main">
                <label>วิธีการชำระเงิน</label><br>
                <input type="radio" value="Visa" name="Payment_type" checked>&nbsp;Visa &nbsp; &nbsp;&nbsp;
                <input type="radio" value="Master card" name="Payment_type">&nbsp;Master card &nbsp; &nbsp;&nbsp;
                <input type="radio" value="JCB" name="Payment_type">&nbsp;JCB &nbsp; &nbsp;&nbsp;
                <input type="radio" value="Union" name="Payment_type">&nbsp;Union
                <br>
                <label>หมายเลขบัตร</label>
                <input type="text" value="" name="Payment_BankID" placeholder="Payment_BankID"><br>
                <label>ชื่อธนาคารผู้ออกบัตร</label>
                <select name="Payment_Bankname">
                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย จำกัด (มหาชน)</option>
                    <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา จำกัด (มหาชน)</option>
                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย จำกัด (มหาชน)</option>
                    <option value="ธนาคารทหารไทยธนชาต">ธนาคารทหารไทยธนชาต จำกัด (มหาชน)</option>
                    <option value="ธนาคารซีไอเอ็มบี">ธนาคารซีไอเอ็มบี ไทย จำกัด (มหาชน)</option>
                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์ จำกัด (มหาชน)</option>
                </select><br>
                <label>เดือนหมดอายุ</label>
                <input type="number" value="<?php echo "$datemonth" ?>" name="Payment_Bankmonthexpire" placeholder="<?php echo "$datemonth" ?>">
                <label>ปีหมดอายุ</label>
                <input type="number" value="<?php echo "$dateyear" ?>" name="Payment_Bankyearexpire" placeholder="<?php echo "$dateyear" ?>"><br>
                <label>เบอร์โทรศัพท์</label>
                <input type="text" value="<?php echo "$usertel" ?>" name="Payment_Tel" placeholder="Payment_Tel"><br>
                <label>ชื่อ</label>
                <input type="text" value="<?php echo "$userfirst" ?>" name="Payment_Firstname" placeholder="Payment_Firstname">
                <label>นามสกุล</label>
                <input type="text" value="<?php echo "$userlast" ?>" name="Payment_Lastname" placeholder="Payment_Lastname"><br>
                <input type="checkbox" name="check1">ยอมรับเงื่อนไขข้อตกลงการชำระเงินรูปแบบออนไลน์ผ่านเว็บไซต์ <br><a href="#">อ่านเพิ่มเติม</a><br>
                <input type="hidden" name="paybill_id" value="<?php echo "$paybill_id" ?>">
                <input type="submit" name="payment" value="ยอมรับคำสั่งซื้อ">
            </form>
        </div>
    </div>
  
     <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
</body>

</html>