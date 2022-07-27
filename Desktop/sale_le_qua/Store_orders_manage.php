<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />

    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

    
  <link rel="stylesheet" type="text/css" href="tracking/table.css?V=1">
  <link rel="stylesheet" type="text/css" href="tracking/side-menu.css?V=1">
  <link rel="stylesheet" type="text/css" href="tracking/element.css?V=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/nav_store.php"); ?><!--NAV-->
     <div class='container'>

<div class="cover-page">

   <div class="tab">
   <button class="tablinks"onclick="window.location.href='Store_profile.php'">โปรไฟล์<i class="fas fa-store"></i></button>
   <button class="tablinks"  onclick="window.location.href='./Dashboard/Dashboard_Year.php'">Dashboard</button>
   <button class="tablinks" onclick="openCity(event, 'wait-p')" id="defaultOpen">รับคำสั่งซื้อ</button>
    <button class="tablinks" onclick="openCity(event, 'wait-s')" >กำลังรอการยืนยันการรับสินค้า</button>
    <button class="tablinks" onclick="openCity(event, 'shiping-w')" >รายการจัดส่งสำเร็จ</button>
    <button class="tablinks"onclick="window.location.href='Store_storeproduct.php'">สินค้าของทางร้าน</button>     
    
    

  </div>


  <?php
      include './Method/DBconfig.php';
  ?>


  <div id="wait-p" class="tabcontent" style="overflow-x:auto;">
    <h3>รับคำสั่งซื้อ</h3>
   
    <?php
    if (isset($_SESSION['store_id']))
    
        $store_id = $_SESSION['store_id'];
        $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------รับคำสั่งซื้อ
        . " orderbill.Order_Date,"
        . " orderbill.Order_Status,"
        . " orderbill.Order_Address,"
        . " orderbill.User_ID,"
        . " orderbill.Payment_ID"
        . " FROM `orderbill`"
        . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
        . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
        . " JOIN store ON product.Store_ID = store.Store_ID "
        . " WHERE store.Store_ID = '$store_id' And orderbill.Order_Status='paid' And orderdetail.OrderDetail_Status='pending' "
        . " ORDER BY `User_ID`;";
        // echo"$sql_p<br>";

        // echo "<br><lable>รับคำสั่งซื้อ</lable>";
        $result = $conn->query($sql_p);
        while ($row = $result->fetch_array()) {
            echo "<table id=wait-pay>";
            echo "<tr>";
            echo "<th>รหัสใบสั่งซื้อ</th>";
            echo "<th>วันสั่งซื้อ</th>";
            echo "<th>สถานะ</th>";
            echo "<th>ที่อยู่ในการจัดส่ง</th>";
            echo "<th>ผู้ซื้อ</th>";
            echo "<th>การชำระเงิน</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            if ($row[2]=='paid'){
                echo "<td>รอการจัดส่ง</td>";
              }else{
                echo "<td>$row[2]</td>";
              }
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            // echo "<table id=wait-pay>";
            $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
            . " orderdetail.Product_Quantity,"
            . " orderdetail.Product_Price,"
            . " orderdetail.OrderDetail_Status,"
            // . " orderbill.Order_Address,"
            . " orderdetail.Order_ID,"
            // . " orderbill.User_ID,"
            . " product.Product_ID,"
            . " orderdetail.OrderDetail_Lotnumber,"
            . " orderdetail.Shipment_Code,"
            . " shipment.Shipment_Name,"
            . " donationtype.DonationType_Name,"
            . " store.store_ID,"
            . " orderdetail.OrderDetail_Updatetime,"
            . " product.Product_Name,"
            . " product.Product_Mainimage"
            . " FROM orderdetail "
            . " JOIN orderbill ON orderdetail.Order_ID = orderbill.Order_ID"
            . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
            . " JOIN store ON product.Store_ID = store.Store_ID "
            . " JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " lEFT JOIN shipment ON orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE store.Store_ID = '$store_id' AND orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='pending';";
            $result_pd = $conn->query($sql_pd);
            // echo "$sql_pd";
            while ($row_pd = $result_pd->fetch_array()) {
              echo "<div class=\"wait-detail\">";
              echo "<div id=\"child-wait\">";
                //  echo "<td>$row_pd[0]</td>";
                echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['13'] ).'"/></div>';
                echo "<span class=\"name-p\">$row_pd[12]</span>";
                echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
                echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
                // echo "<td>$row_pd[3]</td>";
                // echo "<td>$row_pd[4]</td>";
                echo "<span class=\"code-p\">NO.สินค้า $row_pd[5]</span>";
               
               
                echo "<span class=\"give-p\">$row_pd[9]</span>";
               
                echo "</div>";
                echo "<div id=\"child-wait\">";
                if ($row_pd[7]==null and $row_pd[8]==null){
                  echo "<span class=\"status-p\">รอการจัดส่ง</span>"; }
                else{ 
                echo "<td>รหัสติดตามการจัดส่ง $row_pd[7]</td>";
                echo "<td> จัดส่งโดย$row_pd[8]</td>";}
                
                // echo "<td>$row_pd[10]</td>";
                echo "<span class=\"datetime-p\">$row_pd[11]</span>";
                echo "<span class=\"lot-p\">ล๊อตที่ $row_pd[6]</span>";
                echo "<td><a class=\"button-f\" href='Store_orders_insert_tracking.php?order_tracking=$row_pd[0]'>กรอกข้อมูลจัดส่ง</a></td>";
                echo "</div>";
                echo "</div>";
            }
          
            
        }
    ?>
  </div>
      
  <div id="wait-s" class="tabcontent" style="overflow-x:auto;">
    <h3>
กำลังรอการยืนยันการรับสินค้า</h3>
    <?php
     $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------กำลังรอการยืนยีนการรับสินค้า
     . " orderbill.Order_Date,"
     . " orderbill.Order_Status,"
     . " orderbill.Order_Address,"
     . " orderbill.User_ID,"
     . " orderbill.Payment_ID"
     . " FROM `orderbill`"
     . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
     . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
     . " JOIN store ON product.Store_ID = store.Store_ID "
     . " WHERE store.Store_ID = '$store_id' And orderbill.Order_Status='paid' And orderdetail.OrderDetail_Status='delivery' "
     . " ORDER BY `User_ID`;";
     // echo"$sql_p<br>";

    //  echo "<br><lable>กำลังรอการยืนยันการรับสินค้า</lable>";
     $result = $conn->query($sql_p);
     while ($row = $result->fetch_array()) {
         echo "<table id=wait-pay>";
         echo "<tr>";
         echo "<th>รหัสใบสั่งซื้อ</th>";
         echo "<th>วันสั่งซื้อ</th>";
         echo "<th>สถานะ</th>";
         echo "<th>ที่อยู่ในการจัดส่ง</th>";
         echo "<th>ผู้ซื้อ</th>";
         echo "<th>การชำระเงิน</th>";
             echo "</tr>";
             echo "<tr>";
         echo "<td>$row[0]</td>";
         echo "<td>$row[1]</td>";
         if ($row[2]=='paid'){
            echo "<td>กำลังจัดส่ง</td>";
          }else{
            echo "<td>$row[2]</td>";
          }
         echo "<td>$row[3]</td>";
         echo "<td>$row[4]</td>";
         if ($row[5]==null){
             echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
         }else{
             echo "<td>$row[5]</td>";
         }
         echo "</tr>";
         echo "</table>";
        //  echo "<table id=wait-pay>";
         $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
         . " orderdetail.Product_Quantity,"
         . " orderdetail.Product_Price,"
         . " orderdetail.OrderDetail_Status,"
         // . " orderbill.Order_Address,"
         . " orderdetail.Order_ID,"
         // . " orderbill.User_ID,"
         . " product.Product_ID,"
         . " orderdetail.OrderDetail_Lotnumber,"
         . " orderdetail.Shipment_Code,"
         . " shipment.Shipment_Name,"
         . " donationtype.DonationType_Name,"
         . " store.store_ID,"
         . " orderdetail.OrderDetail_Updatetime,"
         . " product.Product_Name,"
         . " product.Product_Mainimage"
         . " FROM orderdetail "
         . " JOIN orderbill ON orderdetail.Order_ID = orderbill.Order_ID"
         . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
         . " JOIN store ON product.Store_ID = store.Store_ID "
         . " JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
         . " lEFT JOIN shipment ON orderdetail.Shipment_ID = shipment.Shipment_ID"
         . " WHERE store.Store_ID = '$store_id' AND orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='delivery' ;";
         $result_pd = $conn->query($sql_pd);
         // echo "$sql_pd";
         while ($row_pd = $result_pd->fetch_array()) {
          echo "<div class=\"wait-detail\">";
          echo "<div id=\"child-wait\">";
            //  echo "<td>$row_pd[0]</td>";
            echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['13'] ).'"/></div>';
                echo "<span class=\"name-p\">$row_pd[12]</span>";
                echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
                echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
            // echo "<td>$row_pd[3]</td>";
            // echo "<td>$row_pd[4]</td>";
            echo "<span class=\"code-p\">NO.สินค้า $row_pd[5]</span>";
               
               
            echo "<span class=\"give-p\">$row_pd[9]</span>";
           
            echo "</div>";
            echo "<div id=\"child-wait\">";
             if ($row_pd[7]==null){
              "<span class=\"status-p\">รอการจัดส่ง</span>"; }
                 else{ echo"<span class=\"lot-p\">รหัสติดตามการจัดส่ง $row_pd[7]</span>";}
             if ($row_pd[8]==null){
                 echo "<span class=\"status-p\">รอการจัดส่ง</span>"; }
                 else{ echo "<span class=\"status-p\">จัดส่งโดย$row_pd[8]</span>";}
     
            // echo "<td>$row_pd[10]</td>";
            echo "<span class=\"datetime-p\">$row_pd[11]</span>";
            // echo "<td><a class=\"button-f\" href='Store_orders_insert_tracking.php?order_tracking=$row_pd[0]'>กรอกข้อมูลจัดส่ง</a></td>";
            echo "</div>";
            echo "</div>";
         }
        
     }
      ?>
  </div>

  <div id="shiping-w" class="tabcontent" style="overflow-x:auto;">
    <h3>รายการจัดส่งสำเร็จ</h3>
    
    <?php
        $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------รายการจัดส่งสำเร็จ
        . " orderbill.Order_Date,"
        . " orderbill.Order_Status,"
        . " orderbill.Order_Address,"
        . " orderbill.User_ID,"
        . " orderbill.Payment_ID"
        . " FROM `orderbill`"
        . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
        . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
        . " JOIN store ON product.Store_ID = store.Store_ID "
        . " WHERE store.Store_ID = '$store_id' And orderbill.Order_Status='paid' And orderdetail.OrderDetail_Status='complete' Or orderdetail.OrderDetail_Status='finish'"
        . " ORDER BY `User_ID`;";
        // echo"$sql_p<br>";

        // echo "<br><lable>รายการจัดส่งสำเร็จ</lable>";
        $result = $conn->query($sql_p);
        while ($row = $result->fetch_array()) {
            echo "<table  id=wait-pay>";
            echo "<tr>";
            echo "<th>รหัสใบสั่งซื้อ</th>";
            echo "<th>วันสั่งซื้อ</th>";
            echo "<th>สถานะ</th>";
            echo "<th>ที่อยู่ในการจัดส่ง</th>";
            echo "<th>ผู้ซื้อ</th>";
            echo "<th>การชำระเงิน</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            if ($row[2]=='paid'){
                echo "<td>จัดส่งสำเร็จ</td>";
              }else{
                echo "<td>$row[2]</td>";
              }
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            // echo "<table id=wait-pay>";
            $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
            . " orderdetail.Product_Quantity,"
            . " orderdetail.Product_Price,"
            . " orderdetail.OrderDetail_Status,"
            // . " orderbill.Order_Address,"
            . " orderdetail.Order_ID,"
            // . " orderbill.User_ID,"
            . " product.Product_ID,"
            . " orderdetail.OrderDetail_Lotnumber,"
            . " orderdetail.Shipment_Code,"
            . " shipment.Shipment_Name,"
            . " donationtype.DonationType_Name,"
            . " store.store_ID,"
            . " orderdetail.OrderDetail_Updatetime,"
            . " product.Product_Name,"
            . " product.Product_Mainimage"
            . " FROM orderdetail "
            . " JOIN orderbill ON orderdetail.Order_ID = orderbill.Order_ID"
            . " JOIN product ON orderdetail.Product_ID = product.Product_ID"
            . " JOIN store ON product.Store_ID = store.Store_ID "
            . " JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " lEFT JOIN shipment ON orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE store.Store_ID = '$store_id' AND orderdetail.Order_ID = '$row[0]';";
            $result_pd = $conn->query($sql_pd);
            // echo "$sql_pd";
            while ($row_pd = $result_pd->fetch_array()) {
              echo "<div class=\"wait-detail\">";
              echo "<div id=\"child-wait\">";
                // echo "<td>$row_pd[0]</td>";
                echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['13'] ).'"/></div>';
                echo "<span class=\"name-p\">$row_pd[12]</span>";
                echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
                echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
                // echo "<td>$row_pd[3]</td>";
                // echo "<td>$row_pd[4]</td>";
                echo "<span class=\"code-p\">NO.สินค้า $row_pd[5]</span>";
                echo "<span class=\"give-p\">$row_pd[9]</span>";
                   
                echo "</div>";
                echo "<div id=\"child-wait\">";
                echo "<span class=\"lot-p\">ล๊อตที่ $row_pd[6]</span>";
                echo "<span class=\"follow-ship\">รหัสติดตามการจัดส่ง $row_pd[7]</td>";
                echo "<span class=\"shipping-by\">จัดส่งโดย $row_pd[8]</span>";
        
                echo "<span class=\"datetime-p-c\">$row_pd[11]</span>";
                // echo "<td>$row_pd[10]</td>";
                echo "<span class=\"status-p-c\">การจัดส่งสำเร็จ</span>";
                echo "</div>";
            }
            echo "</div>";
        }
    
    ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>
</html>