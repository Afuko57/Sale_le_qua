<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product-Detail</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />

  <link rel="stylesheet" type="text/css" href="style-home/style.css?v=1">
  <!--------------------NAV---------------------->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="style-home/nav.css?v=1">

  <!--------------------Detail---------------------->
  <link rel="stylesheet" type="text/css" href="style-Pdetail/detail.css?v=1">
  <link rel="stylesheet" type="text/css" href="style-Pdetail/style.css?v=1">
  <!--------------------Detail---------------------->
  <link rel="stylesheet" type="text/css" href="style-Pdetail/total-box.css?v=1">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>

  <!--------------------from store---------------------->
  <link rel="stylesheet" type="text/css" href="style-Pdetail/fromstore.css?v=1">
  <!--------------------Footer---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/footer.css?v=1">
  <!--------------------Review--------------------->
  <link rel="stylesheet" type="text/css" href="style-Pdetail/comment.css?v=1">
   <!--------------------LIKE--------------------->
   <link rel="stylesheet" type="text/css" href="style-Pdetail/icon.css?v=1">

</head>

<body>
    <!--nav--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--nav-->
  

    <div class="container">
   
  <!--------------------Detail main start---------------------->
  <div class="Detail-main">
    <div class="ct-container">

      <div class="item">
        <!--<button onclick="goBack()" class="back"> <ย้อนกลับ </a> </button>
          <script>
            function goBack() {
              window.history.back();
            }
          </script>-->

        <!--<div class="img-pddetail">
            <div id="ribbon-head">
              50%
            </div>
            <div id="ribbon-tail">
              <div id="left"></div>
              <div id="right"></div>
            </div>
          </div>
          <div class="imgs-detail2">
            <div class="imgs-item"></div>
            <div class="imgs-item"></div>
          </div>-->
        <?php
        if (isset($_GET['productid'])) {
          $Product_ID = $_GET['productid'];
          $Product_Lot = $_GET['productlot'];
          // echo "$Product_ID";
          //$sql ="SELECT * FROM `product` where Product_ID = '$Product_ID';";
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
            . " store.Store_Profileimage,"
            . " productlot.Productlot_Img"
            . " FROM `product`"
            . " JOIN store ON product.Store_ID = store.Store_ID"
            . " JOIN productlot ON product.Product_ID = productlot.Product_ID"
            . " JOIN donationtype ON product.Donation_typeID = donationtype.DonationType_ID"
            . " JOIN producttype ON product.ProductType_ID = producttype.Producttype_ID"
            . " WHERE product.Product_ID ='$Product_ID' And productlot.Productlot_ID = '$Product_Lot'"
            . " GROUP BY product.Product_ID;";


          // echo"$sql";
          $result = $conn->query($sql);
          $row = $result->fetch_array();
          $row0 = $row[0];
          $row1 = $row[1];
          $row2 = $row[2];
          $row3 = $row[3];
          $row4 = $row[4];
          $row5 = $row[5];
          $row6 = $row[6];
          $row7 = $row[7];
          $row8 = $row[8];
          $row9 = $row[9];
          $row10 = $row[10];
          $row11 = $row[11];
          $row12 = $row[12];
          $row13 = $row[13];
          $row14 = $row[14];
          $row15 = $row[15];
        }
        ?>

        <div class="column">
          <div id="ribbon-head">
            <?php echo "$row4%"; ?>
          </div>
          <div id="ribbon-tail">
            <div id="left"></div>
            <div id="right"></div>
          </div>
          <div class="fixed-img"><?php echo '<img id=featured src="data:image/jpeg;base64,' . base64_encode($row10) . '"/>'; ?></div>
        </div>
        <div id="slide-wrapper">
          <img id="slideLeft" class="arrow" src="style-Pdetail/arrow-left.png">

          <div id="slider">
            <?php echo '<img class="thumbnail active" src="data:image/jpeg;base64,' . base64_encode($row10) . '"/>'; ?>
            <?php echo '<img class="thumbnail active" src="data:image/jpeg;base64,' . base64_encode($row15) . '"/>'; ?>
            <!-- <img class="thumbnail active" src="style-Pdetail/nn.png"> -->

            <?php //-------------------------------------------------------------------------------------------------------------------รูปอื่นๆ
            $sql_im = "SELECT * FROM `images` WHERE Product_ID = '$Product_ID' ";
            $result = $conn->query($sql_im);
            while ($row_im = $result->fetch_array()) {
              echo '<img class="thumbnail" src="data:image/jpeg;base64,'.base64_encode( $row_im['1'] ).'"/>';
            }
            ?>
            <!-- <img class="thumbnail" src="style-Pdetail/exp1.jpg">
            <img class="thumbnail" src="style-Pdetail/exp2.jpg">
            <img class="thumbnail" src="style-Pdetail/exp2.jpg"> -->

          </div>

          <img id="slideRight" class="arrow" src="style-Pdetail/arrow-right.png">
        </div>


        <div class="store-name">
          <div class="store-img">
          <?php 
          if ($row14!=null){
            echo '<img class="img-storeresize" src="data:image/jpeg;base64,' . base64_encode($row14) . '"/>'; 
          }else{
            echo '<img class="img-storeresize" src="./img/logo.png">'; 
          }
          
          ?>
            <!-- <img src="jh.jpg" class="img-storeresize"> -->
          </div>
          <span class="store-nametxt">ร้านค้า <?php echo "$row11"; ?></span><br>
          <span class="store-slogan">ส่งไวของดีราคาถูก</span><br>
          <span class="foundation-pick">สนับสนุนองค์กร<?php echo "$row12"; ?></span><br>
        </div>
      </div>



      <div class="item">
        <span class="name-product">ชื่อสินค้า : <span class="name-productIN"><?php echo "$row1"; ?></span></span><br>
        <span class="sale-price">ราคาสินค้า <span class="sale-priceIN"><?php echo "$row3"; ?></span> บาท</span><br>
        <span class="old-price"><?php echo "$row2"; ?></span><br>
        <span class="discount">ลด <span class="discountIN"><?php echo "$row4%"; ?></span> </span><br>
        <span class="exp-bbf">วันหมดอายุ : <span class="date"><span style="color: #F06848"><?php echo "$row9"; ?> <?php echo "$row8"; ?></span></span> </span><br>
      
        <!--like -->
        <span class="like">Favorite :
        <?php 
        if (isset($_SESSION['user_id'])){
          $userid = $_SESSION['user_id'];
          $pid = $_GET['productid'];
          $lot = $_GET['productlot'];
          $sqllk = "SELECT * FROM `liked` WHERE `User_ID`= '$userid' AND `Product_ID` = '$pid'  AND `Productlot_ID` ='$lot'";
        //  echo "$sqllk"; 
         $result = $conn->query($sqllk);
         $row = $result->fetch_array() ;
          if ($row==null){
            echo "<a class=\"heart-a\" href=\"./Method/Like.php?productid=$row0&&productlot=$Product_Lot&&like=1\"><i class='far fa-heart' style='font-size:24px;color:gray'></i></i></i><a>"; 
           }
           else{
            echo "<a class=\"heart-a\" href=\"./Method/Likedel.php?productid=$row0&&productlot=$Product_Lot&&like=1\"><i class='fa fa-heart' aria-hidden='true'></i><a> ";
           }
        }else{
            echo "<a class=\"heart-a\" href=\"./User_login.php\"><i class='far fa-heart' style='font-size:24px;color:gray'></i></i></i><a>"; 
        }

         
         
         
        ?>
        </span>
        <!--like end -->
        
        <div class="detail-box">
          <span class="detail-txt">รายละเอียด</span><br>
          <span class="detail-txt2"><?php echo "$row6"; ?></span>
        </div>
        <!-- <div class="shipping-box">
          <span class="how-shipping">การจัดส่ง : <span class="shipping-IN">จัดส่งโดยไปรษณีย์ไทย</span></span><br>
          <span class="how-shipping">ค่าจัดส่ง : <span class="shipping-IN"> ค่าจัดส่งเมื่อขั้นต่ำ 50 บาท</span></span>
        </div> -->
        <?php echo "<form Method=\"POST\" action=\"./Product_detail.php?productid=$row0&productlot=$Product_Lot&addCart=1\"></td>"; ?>
     
       
        <div class="total-box">
          <div class="number-input">
            <span class="total-p1">จำนวน</span>
            <input class="Quantity" min="0" name="Quantity" value="1" type="number" max="<?php echo "$row5"; ?>">
            
            <span class="total-p2"><?php echo "$row5"; ?> ชิ้น</span><br>
            <input type="submit" class="button-submit" name="addcart" value="ใส่ตะกร้า">
            </form>
          </div>
        </div>
      </div>
      <hr class="line1">
      <!-- // echo "<form Method=\"POST\" action=\"./Product_detail.php?productid=$row0&product_id=$row0&addCart=1\"></td>";
        // echo "<tr><td></td><td><input type='number' value='1' size='3' step='1' min='1' max='$row[5]' name='Quantity'></td>";
        // echo "<tr><td></td><td><input type=\"submit\" name=\"addcart\"></td>";
        // echo "</form>";  -->
    </div>

  </div>
  
  <!--Review--->
  <div class="review-cover">
  <h1 class="score">คะแนนของสินค้า</h1>
     <div class="flex-container-pd">
      
   
  <?php //--------------------------------------------------------------------------------------------------------------------------------------------------------Review
   $sql_review = "SELECT review.Review_Date,"
   ." review.Review_score,"
   ." review.Review_detail,"
   ." user.User_Username "
   ." FROM review "
   ." JOIN user on review.User_ID = user.User_ID "
   ." where Product_id='$Product_ID' AND Productlot_ID ='$Product_Lot'";
  //  echo "$sql_review";
   $result_review = $conn->query($sql_review);
   while ($row_review = $result_review->fetch_array()) {
      echo '<div class="child-pd">';
      if($row_review[1]==1){
        echo "<i class=\"fas fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><br>";
      }else if($row_review[1]==2){
        echo "<i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><br>";
      }else if($row_review[1]==3){
        echo "<i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"far fa-star\"></i><i class=\"far fa-star\"></i><br>";
      }else if($row_review[1]==4){
        echo "<i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"far fa-star\"></i><br>";
      }else{
        echo "<i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><br>";
      }
      echo "$row_review[3]<br>";
      echo "  <span class=\"date-review\"> DMY : $row_review[0]</span><br>";
      echo "$row_review[2]<br>";
      echo '</div>';
    }
  
  ?>
    
      
      
    </div>
</div>


  <!--Review--->
  <script type="text/javascript">
    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for (var i = 0; i < thumbnails.length; i++) {

      thumbnails[i].addEventListener('mouseover', function() {
        console.log(activeImages)

        if (activeImages.length > 0) {
          activeImages[0].classList.remove('active')
        }


        this.classList.add('active')
        document.getElementById('featured').src = this.src
      })
    }


    let buttonRight = document.getElementById('slideRight');
    let buttonLeft = document.getElementById('slideLeft');

    buttonLeft.addEventListener('click', function() {
      document.getElementById('slider').scrollLeft -= 180
    })

    buttonRight.addEventListener('click', function() {
      document.getElementById('slider').scrollLeft += 180
    })
  </script>
  <!--------------------Detail main end---------------------->
  <!--------------------From store Start---------------------->
  <div class="from-store-main">
    <span class="from-store-txt">สินค้าอื่นๆ</span>

    <div class="schedule-container1">
      <?php
      $sqlt = "SELECT product.Product_ID,"
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
        . " store.Store_Profileimage,"
        . " productlot.Productlot_ID"
        . " FROM `product`"
        . " JOIN store ON product.Store_ID = store.Store_ID"
        . " RIGHT JOIN productlot ON product.Product_ID = productlot.Product_ID"
        . " JOIN donationtype ON product.Donation_typeID = donationtype.DonationType_ID"
        . " JOIN producttype ON product.ProductType_ID = producttype.Producttype_ID"
        . " WHERE product.Product_ID !='$Product_ID' AND product.Product_Status = \"normal\""
        . " ORDER BY RAND () ;"; 
      // echo $sqlt;
      
      $result = $conn->query($sqlt);
      while ($row = $result->fetch_array()) {
        echo "<div class=\"column1\"> ";
        echo "<div id=\"column-promotion\">";
        echo "<div id=\"ribbon-head1\">";
        echo "$row[5]%";
        echo "</div>";
        echo "<div id=\"ribbon-tail1\">";
        echo "<div id=\"left1\"></div>";
        echo "<div id=\"right1\"></div>";
        echo "</div>";
        echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[15]\">";
        echo '<div class=\'img-pd1\'><img class="img-resize1" src="data:image/jpeg;base64,' . base64_encode($row[10]) . '"/><br></a></div>';
        echo "<div class=\"product-box1\">";
        echo "<span class=\"name1\">ชื่อสินค้า :$row[1]</span><br>";
        $exp =  $row[9]." ".$row[8] ;
        echo "<span class=\"exp-bbf1\">วันหมดอายุ :  <span style=\"color: #F06848\">$exp</span></span><br>";
        echo "<div class=\"pd-detail1\">รายละเอียดสินค้า :$row[6]</div><br>";
        echo "<span class=\"price-is1\">ราคา <span class=\"price-db1\">$row[3]</span> บาท</span> <span class=\"original-price1\">$row[2]</span><br>";
        echo "<span class=\"store1\">ชื่อร้านค้า $row[11]</span>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
      ?>
   



      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
      <script src="style-Pdetail/script.js"></script>
    </div>
   
    <!--------------------From store end---------------------->
    <!--------------------From store Start ตรง tag span เปลี่ยนคลาสเพราะขนาดต่างจากด้านบน---------------------->
    <div class="ot-store-main">
      <span class="ot-store-txt">สินค้าที่คล้ายกัน</span>

      <div class="store-container">
        <?php
        $sqlc = "SELECT product.Product_ID,"
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
        . " store.Store_Profileimage,"
        . " productlot.Productlot_ID"
        . " FROM `product`"
        . " JOIN store ON product.Store_ID = store.Store_ID"
        . " RIGHT JOIN productlot ON product.Product_ID = productlot.Product_ID"
        . " JOIN donationtype ON product.Donation_typeID = donationtype.DonationType_ID"
        . " JOIN producttype ON product.ProductType_ID = producttype.Producttype_ID"
        . " WHERE product.Product_ID !='$Product_ID' AND product.Product_Status = \"normal\""
        . " GROUP BY product.Product_ID" 
        . " ORDER BY RAND () limit 5 ;"; 
        // echo "$sqlc";
        $result = $conn->query($sqlc);
        while ($row = $result->fetch_array()) {
          echo "<div class=\"store-item \">";
          echo "<div id=\"ribbon-head2\">";
          echo "  $row[4]%";
          echo "</div>";
          echo "<div id=\"ribbon-tail2\">";
          echo "  <div id=\"left2\"></div>";
          echo "  <div id=\"right2\"></div>";
          echo "</div>";
          echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[15]\">";
          echo '<div class=\"ot-img\"><img class="img-otherresize" src="data:image/jpeg;base64,' . base64_encode($row[10]) . '"/><br></a></div>';
          // echo "<div class=\"ot-img\"><img src=\"jh.jpg\" class=\"img-otherresize\"></div>";
          echo "<span class=\"name2\">ชื่อสินค้า :<span class=\"nameIN2\">$row[1]</span></span><br>";
          $exp1 = $row[8] . $row[9];
          echo "<span class=\"exp-bbf2\">วันหมดอายุ : <span style=\"color: #F06848; font-size:12px\">$exp</span></span><br>";
          echo "<span class=\"detail-txt3\">รายละเอียด :<span class=\"detail-txt4\">$row[6]</span></span><br>";
          echo "<span class=\"price2\">ราคา<span class=\"priceIN\">$row[3]</span>บาท</span>";
          echo "<span class=\"discount2\">$row[2]</span><br>";
          echo "<span class=\"store-nametxt2\">$row[11]</span>";
          echo "</div>";
        }
       
        ?>
      </div>
    </div>
    <a href="#" class="All-pro">ดูทั้งหมด >></a>
  </div>
  <!--------------------From store Start---------------------->
 
  <!----------------------container END---------------------->
  </div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br>










      <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->


</body>

</html>