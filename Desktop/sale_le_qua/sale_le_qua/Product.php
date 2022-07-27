<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">


  <link rel="stylesheet" type="text/css" href="style-product/banner-p.css?V=1">
  <link rel="stylesheet" type="text/css" href="style-product/filter.css?V=1">
  <link rel="stylesheet" type="text/css" href="style-product/show-p.css?V=1">



</head>

<body>
<!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

  <div class='container'>
<!--BANNER--><?php require_once("style-product/banner.php"); ?><!--BANNER-->

   
       <!--CATEGORY--><div><?php require_once("nav_footer_cate/category.php"); ?></div><!--CATEGORY-->

    <!----------------------FILTER SATRT---------------------->
    <div class="filter-main">
    <?php
      $keyword = "";
      $keywordtype ="";
      if (isset($_POST['keyword']))
      $keyword = trim($_POST['keyword']);
      if (isset($_GET['keywordtype']))
      $keywordtype = trim($_GET['keywordtype']);


      $orderby = "ORDER BY productlot.Productlot_Exdate ;";
      if (isset($_GET['orderby'])){
        if ($_GET['orderby']==1){
          $orderby = "ORDER BY productlot.Productlot_Exdate ;";
        }
        if ($_GET['orderby']==2){
          $orderby = "ORDER BY productlot.Productlot_SellPrice ;";
        }
        if ($_GET['orderby']==3){
          $orderby = "ORDER BY productlot.Productlot_SellPrice DESC ;";
        }
      }
     
      


      ?>

      
      <div class="PD-button">
        <span class="sort">เรียงโดย</span>
        <a href="./Product.php?orderby=1" class="sort-button" >วันหมดอายุ</a>
        <a href="./Product.php?orderby=2" class="sort-button" >ราคาน้อยไปมาก</a>
        <a href="./Product.php?orderby=3" class="sort-button" >ราคามากไปน้อย</a>
        <!-- <input type="button" class="sort-button" value="สินค้าขายดี">
        <input type="button" class="sort-button" value="ราคาน้อยไปมาก">
        <input type="button" class="sort-button" value="ราคามากไปน้อย"> -->
      </div>
      
     

      

      <div class="fromPD-main">
        <form method="POST" name="searchPD">
          <input type="text" size="20" value="" id="form-search" name="keyword">
          <input type="submit" class="searchPD-button" value="ค้นหา">
        </form>
      </div>

    </div>
    <!----------------------FILTER END---------------------->



    <!----------------------PRODUCT START---------------------->
    <div class="show-product">
      <div class="pdshow-container">

      
      <?php
        $sqlp = "SELECT product.Product_ID,"
        ." productlot.Productlot_Discount," 
        ." product.Product_Mainimage," 
        ." product.Product_Name,"
        ." productlot.Productlot_Extype,"
        ." productlot.Productlot_Exdate," 
        ." product.Product_Detail,"
        ." productlot.Productlot_SellPrice,"
        ." productlot.Productlot_OriginalPrice,"
        ." store.Store_Name,"
        ." productlot.Productlot_Amount," 
        ." productlot.Productlot_ID" 
        ." FROM product" 
        ." JOIN store ON product.Store_ID = store.Store_ID"
        ." RIGHT JOIN productlot ON product.Product_ID = productlot.Product_ID"
        ." Where product.Product_Status = \"normal\" and productlot.Productlot_Amount != 0 and  product.Product_Name like '%$keyword%' and product.ProductType_ID like '%$keywordtype%' AND ((Productlot_Exdate-CURRENT_DATE)>7)"  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
        ." $orderby";
        // SELECT product.Product_ID, productlot.Productlot_ID FROM product JOIN productlot on product.Product_ID = productlot.Product_ID GROUP by product.Product_ID;
        // echo "$sqlp";
    
        $result = $conn->query($sqlp);
        while ($row = $result->fetch_array()) {
        echo' <div class="item-pd">';
        echo'  <div id="ribbon-head">';
        echo'    '.$row[1].'%';
        echo'  </div>';
        echo'  <div id="ribbon-tail">';
        echo'    <div id="left"></div>';
        echo'    <div id="right"></div>';
        echo'  </div>';
        echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[11]\">";
        // echo'    <div class="img-pd"><div class="img-position"><img class=\'img-resize1\' src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/></div></a>';
        echo'    <div class=\'img-pd\'>';
        echo'      <div class="img-position"><img class="img-storeresize" src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/></div></div><br>';
        echo'  </a>';
           
        echo'  <div class="product-box">';
        echo'   <span class="name">ชื่อสินค้า : <a href="Product-detail.php"></a>'.$row[3].'</span><br>';
        echo '   <span class="exp-bbf">วันหมดอายุ : <span style="color: #F06848">'.$row[4].' '.$row[5].'</span></span><br>';
        echo'    <span class="pd-detail">รายละเอียดสินค้า :'.$row[6].'</span><br>';
        echo'    <span class="price">ราคา <span class="price-db">'.$row[7].'</span> บาท</span>';
        // echo'      class="cart-pd"><br>';
        echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[11]\"><img src=\"img/shop-pd.png\" class='cart-pd'></a><br>";
        echo'    <span class="store">ชื่อร้านค้า'.$row[9].'</span>';
        echo'  </div>';
        echo'</div>';
      }?>
    
       
    <!---------------------PRODUCT END---------------------->
    <!----------------------container END---------------------->
  </div>

  <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->




</body>

</html>