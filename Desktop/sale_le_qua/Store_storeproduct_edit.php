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

    if(isset($_GET['storeproduct_edit_ID']))
            {
                $e_id=$_GET['storeproduct_edit_ID'];
                $sql = "SELECT * FROM `product` where `Product_ID` = '$e_id' ";
                // echo "$sql";
                $query = $conn->query($sql);
                $row = $query->fetch_array();   
            }
    ?>
    
    <?php echo"<form method=\"POST\" action=\"./Method/Storeproductedit.php?producteditid=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>ชื่อสินค้า</label>
        <input type="text" value="<?=$row[1]?>"name="Product_Name" placeholder="ชื่อสินค้า"><br>
        <label>รายละเอียดสินค้า</label>
        <input type="text" value="<?=$row[2]?>"name="Product_Detail" placeholder="รายละเอียดสินค้า"><br>
        <label>ประเภทสินค้า</label>
        <select name="ProductType_ID">
            <option value="1" <?php if ($row[8] == "1") echo "selected"; ?>>อาหาร</option>
            <option value="2" <?php if ($row[8] == "2") echo "selected"; ?>>เครื่องดื่ม</option>
            <option value="3" <?php if ($row[8] == "3") echo "selected"; ?>>ขนม</option>
            <option value="4" <?php if ($row[8] == "4") echo "selected"; ?>>ของใช้</option>
            <option value="5" <?php if ($row[8] == "5") echo "selected"; ?>>เครื่องปรุง</option>
            <option value="6" <?php if ($row[8] == "6") echo "selected"; ?>>อื่นๆ</option>
        </select><br>
        <br>
        <input type="submit" name="productedit" value="submit">
    </form>
    </div>

</div>
</body>
</html>