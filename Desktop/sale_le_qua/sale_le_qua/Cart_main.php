<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />


  <link rel="stylesheet" type="text/css" href="style-home/style.css?v=1">

  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="paybill-cart/cart.css?V=1">
  <link rel="stylesheet" type="text/css" href="paybill-cart/side-menu.css?V=1">
  
  <link rel="stylesheet" type="text/css" href="paybill-cart/foundation-filter.css?V=1">

  <!--------------------Cart---------------------->
  <link rel="stylesheet" type="text/css" href="paybill-cart/style.css?v=1"></head>
</head>
<body>
    <!-- Nav --> <?php require_once("nav_footer_cate/navbar.php"); ?></div>
  
  <div class="container">
   

   <div class="main-number-add">

   <?php 
    if (empty($_SESSION['user_id'])){
      header("location:./User_login.php");
    }

    
    if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'] ;
    $sql = "SELECT * FROM `user` where `User_ID` = '$user_id' "; //Address
        // echo "$sql";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        $useraddress  = $row['User_Address'];
        // echo "$useraddress";
      }
        if(isset($_GET['delete_id'])){
          $did = $_GET['delete_id'];
          $did1 = intval($did);
          // echo "$did1";
          // unset($_SESSION['cart'][$did]);
          array_splice($_SESSION['cart'],$did1,1);
      }    
    ?> 
    <form method="POST" action="./Method/Cartinsertbill.php" enctype="multipart/form-data">
    
    <div class="address-main">
        <div class="address-box">
          <i class="fas fa-map-marker-alt"></i></i> <span
            class="address-txt">ที่อยู่การจัดส่ง</span>&nbsp;&nbsp;&nbsp;&nbsp;

      
      <div class="tab">

          <label class="container-r1">ที่อยู่
              <input type="radio" name="radio" onclick="openCity(event, 'user-address')" id="defaultOpen">
              <span class="checkmark"></span> 
          </label>
        
        <label class="container-r2">บริจาค
          <input type="radio" name="radio" class="tablinks" onclick="openCity(event, 'user-found')" >
            <span class="checkmark"></span>
        </label>

       
   
     </div>

         

          <!--ที่อยู่ซ้าย-ขวา-->
        <div id="user-address" class="tabcontent">
          <div class="show-address">
          <a href="#"><span class="edit-address">แก้ไขที่อยู่</span></a>
          <span class="showaddress-box"><input class="add-input" size="100" type="text" name="Payment_useraddress" value="<?php echo "$useraddress"?>"></span>
          </div>
        </div>

        
        <div  id="user-found" class="tabcontent">
          <div class="show-address">
            
            <!--ฟิลเตอร์-->
            <div class="f-category">
            
              <ul class="flex-cate">
              
                <li class="cate-item"><img src="img/found-img/icon/image 108.png" class="f-icon"><div class="ficon-txt">วัด</div></li>
                <li class="cate-item"><img src="img/found-img/icon/image 114.png" class="f-icon"><div class="ficon-txt">เด็ก</div></li>
                <li class="cate-item"><img src="img/found-img/icon/image 113.png" class="f-icon"><div class="ficon-txt">เพื่อสตริ</div></li>
                <li class="cate-item"><img src="img/found-img/icon/image 111.png" class="f-icon"><div class="ficon-txt">ช่วยเหลือสัตว์</div></li>
                <li class="cate-item"><img src="img/found-img/icon/image 112.png" class="f-icon"><div class="ficon-txt">การศึกษา</div></li>
                <li class="cate-item"><img src="img/found-img/icon/image 115.png" class="f-icon"><div class="ficon-txt">ด้อยโอกาส/พิการ</div></li>
              
              </ul>
            </div>
           <!--ฟิลเตอร์-->
                          <!--dropdown select-->
                    <!--[if !IE]> -->
              <div class="notIE">
                <!-- <![endif]-->
                <span class="fancyArrow"></span>
                <select name="Donation-address">
                <option value="0" selected>เลือกองค์กร/มูลนิธิ</option>
                  <?php
                  $sql_sp = "SELECT * FROM `donation` ";
                  $result = $conn->query($sql_sp);
                  while ($row = $result->fetch_array()){
                    echo "<option value=\"$row[0]\">$row[1]</option>";        
                  }
                  ?>

                  

<!--                   
                  <option value="1">มูลนิธิบ้านนกขมิ้น</option>
                  <option value="2">มูลนิธิวัดสวนแก้ว</option> -->
                </select>
                <!--[if !IE]> -->
              </div>
              <!-- <![endif]-->
               <!--dropdown select-->
               </div>
            </div>


          </div>
        </div>

      <div>

    </div>



    </div>
   <!----------------------product-cart---------------------->
   <?php
        $totalprice=0;
        foreach ($_SESSION['cart'] as $key) {
        // $sql = "SELECT * from product where Product_ID = '$key[0]'";
        $sql = "SELECT product.Product_ID,"
        . " product.Product_Name,"
        . " productlot.Productlot_OriginalPrice,"
        . " productlot.Productlot_SellPrice,"
        . " productlot.Productlot_Discount,"
        . " productlot.Productlot_Amount,"
        . " product.Product_Detail,"
        . " productlot.Productlot_Productdate,"
        . " productlot.Productlot_Exdate,"
        . " productlot.Productlot_Extype,"
        . " product.Product_Mainimage,"
        . " store.Store_Name,"
        . " donationtype.DonationType_Name,"
        . " producttype.ProductType_Name,"
        . " store.Store_Profileimage"
        . " FROM `product`"
        . " JOIN store ON product.Store_ID = store.Store_ID"
        . " JOIN productlot ON product.Product_ID = productlot.Product_ID"
        . " JOIN donationtype ON product.Donation_typeID = donationtype.DonationType_ID"
        . " JOIN producttype ON product.ProductType_ID = producttype.Producttype_ID"
        . " WHERE product.Product_ID ='$key[0]' And productlot.Productlot_ID = '$key[2]'";

        
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        
    echo"<div class=\"product-cart\">";

    echo"<div class=\"cart-container\">";

    echo"<div class=\"cart-item\">";
        


    echo"   <div class=\"product-in-cart\">";
    echo"     <div class=\"product-img-cart\">";
    echo"        <div id=\"ribbon-head1\">";
    echo"          50%";
    echo"        </div>";
    echo"        <div id=\"ribbon-tail1\">";
    echo"          <div id=\"left1\"></div>";
    echo"          <div id=\"right1\"></div>";
    echo"        </div>";
    echo'        <div class=\"img-product-cart\"><img class=\"img-resize-product\ width="100%" height="100%" src="data:image/jpeg;base64,'.base64_encode( $row['10'] ).'"/></div>';
    echo"      </div>";

    echo"      <div class=\"product-cart-detail\">";
    echo"        <span class=\"name-product\">ชื่อสินค้า : $row[1]</span>";
    echo"        <span class=\"discount\"> ส่วนลด $row[4]%</span>";
    echo"        <span class=\"sale-price\">ราคาสินค้า : $row[3] บาท</span>";
    echo"        <span class=\"old-price\">$row[2]</span><br>";

    echo"        <div class=\"detail-box\">";
    echo"          <span class=\"detail-txt\"> รายละเอียดสินค้า : </span>";
    echo"           <span class=\"detail-txt-in\"> $row[6] $key[2]</span>"; //----------------------------------------------เพิ่มล็อต
    echo"        </div>";
    echo"        <span class=\"exp-bbf\">$row[9] : $row[8]</span>";
    // echo"        <input type='number' value='$key[1]' size='3' step='1' min='1' max='$row[5]'>";
                    $keytest = array_search($key[0], array_column($_SESSION['cart'],'0'));
                    $price = $row[3]*$key[1];
    echo "        <div class=\"amount\">$key[1] ชิ้น </div>";        
    echo "         <div class=\"amount-price\">  ราคา ".$price." บาท</div>";
    echo"      <a class=\"delete-but\" href=\"./Cart_main.php?delete_id=$keytest\">Delete</a>";
    echo"      </div>";
    echo"    </div>";

        
    echo"  </div>";
    echo"</div>";
    $totalprice += $row[3]*$key[1];
    }
    echo"<div class=\"combine-price\">";
    echo"  <span class=\"combine-all-txt\">รวมการสั่งซื้อทั้งหมด</spam>";

    echo"    <div class=\"right-combine\"><span> ราคาสินค้ารวมทั้งหมด : $totalprice บาท</span><br>";
    echo"    </div>";
    echo"</div>";

    echo"<div class=\"main-totalend\">";
    echo"  <span class=\"total-end\">ยอดชำระเงินทั้งหมด : $totalprice บาท</span>";

        
    ?>
        
       <input class="submit-cart" type="submit" name="addorder" value="ยืนยันสั่งสินค้า">
       </form>
     </div>



   </div>
 </div>
 <!----------------------product-cart---------------------->



   
    <br>
    <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>
        <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="paybill-cart/select-dropdown.js"></script>
</body>
</html>