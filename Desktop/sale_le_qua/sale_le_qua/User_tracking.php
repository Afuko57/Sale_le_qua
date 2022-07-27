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
  
 
</head>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     <div class='container'>

<div class="cover-page">

   <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'wait-p')" id="defaultOpen">รอการชำระ</button>
    <button class="tablinks" onclick="openCity(event, 'wait-s')">รอการจัดส่ง</button>
    <button class="tablinks" onclick="openCity(event, 'shiping-w')">กำลังจัดส่ง</button>
    <button class="tablinks" onclick="openCity(event, 'finish')">เสร็จสิ้น</button>
    <button class="tablinks" onclick="openCity(event, 'complete')">จัดส่งและให้คะแนน</button>

  </div>



  <?php
      include './Method/DBconfig.php';
      if (empty($_SESSION['user_id'])){
        header("location:./User_login.php");
      }
  ?>


  <div id="wait-p" class="tabcontent" style="overflow-x:auto;">
    <h3>รอการชำระสินค้า</h3>
   <!-- <table id="wait-pay">
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
      </tr>
      <tr>
        <td>A</td>
        <td>B</td>
        <td>C</td>
      </tr>
    
    </table>-->
    <?php
  if (isset($_SESSION['user_id']))
  
      $User_ID = $_SESSION['user_id'];
      $sql_p = "SELECT Order_ID,"
      . " Order_Date,"
      . " Order_Status,"
      . " Order_Address,"
      . " User_ID,"
      . " Payment_ID"
      . " FROM `orderbill`"
      . " WHERE User_ID ='$User_ID' and Order_Status = 'pending';";
      // echo"$sql_p<br>";

    //   echo "<lable>รอชำระสินค้า</lable>";
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
          if ($row[2]=='pending'){
            echo "<td>รอการชำระเงิน</td>";
          }else{
            echo "<td>$row[2]</td>";
          }
          echo "<td>$row[3]</td>";
          echo "<td>$row[4]</td>";
          if ($row[5]==null){
              echo "<td><a  class=\"button\" href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
          }else{
              echo "<td>$row[5]</td>";
          }
          echo "</tr>";
          echo "</table>";
          // echo "<table id=\"wait-pay\">";
          $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
          . " orderdetail.Product_Quantity,"
          . " orderdetail.Product_Price,"
          . " orderdetail.OrderDetail_Status,"
          . " orderdetail.Order_ID,"
          . " orderdetail.Product_ID,"
          . " orderdetail.OrderDetail_Lotnumber,"
          . " orderdetail.Shipment_Code,"
          . " shipment.Shipment_Name,"
          . " donationtype.DonationType_Name,"
          . " orderdetail.OrderDetail_Updatetime,"
          . " product.Product_Mainimage,"
          . " product.Product_name,"
          . " store.Store_name"
          . " FROM `orderdetail`"
          . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
          . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
          . " LEFT JOIN product on orderdetail.Product_ID = product.Product_ID"
          . " LEFT JOIN store on store.Store_ID = product.Store_ID"
          . " WHERE orderdetail.Order_ID = '$row[0]';";
          $result_pd = $conn->query($sql_pd);
          // echo "$sql_pd";
          while ($row_pd = $result_pd->fetch_array()) {
             
             echo "<div class=\"wait-detail\">";
             echo "<div id=\"child-wait\">";
            //   echo "<td>$row_pd[0]</td>";
              echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['11'] ).'"/></div>';
              echo "<span class=\"name-p\">$row_pd[12]</span>";
              echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
              echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
              echo "<span class=\"give-p\">ร้าน $row_pd[13] $row_pd[9]</spans>";
              //   echo "<td>$row_pd[3]</td>";
            //   echo "<td>$row_pd[4]</td>";
            //   echo "<td>$row_pd[5]</td>";
              //   echo "<td>$row_pd[6]</td>";
              echo "</div>";

              echo "<div id=\"child-wait\">";
              if ($row_pd[7]==null and $row_pd[8]==null){
                  echo "<span class=\"status-p\">รอการชำระเงิน</span>"; }
                  else  { 
                    echo "<td>$row_pd[7]</td>";
                    echo "<td>$row_pd[8]</td>";
                        }
                   echo "<span class=\"datetime-p\">$row_pd[10]</span>";
                   echo "</div>";
                   echo "</div>";
          }

      }
     ?>
   
  </div>
      
  <div id="wait-s" class="tabcontent" style="overflow-x:auto;">
    <h3>รอการจัดส่ง</h3>
    <?php
    $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------การจัดส่ง
      . " orderbill.Order_Date,"
      . " orderbill.Order_Status,"
      . " orderbill.Order_Address,"
      . " orderbill.User_ID,"
      . " orderbill.Payment_ID"
      . " FROM orderbill"
      . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
      . " WHERE User_ID ='$User_ID' and Order_Status = 'paid' and orderdetail.OrderDetail_Status='pending' ;";
      // echo"$sql_p<br>";

      
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
          // echo "<table id=\"wait-pay\">";
          $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
          . " orderdetail.Product_Quantity,"
          . " orderdetail.Product_Price,"
          . " orderdetail.OrderDetail_Status,"
          . " orderdetail.Order_ID,"
          . " orderdetail.Product_ID,"
          . " orderdetail.OrderDetail_Lotnumber,"
          . " orderdetail.Shipment_Code,"
          . " shipment.Shipment_Name,"
          . " donationtype.DonationType_Name,"
          . " orderdetail.OrderDetail_Updatetime,"
          . " product.Product_Mainimage,"
          . " product.Product_name,"
          . " store.Store_name"
          . " FROM `orderdetail`"
          . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
          . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
          . " LEFT JOIN product on orderdetail.Product_ID = product.Product_ID"
          . " LEFT JOIN store on store.Store_ID = product.Store_ID"
          . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='pending' ;";
          // echo "$sql_pd";
          $result_pd = $conn->query($sql_pd);
          while ($row_pd = $result_pd->fetch_array()) {
            echo "<div class=\"wait-detail\">";
            echo "<div id=\"child-wait\">";
            //   echo "<td>$row_pd[0]</td>";
            echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['11'] ).'"/></div>';
            echo "<span class=\"name-p\">$row_pd[12]</span>";
            echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
            echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
            echo "<span class=\"give-p\">ร้าน $row_pd[13]  $row_pd[9]</spans>";
            //   echo "<td>$row_pd[3]</td>";
            //   echo "<td>$row_pd[4]</td>";
            //   echo "<td>$row_pd[5]</td>";
            //   echo "<td>$row_pd[6]</td>";
            echo "</div>";

            echo "<div id=\"child-wait\">";
              if ($row_pd[7]==null and $row_pd[8]==null){
                  echo "<span class=\"status-p\">รอการจัดส่ง</span>"; }
                  else  { 
                    echo "<td>$row_pd[7]</td>";
                    echo "<td>$row_pd[8]</td>";
                        }
              
          
                echo "<span class=\"datetime-p\">$row_pd[10]</span>";
                echo "</div>";
                echo "</div>";
               }

      }
      ?>
  </div>

  <div id="shiping-w" class="tabcontent"style="overflow-x:auto;">
    <h3>กำหนดจัดส่ง</h3>
    
    <?php
      $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------กำลังดำเนินการจัดส่ง
      . " orderbill.Order_Date,"
      . " orderbill.Order_Status,"
      . " orderbill.Order_Address,"
      . " orderbill.User_ID,"
      . " orderbill.Payment_ID"
      . " FROM orderbill"
      . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
      . " WHERE User_ID ='$User_ID' and Order_Status = 'paid' and orderdetail.OrderDetail_Status='delivery' ;";
      // echo"$sql_p<br>";

    //   echo "<br><lable>กำลังดำเนินการจัดส่ง</lable>";
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
          // echo "<table id=\"wait-pay\">";
          $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
          . " orderdetail.Product_Quantity,"
          . " orderdetail.Product_Price,"
          . " orderdetail.OrderDetail_Status,"
          . " orderdetail.Order_ID,"
          . " orderdetail.Product_ID,"
          . " orderdetail.OrderDetail_Lotnumber,"
          . " orderdetail.Shipment_Code,"
          . " shipment.Shipment_Name,"
          . " donationtype.DonationType_Name,"
          . " orderdetail.OrderDetail_Updatetime,"
          . " product.Product_Mainimage,"
          . " product.Product_name,"
          . " store.Store_name"
          . " FROM `orderdetail`"
          . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
          . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
          . " LEFT JOIN product on orderdetail.Product_ID = product.Product_ID"
          . " LEFT JOIN store on store.Store_ID = product.Store_ID"
          . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='delivery' ;";
          // echo "$sql_pd";
          $result_pd = $conn->query($sql_pd);
          while ($row_pd = $result_pd->fetch_array()) {
            echo "<div class=\"wait-detail\">";
            echo "<div id=\"child-wait\">";
            //   echo "<td>$row_pd[0]</td>";
            echo '<div class="img-box"> <img id=\'img-inbox\'  src="data:image/jpeg;base64,'.base64_encode( $row_pd['11'] ).'"/></div>';
            echo "<span class=\"name-p\">$row_pd[12]</span>";
            echo"<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
            echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
            echo "<span class=\"give-p\">ร้าน $row_pd[13]  $row_pd[9]</spans>";
            //   echo "<td>$row_pd[3]</td>";
            //   echo "<td>$row_pd[4]</td>";
            //   echo "<td>$row_pd[5]</td>";
            //   echo "<td>$row_pd[6]</td>";
            echo "</div>";
            echo "<div id=\"child-wait\">";
            echo "<span class=\"datetime-p-f\">$row_pd[10]</span>"; 
            echo "<span class=\"shipment_code\">เลขที่พัสดุจัดส่ง $row_pd[7]</td>";
            echo "<span class=\"shipment_name-wait\">จัดส่งโดย $row_pd[8]</td>";
            echo "<a   class=\"button-wait\" href='./Method/Usersubmitorder.php?summitid=$row_pd[0]'>ยืนยันการรับสินค้า</a>";
            echo "</div>";
            echo "</div>";
            }
            
            
      }
    ?>
  </div>


  <div id="finish" class="tabcontent" style="overflow-x:auto;">
    <h3>จัดส่งแล้ว</h3>
    <?php
    $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------จัดส่งเสร็จสิ้น
      . " orderbill.Order_Date,"
      . " orderbill.Order_Status,"
      . " orderbill.Order_Address,"
      . " orderbill.User_ID,"
      . " orderbill.Payment_ID"
      . " FROM orderbill"
      . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
      . " WHERE User_ID ='$User_ID' and Order_Status = 'paid' and orderdetail.OrderDetail_Status='finish' ;";
      // echo"$sql_p<br>";

    //   echo "<br><lable>จัดส่งเสร็จสิ้น</lable>";
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
          // echo "<table id=\"wait-pay\">";
          $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
          . " orderdetail.Product_Quantity,"
          . " orderdetail.Product_Price,"
          . " orderdetail.OrderDetail_Status,"
          . " orderdetail.Order_ID,"
          . " orderdetail.Product_ID,"
          . " orderdetail.OrderDetail_Lotnumber,"
          . " orderdetail.Shipment_Code,"
          . " shipment.Shipment_Name,"
          . " donationtype.DonationType_Name,"
          . " orderdetail.OrderDetail_Updatetime,"
          . " product.Product_Mainimage,"
          . " product.Product_name,"
          . " store.Store_name"
          . " FROM `orderdetail`"
          . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
          . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
          . " LEFT JOIN product on orderdetail.Product_ID = product.Product_ID"
          . " LEFT JOIN store on store.Store_ID = product.Store_ID"
          . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='finish' ;";
          // echo "$sql_pd";
          $result_pd = $conn->query($sql_pd);
          while ($row_pd = $result_pd->fetch_array()) {
            echo "<div class=\"wait-detail\">";
            echo "<div id=\"child-wait\">";
            //   echo "<td>$row_pd[0]</td>";
              echo '<div class="img-box"> <img id=\'img-inbox\'  src="data:image/jpeg;base64,'.base64_encode( $row_pd['11'] ).'"/></div>';
              echo "<span class=\"name-p\">$row_pd[12]</span>";
              echo"<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
              echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
              echo "<span class=\"give-p\">ร้าน $row_pd[13]  $row_pd[9]</spans>";
            //   echo "<td>$row_pd[3]</td>";
            //   echo "<td>$row_pd[4]</td>";
            //   echo "<td>$row_pd[5]</td>";
            //   echo "<td>$row_pd[6]</td>";
            echo "</div>";

            echo "<div id=\"child-wait\">";
            echo "<span class=\"datetime-p-f\">$row_pd[10]</span>"; 
             echo "<span class=\"shipment_code\">เลขที่พัสดุจัดส่ง $row_pd[7]</td>";
              echo "<span class=\"shipment_name\">จัดส่งโดย $row_pd[8]</td>";
              echo "<a class=\"button-f\" href='User_givescore.php?reviewid=$row_pd[5]&order_id=$row_pd[0]&productlot_id=$row_pd[6]'>ให้คะแนนสินค้า</a>";
              echo "</div>";
              echo "</div>";
          }

      }
      ?>
  </div>

  <div id="complete" class="tabcontent"  style="overflow-x:auto;">
    <h3>จัดส่งและให้คะแนนรีวิวเรียบร้อย</h3>
    
    <?php
      $sql_p = "SELECT DISTINCT orderbill.Order_ID," //-----------------------------------------------------------------------------------จัดส่งเสร็จสิ้น+ให้คะแนน
      . " orderbill.Order_Date,"
      . " orderbill.Order_Status,"
      . " orderbill.Order_Address,"
      . " orderbill.User_ID,"
      . " orderbill.Payment_ID"
      . " FROM orderbill"
      . " JOIN orderdetail ON orderbill.Order_ID = orderdetail.Order_ID"
      . " WHERE User_ID ='$User_ID' and Order_Status = 'paid' and orderdetail.OrderDetail_Status='complete' ;";
      // echo"$sql_p<br>";

    //   echo "<br><lable>จัดส่งและให้คะแนนรีวิวเรียบร้อย</lable>";
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
            echo "<td>เสร็จสิ้น</td>";
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
          // echo "<table id=\"wait-pay\">";
          $sql_pd = "SELECT orderdetail.OrderDetail_ID,"
          . " orderdetail.Product_Quantity,"
          . " orderdetail.Product_Price,"
          . " orderdetail.OrderDetail_Status,"
          . " orderdetail.Order_ID,"
          . " orderdetail.Product_ID,"
          . " orderdetail.OrderDetail_Lotnumber,"
          . " orderdetail.Shipment_Code,"
          . " shipment.Shipment_Name,"
          . " donationtype.DonationType_Name,"
          . " orderdetail.OrderDetail_Updatetime,"
          . " product.Product_Mainimage,"
          . " product.Product_name,"
          . " store.Store_name"
          . " FROM `orderdetail`"
          . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
          . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
          . " LEFT JOIN product on orderdetail.Product_ID = product.Product_ID"
          . " LEFT JOIN store on store.Store_ID = product.Store_ID"
          . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='complete' ;";
          // echo "$sql_pd";
          $result_pd = $conn->query($sql_pd);
          while ($row_pd = $result_pd->fetch_array()) {
             
            echo "<div class=\"wait-detail\">";
            echo "<div id=\"child-wait\">";
            //   echo "<td>$row_pd[0]</td>";
            echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row_pd['11'] ).'"/></div>';
            echo "<span class=\"name-p\">$row_pd[12]</span>";
            echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
            echo "<span class=\"price-p\">ราคา $row_pd[2] บาท</span>";
            echo "<span class=\"give-p\">ร้าน $row_pd[13] $row_pd[9]</spans>";
            echo "</div>";
            //   echo "<td>$row_pd[3]</td>";
            //   echo "<td>$row_pd[4]</td>";
            //   echo "<td>$row_pd[5]</td>";
            //   echo "<td>$row_pd[6]</td>";
            echo "<div id=\"child-wait\">";
            echo "<span class=\"datetime-p-f\">$row_pd[10]</span>"; 
            echo "<span class=\"shipment_code\">เลขที่พัสดุจัดส่ง $row_pd[7]</td>";
            echo "<span class=\"shipment_name-f\">จัดส่งโดย $row_pd[8]</td>";
             
              echo "</div>";
              echo "</div>";
          }

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
      tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>


</body>
</html>