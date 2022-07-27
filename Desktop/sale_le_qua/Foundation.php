<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foundation</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
  

  <link rel="stylesheet" type="text/css" href="foundation-promotion/foundation-page.css?V=1">
</head>
<body>
    <!--CATEGORY--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--CATEGORY-->
     <!--container--> <div class="container">

     <!--BANNER--><?php require_once("style-product/banner.php"); ?><!--BANNER-->

     <?php 
     $keyword = "";
     $keywordtype ="";
     if (isset($_POST['keyword']))
     $keyword = trim($_POST['keyword']); 
     if (isset($_GET['keywordtype']))
      $keywordtype = trim($_GET['keywordtype']);

     ?>
     <div class="f-category">
       <p id="title-f">องค์กรการกุศล</p>
     <ul class="flex-cate">
       
        <li class="cate-item"><a href="./Foundation.php?keywordtype=1"><img src="img/found-img/icon/image 108.png" class="f-icon"></a><div class="ficon-txt">วัด</div></li>
        <li class="cate-item"><a href="./Foundation.php?keywordtype=2"><img src="img/found-img/icon/image 114.png" class="f-icon"></a><div class="ficon-txt">เด็ก</div></li>
        <li class="cate-item"><a href="./Foundation.php?keywordtype=3"><img src="img/found-img/icon/image 113.png" class="f-icon"></a><div class="ficon-txt">เพื่อสตริ</div></li>
        <li class="cate-item"><a href="./Foundation.php?keywordtype=4"><img src="img/found-img/icon/image 111.png" class="f-icon"></a><div class="ficon-txt">ช่วยเหลือสัตว์</div></li>
        <li class="cate-item"><a href="./Foundation.php?keywordtype=5"><img src="img/found-img/icon/image 112.png" class="f-icon"></a><div class="ficon-txt">การศึกษา</div></li>
        <li class="cate-item"><a href="./Foundation.php?keywordtype=6"><img src="img/found-img/icon/image 115.png" class="f-icon"></a><div class="ficon-txt">ด้อยโอกาส/พิการ</div></li>
       
     
      <li><div class="from-f">
        <form  method="post" name="search">
          <input type="text" size="20" id="f-search" placeholder="<?php echo "$keyword"; ?>" name="keyword">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div></li>
    </ul>
     </div>

    <div class="foundation-main">
   
      
      <?php
        $sql = "SELECT  donation.Donation_Name,"
        ." donation.Donation_ManagerName," 
        ." donation.Donation_Email," 
        ." donation.Donation_Tel,"
        ." donation.Donation_Address,"
        ." donation.Donation_ProfileImage," 
        ." donation.Donation_Detail,"
        ." donation.Donation_Need,"
        ." donationtype.DonationType_Name,"
        ." donation.Donation_Status,"
        ." donation.Donation_ID"
        ." FROM donation" 
        ." JOIN donationtype ON donation.DonationType_ID = donationtype.DonationType_ID"
        ." Where donation.Donation_Status = \"normal\" and donationtype.DonationType_ID like '%$keywordtype%' and  donation.Donation_Name like '%$keyword%' ;";  // สินค้าต้องมีลักษณเป็น Normal ถึงจะแสดงบนหน้าเว็บไซต์ได้
        // ." ORDER BY RAND() ;";
    
        $result = $conn->query($sql);
        while ($row = $result->fetch_array()) {
          echo'<section class="container-f">';
          echo'<div class="flex-f">';
          echo'<div class="flex-container">';
          echo'<div class="left-half">';
          echo'<div class="f-img">';
          echo'<div class="cover-img-f"> ';
          // echo '<td><div class="img-pd1"> <img width="50" height="50" class=\'img-resize1\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['13'] ).'"/></div></td>';
          echo'<img src="data:image/jpeg;base64,'.base64_encode( $row['5'] ).'" class="imgF-storeresize">';
          echo'</div>';
          echo'</div>';  
          echo'</div>';
          echo'<div class="right-half">';  
          echo'<article>';
          echo"<a href=\"./foundation-detail.php?donation=$row[10]\" style=\"text-decoration: none;\"><h1>$row[0]</h1></a>";
          echo'<h2>'.$row[8].'</h2>';
          echo''.$row[6].'';
          echo'</article>';
          echo '<br>';
          echo'<h3>'.$row[7].'</h3>';
          echo'</div>';
          echo'</div> ';
          echo'</div>';
          echo'</section>';
        
        }
      ?>
      


     
     <!-- <section class="container-f">
        <div class="flex-f">
          
        <div class="flex-container">
            <div class="left-half">
              <div class="f-img">
                <div class="cover-img-f"> 
                  <img src="https://occ-0-1723-1722.1.nflxso.net/dnm/api/v6/9pS1daC2n6UGc3dUogvWIPMR_OU/AAAABaZX3--FrdYIv5C7iscHT1i5RcDSSnJ5E27Eq5uHwSBjFrJq95gIUfTKDJ00dik1w5ZaPcZByvIlzzjFOGPGf6HXmGb53m5dHQzqMUpAKCr54wCe.jpg?r=480" class="imgF-storeresize">
                </div>
              </div>    
            </div>
          
            
           
            <div class="right-half">
              <article>
                <a href="foundation-detail.php" style="text-decoration: none;"><h1>ชื่อมูลนิธิ</h1></a>
                <h2>111111111</h2>
               รายการของรับบริจาค
                  รายละเอียดด้านล่างนี้ เป็นรายการอาหารและสิ่งของทั่วไปที่มูลนิธิเด็กเปิดรับบริจาค
                   ทุกรายการนั้น เราคำนึงถึงความต้องการและคุณประโยชน์ ที่สอดคล้องต่อพัฒนาการของเด็ก ๆ
                    เป็นสำคัญ
              </article>
            </div>
            </div> 
       </div>   </div>   
     </section> -->
     


    </div>
   
     <!--container--></div>

    <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
</body>
</html>