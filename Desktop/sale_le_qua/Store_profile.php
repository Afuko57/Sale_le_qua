<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store Profile</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="profile/style.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/side-menu.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/flex-profile.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/table-profile.css?V=1">
  <link rel="stylesheet" type="text/css" href="style-home/style.css?V=1">


  

<!--------------------NAV---------------------->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/nav_store.css">
  <!--------------------NAV---------------------->
</head>

<style>
 
    img {
        width : 200px ;
        height: 200px;
    }
</style>

<body>
<?php
    include './Method/DBconfig.php';
    session_start();
   
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
        <li><a href="#" class="nav-menu">โปรโมชั่น</a></li>&nbsp;
        <li><a href="Product.php"  class="nav-menu">สินค้า</a></li>&nbsp;
        <li><a href="Foundation.php" class="nav-menu">องค์กร/มูลนิธิ</a></li>&nbsp;
        <li><a href="Article.php"  class="nav-menu">บทความ</a></li>&nbsp;
        <li><a href="About.php"  class="nav-menu">เกี่ยวกับเรา</a></li>&nbsp;
        <li><a href="#"  class="nav-menu">รายงานการแบ่งปัน</a></li>&nbsp;
        <li> <a class="icon" href="Cart_main.php"><i class="fa fa-shopping-cart"> <?php echo count($_SESSION['cart']);?> ชิ้น</i></a></li>
        
        <li>
          <div class="dropdown">
                <?php 
                if (isset($_SESSION['user']))
                {
                echo  "<a class=\"icon\">";
                echo "<i class=\"fa fa-user\">".$_SESSION['user']."</i>";
                echo "<div class=\"dropdown-content\">";
              
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
   <div class="container">
   
    <div class="cover-page">



    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'profile')" id="defaultOpen">โปรไฟล์ <i class="fas fa-store"></i></button>
      <button class="tablinks"  onclick="window.location.href='./Dashboard/Dashboard_Year.php'">Dashboard</button>
      <button class="tablinks" onclick="myFunctionWaitP()">รับคำสั่งซื้อ</button>
      <button class="tablinks" onclick="myFunctionWaitS()">กำลังรอการยืนยันการรับสินค้า</button>
      <button class="tablinks"onclick="myFunctionShipingW()">รายการจัดส่งสำเร็จ</button>   
      <button class="tablinks"onclick="window.location.href='Store_storeproduct.php'">สินค้าของทางร้าน</button>                 
    </div>

    <div id="profile" class="tabcontent">

      <h3>โปรไฟล์</h3>


      <div class="flex-container">


          

    <?php
    if (isset($_SESSION['user_id'])) //เช็คการlogin
        {
        $User_ID = $_SESSION['user_id'];
        $sql_search = "SELECT store.Store_ID,"
        ." store.Store_Name," 
        ." store.Store_Acountnumber,"
        ." store.Store_Bankname,"
        ." store.Store_Tel," 
        ." store.Store_Address,"
        ." store.Store_Profileimage,"
        ." donationtype.DonationType_Name,"
        ." store.Store_Status," 
        ." store.Store_Accountcreate,"
        ." store.User_ID, "
        ." user.User_Firstname, "
        ." user.User_Lastname "
        ." FROM `store`" 
        ." JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID"
        ." JOIN user ON user.User_ID = store.User_ID"
        ." WHERE store.User_ID ='$User_ID';";



        // echo "$sql_search";
        $result = $conn->query($sql_search);
        $row = $result->fetch_array();?>
        <?php
        if(isset($row[0])){ 
            $store_ID = $row[0];
            // echo "$sql_search";
            $_SESSION['store_id']=$store_ID;
            echo '<div class="child">';
            echo '<div class="left-img-cover">';
            echo '<div class="imgprofile-cover">';
              if($row['6']!=null){
              echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['6'] ).'"/>';
              } else{
              echo '<img src="./Comment/pleaseupload.jpg"/>';   
              }
            echo "</div>";
            echo "</div>";
            echo "<a class=\"button-addimg\" href=\"./Store_profileaddimage.php?storeaddimage_ID=$row[0]\"> เพิ่มรูปภาพ </a>";
            echo "<br>";
            echo "<a class=\"button-addimg\" href='./Store_storeproduct.php'>สินค้าของทางร้าน</a>";
            echo "<br>";
            echo "<a class=\"button-addimg\" href='./Store_orders_manage.php'>คำสั่งซื้อสินค้า</a>";
            echo "</div>";
            echo '<div class="child" style="overflow-x:auto;">';
            echo "<table id=t-profile >";
            echo "<tr><td>ชื่อร้าน</td><td>$row[1]</td></tr>";
            echo "<tr><td>เลขที่บัญชี</td><td>$row[2]</td></tr>";
            echo "<tr><td>ประเภทการรับเงิน</td><td>$row[3]</td></tr>";
            echo "<tr><td>เบอร์โทรร้าน</td><td>$row[4]</td></tr>";
            echo "<tr><td>ที่อยู่ร้าน</td><td>$row[5]</td></tr>";
            echo "<tr><td>ประเภทการช่วยเหลือ</td><td>$row[7]</td></tr>";
            echo "<tr><td>สถานะ</td><td>$row[8]</td></tr>";
            echo "<tr><td>เจ้าของร้าน</td><td>$row[11] $row[12]</td></tr>";
            echo "</table><br>";
            echo "</div>";

        }else{
          echo"<script> window.location.href='./Store_register.php';</script>";
          // header("location:./Store_register.php");
        }

    } else {
        header("location:../User_login.php");
    }
    ?>
    </div>
    </div>



  </div>
  </div>
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
    function myFunctionWaitP() {
      location.replace("Store_orders_manage.php")
      $("#wait-s")
    }
    function myFunctionWaitS() {
      location.replace("Store_orders_manage.php")
    }
    function myFunctionShipingW() {
      location.replace("Store_orders_manage.php")
    }

      

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>


     
</body>
</html>