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
    <form method="POST" action="./Method/Donationregister.php" enctype="multipart/form-data">
        <label>ชื่อองค์กร</label>
        <input type="text" value=""name="Donation_Name" placeholder="ชื่อองค์กร"><br>
        <label>ชื่อผู้จัดการ/บริหาร</label>
        <input type="text" value=""name="Donation_ManagerName" placeholder="ชื่อผู้จัดการ/บริหาร"><br>
        <label>อีเมลค์องค์กร</label>
        <input type="text" value=""name="Donation_Email" placeholder="อีเมลค์องค์กร"><br>
        <label>เบอร์โทรองค์กร</label>
        <input type="text" value=""name="Donation_Tel" placeholder="เบอร์โทรองค์กร"><br>
        <label>ที่อยู่องค์กร</label>
        <input type="text" value=""name="Donation_Address" placeholder="ที่อยู่องค์กร"><br>
        <label>รายละเอียดขององค์กร</label>
        <input type="text" value=""name="Donation_Detail" placeholder="รายละเอียดขององค์กร"><br>
        <label>ประเภทขององค์กร</label>
        <select name="DonationType_ID">
            <option value="1">วัด</option>
            <option value="2">เพื่อเด็ก</option>
            <option value="3">เพื่อสตรี</option>
            <option value="4">ช่วยเหลือสัตว์</option>
            <option value="5">เพื่อการศึกษา</option>
            <option value="6">เพื่อผู้ด้อยโอกาสและผู้พิการ</option>
        </select><br>
        <input type="submit" name="registerdonation" value="submit">
    </form>
    </div>
    </div>
</body>
</html>