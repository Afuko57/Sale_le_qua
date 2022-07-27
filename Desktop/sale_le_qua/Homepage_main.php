<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sale le qua</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />



  <link rel="stylesheet" type="text/css" href="style-home/style.css?v=1">

 
  <!--------------------SLIDE---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/banner.css?v=1">


  <!--------------------PROMOTION SLIDE---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/proslide.css?v=1">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
 
  <!--------------------REC---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/recommend.css?v=<?php echo time(); ?>">

  <link rel='stylesheet' href="slide-rec/slide-product.css?v=1">
  <link rel="stylesheet" href="slide-rec/style.css">

  <!--------------------STEP---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/step.css?v=1">

  <!--------------------STORY---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/story.css?v=1">

  <!--------------------GIVE---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/give.css?v=1">

  <!--------------------FOUNDATION---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/foundation.css?v=1">


</head>

<body>
   <!--NAV--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--NAV-->


  <div class='container'>

    <!--------------------BANNER START---------------------->
    <div class="slideshow-container">


      <div class="mySlides fade">

      <a href="Product.php"><img src="img/banner3.png" style="width:100%"></a>


      </div>

      <div class="mySlides fade">

        <a href="Foundation.php"><img src="img/foundation.png" style="width:100%"></a>

      </div>

   

      <div class="from-main">
        <form action="Product.php" method="POST" name="search">
          <input type="text" size="20" id="form-search" name="keyword">
          <input type="submit" class="search-button" value="ค้นหา">
        </form>
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>


    <div class="dot-main" style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
     
   
    </div>
    <script src="js/script.js"></script>

    <!----------------------BANNER END---------------------->

    <!--CATEGORY--><div><?php require_once("nav_footer_cate/category.php"); ?></div><!--CATEGORY-->

   

     <!----------------------PROMOTION SLIDE START---------------------->
    <div class="proslide-main">
      <p1 class="pro-text">โปรโมชั่น</p1>
      <a href="#" class="proAll-button">ดูทั้งหมด</a>

      <div class="multiPro-main">
         
        <div class="schedule-container1">
        
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
        ." productlot.Productlot_ID"
        ." FROM `product`" 
        ." JOIN store ON product.Store_ID = store.Store_ID"
        ." RIGHT JOIN productlot ON product.Product_ID = productlot.Product_ID"
        ." Where product.Product_Status = \"normal\" and productlot.Productlot_Discount >= 50 and productlot.Productlot_Amount >0 or productlot.Productlot_Amount !=null AND ((Productlot_Exdate-CURRENT_DATE)>7)"  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
        ." GROUP BY product.Product_ID"
        ." ORDER BY RAND() Limit 6;";

        $result = $conn->query($sqlp);
        while ($row = $result->fetch_array()) {

          echo '<div class="column1">';
          echo '  <div id="column-promotion">';
          echo '   <div id="ribbon-head1">';
          echo "$row[1]%";
          echo '  </div>';
          echo '  <div id="ribbon-tail1">';
          echo '    <div id="left1"></div>';
          echo '    <div id="right1"></div>';
          echo '  </div>';
          echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[10]\">";
          echo '    <div class="img-pd1"> <img class=\'img-resize1\' src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/><br></a></div>';
  
          echo '    <div class="product-box1">';
          echo '     <span class="name1">ชื่อสินค้า : '.$row[3].'</span><br>';
          // echo "     <span class='name1'>$row[3]</span><br>";
          echo '      <span class="exp-bbf1">วันหมดอายุ : <span style="color: #F06848">'.$row[4].' '.$row[5].'</span></span><br>';
          echo '     <div class="pd-detail1">รายละเอียดสินค้า :'.$row[6].'</div><br>';
          echo "     <span class=\"price-is1\">ราคา<span class=\"price-db1\">$row[7]</span>บาท</span> ";
          echo "     <span class=\"original-price1\">$row[8]</span> <a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[10]\"><img src=\"img/shop-pd.png\" class=\"cart-pd1\"></a><br>";
          echo '      <span class="store1">ชื่อร้านค้า '.$row[9].'</span>';
          echo '    </div>';
          echo '</div>';
          echo '</div>';
        }
      ?>
</div>
        
         
        </div>
        
      </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
      <script  src="pro-slide/script.js"></script>
    </div>

    <!----------------------PROMOTION SLIDE END---------------------->
    <!----------------------REC START---------------------->
    <div class="recommend-manin">

      <p1 class="rec-text">สินค้าแนะนำ</p1>
      <a href="./Product.php" class="rec-button">ดูทั้งหมด</a>

       <!--Slide  reccomend -->

       <div class="row carousel">
    <?php
    $sql = "SELECT product.Product_ID,"
    ." productlot.Productlot_Discount," 
    ." product.Product_Mainimage," 
    ." product.Product_Name,"
    ." productlot.Productlot_Extype,"
    ." productlot.Productlot_Exdate," 
    ." product.Product_Detail,"
    ." productlot.Productlot_SellPrice,"
    ." productlot.Productlot_OriginalPrice,"
    ." store.Store_Name," 
    ." productlot.Productlot_ID"
    ." FROM `product`" 
    ." JOIN store ON product.Store_ID = store.Store_ID"
    ." RIGHT JOIN productlot ON product.Product_ID = productlot.Product_ID"
    ." Where product.Product_Status = \"normal\" and productlot.Productlot_Amount >0 or productlot.Productlot_Amount !=null AND ((Productlot_Exdate-CURRENT_DATE)>7)"  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
    ." GROUP BY product.Product_ID"
    ." ORDER BY RAND() Limit 12;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {
        echo "";
        echo "<div class='card'>";
        echo "<div class='card-content'>";
        echo "<div id='ribbon-head'>";
        echo "$row[1]%";
        echo "</div>";
        echo "<div id=\"ribbon-tail\">";
        echo "<div id=\"left\"></div>";
        echo "<div id=\"right\"></div>";
        echo "</div>";
        echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[10]\">";
        echo '<div class="img-pd"><img class=\'img-resize\' src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/>';
        echo "<br></a></div>";
        echo "<div class=\"product-box\">";
        echo "<span class=\"name\">ชื่อสินค้า : ".$row[3]."</span><br>";
        echo '<span class="exp-bbf">วันหมดอายุ : <span style="color: #F06848">'.$row[4].' '.$row[5].'</span></span><br>';
        echo "<span class=\"pd-detail\">รายละเอียดสินค้า ".$row[6]."</span><br>";
        echo "<span class=\"price-is\">ราคา <span class=\"price-db\">".$row[7]."</span> บาท</span> <span class=\"original-price\">".$row[8]."</span>"; 
        echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[10]\"><img src=\"img/shop-pd.png\" class='cart-pd'></a><br>";
        // echo "<a href=\"./Homepage_main.php?product_id=$row[0]&addCart=1\"><img src=\"img/shop-pd.png\" class='cart-pd'></a><br>";
        echo "<span class=\"store\">ชื่อร้านค้า ".$row[9]."</span>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js'></script>
      <script src="slide-rec/script.js"></script>
      <!--Slide  reccomend -->

    </div>

      </div>
    </div>
    <!----------------------REC END---------------------->

    <!----------------------STEP START---------------------->
  <div class="step-main">
    <p1 class="step-text">5 ขั้นตอนการซื้อ</p1>

    <div class="st-container">

      <div class="item-st">
        <img src="img/st1.png" class="st-img"><br>
        <p class="step-text2">เลือกสินค้า</p>
      </div>

      <div class="item-st">
        <img src="img/st2.png" class="st-img"><br>
        <p class="step-text2">ยืนยันที่อยู่การจัดส่ง</p>
      </div>

      <div class="item-st">
        <img src="img/st3.png" class="st-img"><br>
        <p class="step-text2">ชำระเงิน</p>
      </div>

      <div class="item-st">
        <img src="img/st4.png" class="st-img"><br>
        <p class="step-text2">ติดตามสถานะ</p>
      </div>

      <div class="item-st">
        <img src="img/st5.png" class="st-img"><br>
        <p class="step-text2">รับสินค้า</p>
      </div>


    </div>

  </div>
  <!----------------------STEP END---------------------->


  <!----------------------STORY STARt---------------------->
  <div class="story-main">
    <p class="story-a">ช่วยเหลือสังคมอย่างไรได้บ้าง</p>
    <p class="story-b">ซื้อสินค้ากับเรารายเพื่อช่วยเหลือองค์กรการกุศล รายได้ส่วนหนึ่งมอบให้องค์กรมูลนิธิ<br>
      ในวิกฤต โควิด-19
      <br>โลกทั้งใบแทบจะหยุดหมุนแต่องค์กรเหล่านี้ยังคงต้องดำเนินภารกิจที่ยิ่งใหญ่เพราะชีวิตไม่อาจหยุดหมุนได้
    </p>


    <div class="a-container">
      <div class="a-item"> <img src="img/1buyer.png" class="a-img">
        <p class="story-c">ส่วนแบ่งการซื้อสินค้า</p>
      </div>
      <div class="a-item"> <img src="img/2buyer.png" class="a-img">
        <p class="story-d">ซื้อสินค้าบริจาค</p>
      </div>
    </div>

  </div>
  <!----------------------STORY END---------------------->

 <!----------------------GIVE START---------------------->

 <div class="give-main">
    <p class="give-a">ผลลัพธ์จากการแบ่งปัน </p>
    <p class="give-b">ณ ไตรมาสที่ 4 ของปี 2564 </p>

 
  <section class="cnt">
    <div class="gv-container">

    
      <div class="item-gv"><img src="img/hand1.png" class="g1-img">
        <p class="g1-txt">รายได้ทั้งหมดที่ช่วยเหลือสังคม </p>
        <?php
        
        $sql_sp = "SELECT
                  SUM(
                      CASE WHEN(
                          orderdetail.Product_Price / orderdetail.Product_Quantity
                      ) > 100 THEN(
                          orderdetail.Product_Price * 0.1
                      ) ELSE(
                          orderdetail.Product_Quantity * 10
                      )
                  END
              ) AS totaldonate
              FROM orderdetail
              LEFT JOIN product ON orderdetail.Product_ID = product.Product_ID
              JOIN store ON product.Store_ID = store.Store_ID
              JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID
              WHERE orderdetail.OrderDetail_Status IN('finish', 'complete')AND YEAR(
                    orderdetail.OrderDetail_Updatetime
                ) = '2021' AND MONTH(
                    orderdetail.OrderDetail_Updatetime
                ) BETWEEN '10' And '12';";
              
              $result = $conn->query($sql_sp);
              $rowtotaldonate = $result->fetch_array();
              
              echo"<p class=\"g-bath\">$rowtotaldonate[0] บาท</p>";
              echo "</div>";
        ?>  
      

      <div id="div1" class="targetDiv">
      <div class="item-gv"><img src="img/hands2.png" class="g1-img">
        <p class="g2-txt">องค์กรการกุศลที่รับการบริจาค</p>

        <?php $sql_sp = "SELECT COUNT(`Donation_Name`) FROM `donation`;";
              $result = $conn->query($sql_sp);
              $rowtotaldonation = $result->fetch_array();
              
              echo"<p class=\"g-bath\">$rowtotaldonation[0] องค์กร</p>";
                 
        ?>  
      </div>
      </div>


       </div>
  </section>
<!-------toggle---------> 
<div class="covermenu-give">
    <div class="menu">
      <a id="showall" href="./Foundation.php">องค์กรการกุศลทั้งหมด</a>
      <a class="showSingle" target="1" href="./Foundation.php?keywordtype=1">วัด</a>
      <a class="showSingle" target="2" href="./Foundation.php?keywordtype=2">มูลนิธิเด็ก</a>
      <a class="showSingle" target="3" href="./Foundation.php?keywordtype=3">มูลนิธิเพื่อสตริ</a>
      <a class="showSingle" target="4" href="./Foundation.php?keywordtype=4">มูลนิธิช่วยเหลือสัตว์</a>
      <a class="showSingle" target="5" href="./Foundation.php?keywordtype=5">มูลนิธิเพื่อการศึกษา</a>
      <a class="showSingle" target="6" href="./Foundation.php?keywordtype=6">มูลนิธิเพื่อคนพิการและด้อยโอกาส</a>
    </div>
  </div> 



  </div>
  <script src="style-home/give-toggle.js"></script>
  <!----------------------GIVE END---------------------->

  <!----------------------FOUNDATION START---------------------->
  <div class="foundation-main">
    <div class="fd-container">  
    <?php
    $sqlp = "SELECT
    donation.Donation_Name,
    left(donation.Donation_Detail, 60),
    donation.Donation_ProfileImage,
    donationtype.DonationType_Name,
    donation.Donation_ID
FROM
    donation
    JOIN donationtype on donation.DonationType_ID = donationtype.DonationType_ID limit 4;";
    // echo $sqlp;
        $result = $conn->query($sqlp);
        while ($row = $result->fetch_array()) {
          echo '<div class="item-fd"> <img src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'" class="fa-img">';
          echo "<p class=\"fd-txt\">$row[0]</p>";
          echo "<p class=\"fd-txt1\">$row[1]....</p>";
          echo "<p class=\"fd-cate\">$row[3]</p>";
          echo "<a href=\"./foundation-detail.php?donation=$row[4]\" class=\"fd-detail\"> รายละเอียด>> </a>";
          echo "</div>";
        }?>

     


    </div>
  </div>
  <!----------------------FOUNDATION END---------------------->


  <!--cotainer-->
  </div>
  
  <!----------------------footer Start---------------------->
    <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->

</body>
</html>