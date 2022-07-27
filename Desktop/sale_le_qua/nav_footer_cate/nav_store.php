<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--------------------NAV---------------------->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/nav_store.css">

</head>
<body>
    <!--------------------NAV START---------------------->
    <?php
    include './Method/DBconfig.php';
 
   
    ?>
     <!--cart-->
     <?php
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        } 
    if (isset($_GET['addCart'])) {
          $pid = $_GET['product_id'];
          $QT = $_POST['Quantity'];
          if(in_array($pid, array_column($_SESSION['cart'], '0')) == false) {
            array_push($_SESSION['cart'], array($pid,$QT));
          }
      }
  
    ?>
    <!-- <h4><a href="Cart_main.php" id="demo">จำนวนสินค้า <?php echo count($_SESSION['cart']); ?> ชิ้น</a></h4>
    </div> -->
    <!--cart-->

  <!--------------------NAV START---------------------->
  <div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      <div class="nav-title">
      <a href="Home.php"> <img src="nav_footer_cate/logo.png" class="logo"></a>
      </div>
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>


    <div class="nav-links">
      <ul>
      <li><a href="Homepage_main.php" class="nav-menu">หน้าหลัก</a></li>&nbsp;
        <li><a href="Promotion.php" class="nav-menu">โปรโมชั่น</a></li>&nbsp;
        <li><a href="Product.php"  class="nav-menu">สินค้า</a></li>&nbsp;
        <li><a href="Foundation.php" class="nav-menu">องค์กร/มูลนิธิ</a></li>&nbsp;
        <li><a href="Article.php"  class="nav-menu">บทความ</a></li>&nbsp;
        <li><a href="About.php"  class="nav-menu">เกี่ยวกับเรา</a></li>&nbsp;
        <li><a href="report.php"  class="nav-menu">รายงานการแบ่งปัน</a></li>&nbsp;
        <!-- <li><a href="https://docs.google.com/forms/d/1Hf634Uy2Q9hSwRuqTwUporDbOTWUCY3QuIRr8xInGmo/viewform?edit_requested=true" class="nav-menu"><h3>ประเมินการทดสอบระบบ</h3></a></li>&nbsp; -->
        <li> <a class="icon" href="Cart_main.php"><i class="fa fa-shopping-cart"> <?php echo count($_SESSION['cart']);?> ชิ้น</i></a></li>
        
        <li>
          <div class="dropdown">
                <?php 
                if (isset($_SESSION['user']))
                {
                echo  "<a class=\"icon\">";
                echo "<i class=\"fa fa-user\">".$_SESSION['user']."</i>";
                echo "<div class=\"dropdown-content\">";
                // echo "<a href=\"./Method/Userlogout.php\">".$_SESSION['user'];  
                // echo "</a>";
                echo "<a href=\"./profile.php\">โปรไฟล์</a>";  
                echo '<Hr color="#FFF" size="1">';
                
                echo "<a href=\"./Method/Userlogout.php\">logout</a>";  
                echo '<Hr color="#FFF" size="1">';
              
                echo "<a href=\"./Store_profile.php\">ร้านค้า</a>";
                echo '<Hr color="#FFF" size="1">';
                
                echo "<a href=\"./User_tracking.php\">การซื้อของฉัน</a>";
                echo '<Hr color="#FFF" size="1">';
             
                echo "<a href=\"./Donation_profile.php\">องค์กรการกุศล</a>";

                } else {
                echo  "<a class=\"icon\"> <i class=\"fa fa-user\"></i>";
                echo "<div class=\"dropdown-content\">";
                echo "<a href=\"./User_register.php\">สมัครสมาชิก</a>"; 
                echo '<Hr color="#FFF" size="1">';
                echo "<a href=\"./User_login.php\">เข้าสู่ระบบ</a>";   

                }
                ?>
            </a>
          </div>
          </li>
    </ul>
  </div>


  <!--------------------NAV END---------------------->

</body>
</html>