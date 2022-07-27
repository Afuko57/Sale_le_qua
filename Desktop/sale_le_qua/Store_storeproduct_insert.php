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
    $Store_id=$_SESSION['store_id'];
    // echo "Store_ID = $Store_id";
    ?>

    <form method="POST" action="./Method/Storeproductinsert.php?storeid=<?php echo "$Store_id";?>" enctype="multipart/form-data">
        <label>ชื่อสินค้า</label>
        <input type="text" value=""name="Product_Name" placeholder="ชื่อสินค้า" required><br>
        <label>รายละเอียดสินค้า</label>
        <input type="text" value=""name="Product_Detail" placeholder="รายละเอียดสินค้า" required><br>
        <label>ประเภทสินค้า</label>
        <select name="Product_Producttype" required>
            <option value="1">อาหาร</option>
            <option value="2">เครื่องดื่ม</option>
            <option value="3">ขนม</option>
            <option value="4">ของใช้</option>
            <option value="5">เครื่องปรุง</option>
            <option value="6">อื่นๆ</option>
        </select><br>
        <label>รูปภาพหลักของสินค้า</label><br>
        <input type="file" name="Product_Mainimage" required><br><br>
        <input type="checkbox" name="check1" required>ท่านได้อ่านนโยบายของทางเว็บไซต์เรียบร้อยและยอมรับการใช้งาน<br>
        <input type="checkbox" name="check2" required>ขอยินยอมว่าสิ่งท่านกำหนดเป็นจริงทุกประการ<br>
        <input type="submit" name="insertproduct" value="submit">
    </form>

    
    <!-- <form method="POST" action="./Method/Storeproductinsert.php?storeid=<?$Store_id?>" enctype="multipart/form-data">
        <label>1.Product_Name</label>
        <input type="text" value=""name="Product_Name" placeholder="Product_Name"><br>
        <label>2.Product_OriginalPrice</label>
        <input type="number" value=""name="Product_OriginalPrice" placeholder="Product_OriginalPrice"><br>
        <label>3.Product_SellPrice</label>
        <input type="number" value=""name="Product_SellPrice" placeholder="Product_SellPrice"><br>
        <label>4.Product_Discount</label>
        <input type="number" value=""name="Product_Discount" placeholder="Product_Discount"><br>
        <label>5.Product_Amount</label>
        <input type="number" value=""name="Product_Amount" placeholder="Product_Amount"><br>
        <label>6.Product_Detail</label>
        <input type="text" value=""name="Product_Detail" placeholder="Product_Detail"><br>
        <label>7.Product_Productdate</label>
        <input type="date" value=""name="Product_Productdate" placeholder="Product_Productdate"><br>
        <label>8.Product_Exdate</label>
        <input type="date" value=""name="Product_Exdate" placeholder="Product_Exdate"><br>
        <label>9.Product_Extype</label>
        <select name="Product_Extype">
            <option value="BBF">BBF</option>
            <option value="EXP">EXP</option>
        </select><br>
        <label>10.Product_Producttype</label>
        <select name="Product_Producttype">
            <option value="1">อาหาร</option>
            <option value="2">เครื่องดื่ม</option>
            <option value="3">ขนม</option>
            <option value="4">ของใช้</option>
            <option value="5">เครื่องปรุง</option>
            <option value="6">อื่นๆ</option>
        </select><br>
        <label>11.Product_Mainimage</label>
        <input type="file" name="Product_Mainimage" /><br>
        <input type="checkbox" name="check1">ท่านได้อ่านนโยบายของทางเว็บไซต์เรียบร้อยและยอมรับการใช้งาน<br>
        <input type="checkbox" name="check2">ขอยินยอมว่าสิ่งท่านกำหนดเป็นจริงทุกประการ<br>
        <input type="submit" name="insertproduct" value="submit">
    </form> -->
    </div>

</div>
</body>
</html>