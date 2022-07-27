<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_storeproduct</title>
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/style.css" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/side-menu.css" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/table.css" />
</head>

<body>
<?php
        include './Method/DBconfig.php';
        session_start();
        if (isset($_GET['view_ID']))
        $View_ID = ($_GET['view_ID']);
        // echo "Product ID = $View_ID <br>";
    ?>
    
    <!-- Nav -->
    <section class="navigation">
      <div class="nav-container">
        <div class="brand">
          <img src="img/logo.png" class="logo-admin" />
        </div>
        <nav>
          <div class="nav-mobile">
            <a id="navbar-toggle" href="#!"><span></span></a>
          </div>
          <ul class="nav-list">
            <!--<li>
          <a href="#!">โฮม</a>
        </li>
        <li>
          <a href="#!">About</a>
        </li>
        <li>
          <a href="#!">Services</a>
          <ul class="navbar-dropdown">
            <li>
              <a href="#!">Sass</a>
            </li>
            <li>
              <a href="#!">Less</a>
            </li>
            <li>
              <a href="#!">Stylus</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!">Portfolio</a>
        </li>
        <li>
          <a href="#!">Category</a>
          <ul class="navbar-dropdown">
            <li>
              <a href="#!">Sass</a>
            </li>
            <li>
              <a href="#!">Less</a>
            </li>
            <li>
              <a href="#!">Stylus</a>
            </li>
          </ul>
        </li>-->

            <li>
              <a href="#!">ออกจากระบบ</a>
            </li>
          </ul>
        </nav>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="Admin/Navbar/script.js"></script>
    <!-- Nav -->

    <div class="tab">
    <button class="tablinks" onclick="window.location.href='Store_profile.php'">โปรไฟล์</button>
    <button class="tablinks"  onclick="window.location.href='./Dashboard/dashboard.php'">Dashboard</button>
    <button class="tablinks"  onclick="window.location.href='Store_profile.php'">รับคำสั่งซื้อ</button>
    <button class="tablinks"  onclick="window.location.href='Store_profile.php'" >กำลังรอการยืนยันการรับสินค้า</button>
    <button class="tablinks"  onclick="window.location.href='Store_profile.php'">รายการจัดส่งสำเร็จ</button>
    <button class="tablinks" onclick="openCity(event, 'user-manage')" id="defaultOpen">สินค้าของทางร้าน</button>     
    
    


  </div>

    <div id="user-manage" class="tabcontent">
    <?php 
    if (isset($_SESSION['store_id'])) //เช็คการlogin
    {
    $Store_ID=$_SESSION['store_id'];
    $sql = "SELECT product.Product_ID,"
        ." product.Product_Name," 
        ." product.Product_Detail,"
        ." product.Product_Mainimage,"
        ." product.Product_Status,"
        ." product.Product_Score,"
        ." product.Store_ID,"
        ." donationtype.DonationType_Name,"
        ." producttype.ProductType_Name,"
        ." product.Product_Timeupdate,"       
        ." product.Product_Timecreate" 
        ." FROM `product`" 
        ." JOIN store ON product.Store_ID = store.Store_ID"
        ." JOIN donationtype ON product.Donation_TypeID = donationtype.DonationType_ID"
        ." JOIN producttype ON product.Producttype_ID = producttype.Producttype_ID"
        ." WHERE product.Store_ID ='$Store_ID' and product.Product_ID = '$View_ID';";
        //  echo "$sql";

    $result = $conn->query($sql);
    $row = $result->fetch_array();

      echo "<table id=\"Usertable\">";
                echo '<tr><td colspan="2"><h3>1.ข้อมูลหลัก</h3>';//----------------------------------------------------------------------------------------------ข้อมูลหลัก
                echo "<a href=\"./Store_storeproduct_edit.php?storeproduct_edit_ID=$row[0]\"> แก้ไขข้อมูล </a><br>";
                echo "<a href=\"./Method/Storeproductdelete.php?delete=$row[0]\"> ลบสินค้า </a></td></tr>";
                echo "<tr><td>รหัสสินค้า</td><td>" . $row[0] ."</td></tr>";
                echo "<tr><td>ชื่อสินค้า</td><td>" . $row[1]."</td></tr>";
                echo "<tr><td>รายละเอียดสินค้า</td><td>" . $row[2] ."</td></tr>";
                echo '<tr><td>รูปภาพสินค้าหลัก</td><td><img src="data:image/jpeg;base64,'.base64_encode( $row['3'] ).'"/></td></tr>';
                echo "<tr><td></td><td><a href=\"./Store_storeproduct_mainimg.php?product_mainimage_ID=$row[0]\">แก้ไขรูปภาพหลัก</a></td></tr>";
                echo "<tr><td>สถานะ</td><td>" . $row[4]."</td></tr>";
                // echo "<tr><td>คะแนน</td><td>" . $row[5] ."</td></tr>";
                // echo "<tr><td></td><td>" . $row[6] ."</td></tr>";
                echo "<tr><td>ประเภทการบริจาค</td><td>" . $row[7]."</td></tr>";
                echo "<tr><td>ประเภทสินค้า</td><td>" . $row[8] ."</td></tr>";
                echo "<tr><td>วันที่เพิ่มสินค้า</td><td>" . $row[9] ."</td></tr>";
                echo "<tr><td>วันที่อัปเดตสินค้า</td><td>" . $row[10]."</td></tr>";
      echo "</table>";
      echo "<br>";  

      echo "<table id=\"Usertable\">";          
      echo '<tr><td colspan="3"><h3>2.รูปภาพ</h3></td></tr>';//----------------------------------------------------------------------------------------------รูปภาพอื่นๆ
      $i = 1;
      $sql_im = "SELECT * FROM `images` WHERE Product_ID = '$View_ID' ";
      $result = $conn->query($sql_im);
      while ($row_im = $result->fetch_array()) {
        echo '<tr><td>รูปภาพ  '.$i++.'</td>';
        echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row_im['1'] ).'"/></td>';
        echo "<td><a href='./Method/Imagedelete.php?delete=$row_im[0]&product_id=$row[0]'>ลบรูป</a></td>";
        echo '</tr>';
      }
      echo '<tr><td>เพิ่มรูปภาพอื่นๆ</td>';
      echo "<td colspan=\"2\"><a href=\"./Store_storeproduct_addimages.php?product_image_ID=$row[0]\"> เพิ่มรูปภาพเพิ่มเติม </a></td></tr>";
      echo "</table>"; 
      echo "<br>";  

      echo "<table id=\"Usertable\">";  
      echo '<tr><td colspan="2"><h3>3.ข้อมูลLot</h3>';//----------------------------------------------------------------------------------------------ล็อต
      echo "<a href=\"./Store_Storeproductlot_insert.php?product_ID=$row[0]\"> เพิ่มล็อตสินค้า </a></td>";
      echo "<th>รหัสล็อตสินค้า</th>";
      echo "<th>ราคาเดิม</th>";
      echo "<th>ราคาขาย</th>";
      echo "<th>จำนวนส่วนลด</th>";  
      echo "<th>จำนวนสินค้า</th>";
      echo "<th>วันผลิต</th>";
      echo "<th>วันหมดอายุ</th>";
      echo "<th>ประเภทหมดอายุ</th>";
      echo "<th>สถานะ</th>";
      echo "<th>วันเพิ่มล็อต</th>";
      echo "<th>วันอัปเดตล็อต</th>";
      echo "<th colspan=\"2\">ตัวเลือก</th>";

      echo '</tr>';
      
      $sql_lt = "SELECT * FROM `productlot` WHERE Product_ID = '$View_ID' ";
      $result = $conn->query($sql_lt);
      $i = 1;
      $amount = 0;
      while ($row_lt = $result->fetch_array()) {
        echo '<tr>';
        echo "<td>ข้อมูลlotที่  ".$i++."</td>";
        
        echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row_lt['12'] ).'"/></td>';
        echo "<td>" . $row_lt[0] ." </td>";
        echo "<td>" . $row_lt[2] ." บาท</td>";
        echo "<td>" . $row_lt[3] ." บาท</td>";
        echo "<td>" . $row_lt[4] ." %</td>";
        echo "<td>" . $row_lt[5] ." ชิ้น</td>";
        echo "<td>" . $row_lt[6] ."</td>";
        echo "<td>" . $row_lt[7] ."</td>";
        echo "<td>" . $row_lt[8] ."</td>";
        echo "<td>" . $row_lt[9] ."</td>";
        echo "<td>" . $row_lt[10] ."</td>";
        echo "<td>" . $row_lt[11] ."</td>";
        echo "<td><a href='Store_editlot.php?editlot=$row_lt[0]&product_id=$row[0]'>แก้ไขข้อมูล</a></td>";
        echo "<td><a href='./Method/Lotdelete.php?delete=$row_lt[0]&product_id=$row[0]'>ลบข้อมูล</a></td>";
        echo '</tr>';
        $amount += $row_lt[5];
      }
      echo '<tr>';
      echo '<td colspan="6">ผลรวม</td>';
      echo '<td>'.$amount.' ชิ้น</td>';
      echo '</tr>';

      echo "</table>"; }
    ?>

    </div>

    <?php 
     // echo "<tr><td>รหัสสินค้า</td><td>" . $row[0] ."</td></tr>";
                // echo "<tr><td>ชื่อสินค้า</td><td>" . $row[1]."</td></tr>";
                // echo "<tr><td>ราคาปกติ</td><td>" . $row[2] ."</td></tr>";
                // echo "<tr><td>ราคาขาย</td><td>" . $row[3] ."</td></tr>";
                // echo "<tr><td>ลดราคา</td><td>" . $row[4] ."</td></tr>";
                // echo "<tr><td>จำนวนสินค้า</td><td>" . $row[5] ."</td></tr>";
                // echo "<tr><td>รายละเอียดสินค้า</td><td>" . $row[6] ."</td></tr>";
                // echo "<tr><td>วันที่ผลิต</td><td>" . $row[7] ."</td></tr>";
                // echo "<tr><td>วันหมดอายุ</td><td>" . $row[8] ."</td></tr>";
                // echo "<tr><td>ประเภทการหมดอายุ</td><td>" . $row[9] ."</td></tr>";
                // echo '<tr><td>รูปภาพสินค้าหลัก</td><td><img src="data:image/jpeg;base64,'.base64_encode( $row['10'] ).'"/></td></tr>';
                // echo '<tr><td>เพิ่มรูปสินค้า</td>';
                // echo "<td><a href=\"./Store_storeproduct_mainimg.php?product_mainimage_ID=$row[0]\"> Add </a></td></tr>";
                // echo "<tr><td>สถานะสินค้า</td><td>" . $row[11] ."</td></tr>";
                // // echo "<tr><td>Product_Score</td><td>" . $row[12] ."</td></tr>";
                // echo "<tr><td>รหัสร้านค้า</td><td>" . $row[13] ."</td></tr>";
                // echo "<tr><td>ประเภทการบริจาค</td><td>" . $row[14] ."</td></tr>";
                // // echo "<tr><td>Promotion_ID</td><td>" . $row[15] ."</td></tr>";
                // echo "<tr><td>ประเภทสินค้า</td><td>" . $row[16] ."</td></tr>";
                // echo "<tr><td>เวลาอัปเดตล่าสุด</td><td>" . $row[17] ."</td></tr>";
                // echo "<tr><td>เวลาที่สร้าง</td><td>" . $row[18] ."</td></tr>";
                // echo "<tr><td>ลอตของสินค้า</td><td>" . $row[19] ."</td></tr>";
                // echo "<tr><td>แก้ไข</td><td><a href=\"./Store_storeproduct_edit.php?storeproduct_edit_ID=$row[0]\"> แก้ไข </a></td></tr>";
                // echo "<tr><td>ลบ</td><td><a href=\"./Method/Storeproductdelete.php?delete=$row[0]\"> ลบ </a></td></tr>";
    ?>
</body>
</html>