<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_storeproduct_addimages</title>
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
        if(isset($_GET['product_image_ID']))
            {
                $e_id=$_GET['product_image_ID'];
                echo "$e_id";
                // $sql = "SELECT * FROM `store` where `Store_ID` = '$e_id' ";
                // $query = $conn->query($sql);
                // $row = $query->fetch_assoc();
                // $e_pro=$row['Store_Profileimage'];
            }
    ?>
    <?php echo"<form method=\"POST\" action=\"./Method/Storeproductaddimages.php?productaddimages_ID=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Productimage</label><br>
        <input type="file" name="product_images" /><br>
        <input type="submit" name="productaddimages" value="submit">
    </form>
    <button onclick="location.href='./Store_storeproduct.php'">Back</button>
    </div>

</div>

  <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->

    
</body>
</html>