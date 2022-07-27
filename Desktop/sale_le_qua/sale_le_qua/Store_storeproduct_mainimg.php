<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_addimage</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">
</head>

<style>
    img {
        width : 100px;
        height: 100px;
    }
</style>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

<div class='container'>
<div class="container-form">
    <?php
        include './Method/DBconfig.php';
        if(isset($_GET['product_mainimage_ID']))
            {
                $e_id=$_GET['product_mainimage_ID'];
                $sql = "SELECT * FROM `product` where `Product_ID` = '$e_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();
                $e_pro=$row['Product_Mainimage'];
            }
    ?>
    <?php echo"<form method=\"POST\" action=\"./Method/Storeproductupmainimage.php?productaddimage_ID=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Productmainimage</label><br>
        <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $e_pro ).'"/></td>';?> <br>
        <input type="file" name="Product_Mainimage" /><br>
        <input type="submit" name="productaddimage" value="submit">
    </form>
    <button onclick="location.href='./Store_storeproduct.php'">Back</button>
    </div>

</div>

  <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->

    
</body>
</html>