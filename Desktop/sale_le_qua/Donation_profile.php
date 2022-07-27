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
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/table-profile.css?V=1">
 <link rel="stylesheet" type="text/css" href="profile/flex-profile.css?V=1">
   <!--------------------NAV---------------------->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/nav.css">
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
        <!-- <li><a href="#"  class="nav-menu">รายงานการแบ่งปัน</a></li>&nbsp; -->
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
                echo "<br>";
                echo "<a href=\"./Method/Userlogout.php\">logout</a>";  
                echo "<br>";
                echo "<a href=\"./Store_profile.php\">ร้านค้า</a>";
                echo "<br>";
                echo "<a href=\"./User_tracking.php\">การซื้อของฉัน</a>";
                echo "<br>";
                echo "<a href=\"./Donation_profile.php\">องค์กรการกุศล</a>";

                } else {
                echo  "<a class=\"icon\"> <i class=\"fa fa-user\"></i>";
                echo "<div class=\"dropdown-content\">";
                echo "<a href=\"./User_register.php\">สมัครสมาชิก</a>"; 
                echo "<a href=\"./User_login.php\">เข้าสู่ระบบ</a>";   

                }
                ?>
            </a>
          </div>
          </li>
    </ul>
  </div>
  </div>

<div class="container">
  <!--------------------NAV END---------------------->
     <div class="cover-page">



    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'profile')" id="defaultOpen">โปรไฟล์</button>
      <!-- <button class="tablinks" onclick="openCity(event, 'follow')">ติดตาม</button>
      <button class="tablinks" onclick="openCity(event, 'like')">ถูกใจ</button> -->

    </div>

    <div id="profile" class="tabcontent">

      <h3>โปรไฟล์</h3>


      <div class="flex-container">

        
<?php
    include './Method/DBconfig.php';
   
    if (isset($_SESSION['user_id'])) //เช็คการlogin
        {
        $User_ID = $_SESSION['user_id'];
        $sql_search = "SELECT donation.Donation_ID,"
        ." donation.Donation_Name,"
        ." donation.Donation_ManagerName,"
        ." donation.Donation_Email,"
        ." donation.Donation_Tel,"
        ." donation.Donation_Address,"
        ." donation.Donation_ProfileImage,"
        ." donation.Donation_Detail,"
        ." donation.Donation_status,"
        ." donationtype.DonationType_Name,"
        ." donation.Donation_Accountupdate,"
        ." donation.Donation_Accountcreate,"
        ." donation.User_ID"
        ." FROM donation"
        ." JOIN donationtype ON donation.DonationType_ID = donationtype.DonationType_ID"
        ." WHERE donation.User_ID = '$User_ID';";
        // echo "$sql_search";

     
        $result = $conn->query($sql_search);
        $row = $result->fetch_array();
        if(isset($row[0])){ 
            $Donation_ID = $row[0];
            $_SESSION['donation_id']=$Donation_ID;
  
            echo '<div class="child">';
            echo '<div class="left-img-cover">';
            echo '<div class="imgprofile-cover">';
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[6] ).'"/>';
            echo "</div>";
            echo "</div>";
            echo "<a class=\"button-addimg\" href=\"./Donation_profileaddimage.php?donationaddimage_ID=$row[0]\"> Add </a>";
            echo "<a class=\"button-addimg\" href=\"./Donation_neededit.php\">แก้ไขข้อมูล</a>";
            echo "</div>";
            echo '<div class="child" style="overflow-x:auto;">';
            echo "<table id=t-profile>";
            // echo "<tr><td>Donation_ID</td><td>$row[0]</td></tr>";
            echo "<tr><td>ชื่อองค์กร</td><td>$row[1]</td></tr>";
            echo "<tr><td>ผู้บริหาร</td><td>$row[2]</td></tr>";
            echo "<tr><td>Email</td><td>$row[3]</td></tr>";
            echo "<tr><td>เบอร์โทร</td><td>$row[4]</td></tr>";
            echo "<tr><td>ที่อยู่องค์กร</td><td>$row[5]</td></tr>";
            // echo "<tr><td>Donation_Detail</td><td>$row[7]</td></tr>";
            echo "<tr><td>สถานะ</td><td>$row[8]</td></tr>";
            echo "<tr><td>ประเภทองค์กร</td><td>$row[9]</td></tr>";
            // echo "<tr><td>Donation_Accountupdate</td><td>$row[10]</td></tr>";
            // echo "<tr><td>Donation_Accountcreate</td><td>$row[11]</td></tr>";
            // echo "<tr><td>User_ID</td><td>$row[12]</td></tr>";
            echo "</table><br>";
            echo "</div>";

            // echo "<a href='./Store_storeproduct.php'>My Product</a>";
            // echo "<br>";
            // echo "<a href='./Store_orders_manage.php'>My Order</a>";


        }else{
            header("location:./Donation_register.php");
        }

    } else {
        header("location:../User_login.php");
    }
    ?>
    </div>
    </div>

    <div id="follow" class="tabcontent">
      <h3>ติดตาม</h3>

    </div>

    <div id="like" class="tabcontent">
      <h3>ถูกใจ</h3>

    </div>


    <div id="foundation-mange" class="tabcontent">
      <h3>จัดการมูลนิธิ</h3>

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

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>

    
</body>
</html>