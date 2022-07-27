<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promotion</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="foundation-promotion/promotion.css?V=">
  

</head>


<body>
   <!--CATEGORY--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--CATEGORY-->
  
   <!--container--> <div class="container">
   <!--BANNER--><?php require_once("style-product/banner.php"); ?><!--BANNER-->
        

            <div class="menu">     
              <a  id="showall">ทั้งหมด</a>
              <a  class="showSingle" target="1">ลดแรง</a>
              <!-- <a  class="showSingle" target="2">Flash Sale</a> -->
              <a  class="showSingle" target="3">สินค้าใหม่</a>
              <a  class="showSingle" target="4">ทุบราคา</a>
            </div> 

            <section class="cnt">

            <div id="div1" class="targetDiv">  
                 <div class="flex-container"><!--ลดแรง-50-60-->

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
                ." Where product.Product_Status = \"normal\" AND productlot.Productlot_Amount != 0 AND ((Productlot_Exdate-CURRENT_DATE)>7) AND productlot.Productlot_Discount BETWEEN 30 AND 50 "  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
                ." ORDER BY productlot.Productlot_Discount Limit 6 ;";
                  // echo "$sqlp";
    
                $result = $conn->query($sqlp);
                while ($row = $result->fetch_array()) {
                  
                  echo "<div class=\"pro-item\">";
                  echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[11]\" style=\"text-decoration:none; color:black\">";
                  echo'  <div id="ribbon-head2">';
                  echo'    '.$row[1].'%';
                  echo'  </div>';
                  echo'  <div id="ribbon-tail2">';
                  echo'    <div id="left2"></div>';
                  echo'    <div id="righ2t"></div>';
                  echo'  </div>';
                  echo '<div class="pro-img"> <img src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'" class="proimg-resize"> </div>';
                  echo "<div class=\"pro-txt\">";
                  echo "<h1>$row[3] $row[7] บาท</h1>";
                  echo "<h5 id=\"pro-detail\"><div style=\"color:#f08648; font-weight:bold\">$row[4] $row[5]</div> $row[6]</h5>";
                  echo "</div>";
                  echo "</div>";
                  echo "</a>";
                  // echo'<div class="img-position"><img class="img-storeresize" src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/></div></div><br>';

                }
                  ?>

                     
                  </div>
            </div>
            
           
<!-- 
            <div id="div2" class="targetDiv">  
                  <div class="flex-container">
                          <div class="pro-item">60</div>
                          <div class="pro-item">60</div>
                  </div>        
            </div>       -->
            

            <div id="div3" class="targetDiv">  
                  <div class="flex-container">
                          
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
                ." Where product.Product_Status = \"normal\" AND ((Productlot_Exdate-CURRENT_DATE)>7) AND productlot.Productlot_Amount != 0 "  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
                ." ORDER BY productlot.Productlot_createdate DESC Limit 6  ;";
                  // echo "$sqlp";
    
                $result = $conn->query($sqlp);
                while ($row = $result->fetch_array()) {
                  echo "<div class=\"pro-item\">";
                  echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[11]\" style=\"text-decoration:none; color:black\">";
                  echo'  <div id="ribbon-head2">';
                  echo'    '.$row[1].'%';
                  echo'  </div>';
                  echo'  <div id="ribbon-tail2">';
                  echo'    <div id="left2"></div>';
                  echo'    <div id="righ2t"></div>';
                  echo'  </div>';
                  echo '<div class="pro-img"> <img src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'" class="proimg-resize"> </div>';
                  echo "<div class=\"pro-txt\">";
                  echo "<h1>$row[3] $row[7] บาท</h1>";
                  echo "<h5 id=\"pro-detail\"><div style=\"color:#f08648; font-weight:bold\">$row[4] $row[5]</div> $row[6]</h5>";
                  echo "</div>";
                  echo "</div>";
                  // echo'<div class="img-position"><img class="img-storeresize" src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/></div></div><br>';

                }
                  ?>

                  </div>        
            </div>      


            <div id="div4" class="targetDiv">  
                  <div class="flex-container">
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
                ." Where product.Product_Status = \"normal\" AND ((Productlot_Exdate-CURRENT_DATE)>7) AND productlot.Productlot_Amount != 0 AND productlot.Productlot_Discount BETWEEN 70 AND 90 "  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
                ." ORDER BY productlot.Productlot_Discount  Limit 6  ;";
                  // echo "$sqlp";
    
                $result = $conn->query($sqlp);
                while ($row = $result->fetch_array()) {
                  echo "<div class=\"pro-item\">";
                  echo "<a href=\"./Product_detail.php?productid=$row[0]&&productlot=$row[11]\" style=\"text-decoration:none; color:black\">";
                  echo'  <div id="ribbon-head2">';
                  echo'    '.$row[1].'%';
                  echo'  </div>';
                  echo'  <div id="ribbon-tail2">';
                  echo'    <div id="left2"></div>';
                  echo'    <div id="righ2t"></div>';
                  echo'  </div>';
                  echo '<div class="pro-img"> <img src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'" class="proimg-resize"> </div>';
                  echo "<div class=\"pro-txt\">";
                  echo "<h1>$row[3] $row[7] บาท</h1>";
                  echo "<h5 id=\"pro-detail\"><div style=\"color:#f08648; font-weight:bold\">$row[4] $row[5]</div> $row[6]</h5>";
                  echo "</div>";
                  echo "</div>";
                  // echo'<div class="img-position"><img class="img-storeresize" src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'"/></div></div><br>';

                }
                  ?>
                         
                  </div>        
            </div>      
          </section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="foundation-promotion/js-toggle.js"></script>

    <!--container--></div>

    <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
   
</body>
</html>