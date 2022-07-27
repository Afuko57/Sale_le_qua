<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

</head>
<body>
  <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

<div class='container'>
<div class="container-form">
    <form method="POST" action="./Method/Storeregister.php" enctype="multipart/form-data">
        <label>ชื่อร้าน</label>
        <input type="text" value=""name="Store_Name" placeholder="ชื่อร้าน" required><br>
        <label>ช่องทางการรับเงิน</label>
        <select name="Store_Bankname" required>
            <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา จำกัด (มหาชน)</option>
            <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารทหารไทยธนชาต">ธนาคารทหารไทยธนชาต จำกัด (มหาชน)</option>
            <option value="ธนาคารซีไอเอ็มบี">ธนาคารซีไอเอ็มบี ไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์ จำกัด (มหาชน)</option>
            <option value="พร้อมเพย์" >พร้อมเพย์</option>
        </select><br>
        <label>เลขที่บัญชี</label>
        <input type="text" value=""name="Store_Acountnumber" placeholder="เลขที่การรับเงิน" required><br>
        <label>เบอร์โทร</label>
        <input type="text" value=""name="Store_Tel" placeholder="เบอร์โทร" required><br>
        <label>ที่อยู่ของร้าน</label>
        <input type="text" value=""name="Store_Address" placeholder="ที่อยู่ของร้าน" required><br>
        <label>ประเภทองค์กรที่ช่วยเหลือ</label>
        <select name="Store_Maindonation" required>
            <option value="1">วัด</option>
            <option value="2">เพื่อเด็ก</option>
            <option value="3">เพื่อสตรี</option>
            <option value="4">ช่วยเหลือสัตว์</option>
            <option value="5">เพื่อการศึกษา</option>
            <option value="6">เพื่อผู้ด้อยโอกาสและผู้พิการ</option>
        </select><br><br>
        <!-- <label>Shipment_ID</label>
        <select name="Shipment_ID">
            <option value="1" >ไปรษณีย์ไทย</option>
            <option value="2" >KERRY EXPRESS</option>
            <option value="3" >BEST EXPRESS</option>
            <option value="4" >NINJA VAN</option>
            <option value="5" >FLASH EXPRESS</option>
            <option value="6" >SCG EXPRESS</option>
            <option value="7" >J&T EXPRESS</option>
            <option value="8" >DHL EXPRESS</option>
            <option value="9" >LALAMOVE</option>
            <option value="10">ALPHA FAST</option>
        </select><br> -->
        <input type="submit" name="registerstore" value="submit">
    </form>
</div>

</div>
<!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->

</body>
</html>
