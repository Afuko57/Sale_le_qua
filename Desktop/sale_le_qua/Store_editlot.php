<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_storeproduct_edit</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

</head>
<body>
      <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

<div class='container'>
<div class="container-form">
    <?php
    include './Method/DBconfig.php';

    if(isset($_GET['editlot']))
            {
                $e_id=$_GET['editlot'];
                $p_id=$_GET['product_id'];
                $sql = "SELECT * FROM `productlot` where `Productlot_ID` = '$e_id' ";
                // echo "$sql";
                $query = $conn->query($sql);
                $row = $query->fetch_array();   
            }
    ?>
    
    <?php echo"<form method=\"POST\" action=\"./Method/Storeeditlot.php?productloteditid=$e_id&product_id=$p_id\" enctype=\"multipart/form-data\">"; ?>
        <label>ราคาขาย</label>
        <input type="text" value="<?=$row[3]?>"name="Productlot_price" placeholder="ชื่อสินค้า"><br>
        <label>ส่วนลด</label>
        <input type="text" value="<?=$row[4]?>"name="Productlot_discount" placeholder="รายละเอียดสินค้า"><br>
        <label>จำนวนสินค้า</label>
        <input type="text" value="<?=$row[5]?>"name="Productlot_amount" placeholder="รายละเอียดสินค้า"><br>
        <input type="submit" name="productlotedit" value="submit">
    </form>
    </div>

</div>
</body>
</html>