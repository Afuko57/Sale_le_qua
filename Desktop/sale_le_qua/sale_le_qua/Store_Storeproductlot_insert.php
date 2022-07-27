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
    <?php
    if (isset($_GET['product_ID'])){
        $product_id=$_GET['product_ID'];
        // echo "product_ID = $product_id";
    }
    ?>

    <form method="POST" action="./Method/Storeproductlotinsert.php?product_id=<?php echo "$product_id";?>" enctype="multipart/form-data">
        <label>ราคาสินค้าเดิม</label>
        <input type="text" value=""name="Productlot_OriginalPrice" placeholder="รายละเอียดสินค้า" required><br>
        <label>ราคาขาย</label>
        <input type="text" value=""name="Productlot_SellPrice" placeholder="ชื่อสินค้า" required><br>
        <label>ส่วนลด</label>
        <input type="text" value=""name="Productlot_Discount" placeholder="รายละเอียดสินค้า" required><br>
        <label>จำนวนสินค้า</label>
        <input type="text" value=""name="Productlot_Amount" placeholder="ชื่อสินค้า" required><br>
        <label>วันผลิต</label>
        <input type="date" value=""name="Productlot_Productdate" placeholder="รายละเอียดสินค้า" required><br>
        <label>วันหมดอายุ</label>
        <input type="date" value=""name="Productlot_Exdate" placeholder="ชื่อสินค้า" required><br>
        <label>ประเภทการหมดอายุ</label>
        <select name="Productlot_Extype" required>
            <option value="BBF">BBF</option>
            <option value="EXP">EXP</option>
        </select><br>
        
        <label>รูปภาพล็อตสินค้า</label><br>
        <input type="file" name="Productlot_Img" required><br><br>
        <input type="checkbox" name="check1" required>ท่านได้อ่านนโยบายของทางเว็บไซต์เรียบร้อยและยอมรับการใช้งาน<br>
        <input type="checkbox" name="check2" required>ขอยินยอมว่าสิ่งท่านกำหนดเป็นจริงทุกประการ<br>
        <input type="submit" name="insertproductlot" value="submit">
    </form>

    
    
    </div>

</div>
</body>
</html>