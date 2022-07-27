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
        $keyword = "";
            if (isset($_POST['keyword']))
            $keyword = trim($_POST['keyword']);
    ?>

    <!-- Nav -->
  <!--nav--><div><?php require_once("nav_footer_cate/nav_store.php"); ?></div><!--nav-->
    <!-- Nav -->
    <br> <br> <br> <br><br>
    <div class="tab">
    <button class="tablinks" onclick="window.location.href='./Store_profile.php'">โปรไฟล์</button>
    <button class="tablinks"  onclick="window.location.href='./Dashboard/Dashboard_Year.php'">Dashboard</button>
    <button class="tablinks"  onclick="window.location.href='./Store_orders_manage.php'">รับคำสั่งซื้อ</button>
    <button class="tablinks"  onclick="window.location.href='./Store_orders_manage.php'" >กำลังรอการยืนยันการรับสินค้า</button>
    <button class="tablinks"  onclick="window.location.href='./Store_orders_manage.php'">รายการจัดส่งสำเร็จ</button>
    <button class="tablinks" onclick="openCity(event, 'user-manage')" id="defaultOpen">สินค้าของทางร้าน</button>     
    
    


  </div>
   
  <div id="user-manage" class="tabcontent">
    <a href="./Store_storeproduct_insert.php">เพิ่มสินค้าใหม่</a>
    <form method="POST">
      <input type="search" placeholder="SearchProduct" aria-label="Search"name="keyword">
      <button type="submit">Search</button>
    </form>

    <?php 
    if (isset($_SESSION['store_id'])) //เช็คการlogin
    {
    // echo "Store ID =".$_SESSION['store_id']."<br>";
    $Store_ID=$_SESSION['store_id'];
    // $sql = "SELECT * FROM `user` WHERE `User_ID` LIKE '%$keyword%' or `User_Username` LIKE '%$keyword%' or `User_Firstname` LIKE '%$keyword%' or `User_Lastname` LIKE '%$keyword%' ORDER BY `User_ID` ";
    $sql = "SELECT * FROM `product` WHERE Store_ID ='$Store_ID'";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {

        echo "<table id=\"Usertable\">";
        echo "<tr><td colspan=2>"; 
        if(trim($keyword!=""))echo "ผลลัพธ์การค้นพบ $keyword ";
        echo "ค้นพบ ".$result->num_rows." รายการ</td></tr>";
        
    
        echo "<tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รูปภาพสินค้า</th>
            <th>เรียกดู</th>
        </tr>";

        while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row[0] ."</td>";
                echo "<td>" . $row[1]."</td>";
                echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['3'] ).'"/></td>';
                echo "<td><a href=\"./Store_viewproduct.php?view_ID=$row[0]\"> ดูรายละเอียด </a></td>";
                echo "<tr>";
            }

            // echo "<tr>
            // <th>Product_ID</th>
            // <th>Product_Name</th>
            // <th>Product_OriginalPrice</th>
            // <th>Product_SellPrice</th>
            // <th>Product_Discount</th>
            // <th>Product_Amount</th>
            // <th>Product_Detail</th>
            // <th>Product_Productdate</th>
            // <th>Product_Exdate</th>
            // <th>Product_Extype</th>
            // <th>Product_Mainimage</th>
            // <th>Product_Status</th>
            // <th>Product_Score</th>
            // <th>Store_ID</th>
            // <th>Donation_typeID</th>
            // <th>Promotion_ID</th>
            // <th>ProductType_ID</th>
            // <th>Product_Timeupdate</th>
            // <th>Product_Timecreate</th>
            // <th>Edit</th>
            // <th>Delete</th>
            // </tr>";

            // while ($row = $result->fetch_array()) {
            //     echo "<tr>";
            //     echo "<td>" . $row[0] ."</td>";
            //     echo "<td>" . $row[1]."</td>";
            //     echo "<td>" . $row[2] ."</td>";
            //     echo "<td>" . $row[3] ."</td>";
            //     echo "<td>" . $row[4] ."</td>";
            //     echo "<td>" . $row[5] ."</td>";
            //     echo "<td>" . $row[6] ."</td>";
            //     echo "<td>" . $row[7] ."</td>";
            //     echo "<td>" . $row[8] ."</td>";
            //     echo "<td>" . $row[9] ."</td>";
            //     echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['10'] ).'"/></td>';
            //     echo "<td>" . $row[11] ."</td>";
            //     echo "<td>" . $row[12] ."</td>";
            //     echo "<td>" . $row[13] ."</td>";
            //     echo "<td>" . $row[14] ."</td>";
            //     echo "<td>" . $row[15] ."</td>";
            //     echo "<td>" . $row[16] ."</td>";
            //     echo "<td>" . $row[17] ."</td>";
            //     echo "<td>" . $row[18] ."</td>";
            //     echo "<td><a href=\"./#.php?useredit_ID=$row[0]\"> Edit </a></td>";
            //     echo "<td><a href=\"./Method/Storeproductdelete.php?delete=$row[0]\"> Delete </a></td>";
            //     echo "<tr>";
            // }

    echo "</table>"; }
    else {
        echo "0 results";
    }
    }else{
        echo "<a href=\"./User_login.php\">Login</a>";   
    }
    $conn->close();
    ?>
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