<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">




  <link rel="stylesheet" type="text/css" href="tracking/table.css?V=1">
  <link rel="stylesheet" type="text/css" href="tracking/side-menu.css?V=1">
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

    </div>


    <?php
        include './Method/DBconfig.php';
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

        echo "<lable>รอชำระสินค้า</lable>";
        $result = $conn->query($sql_p);
        while ($row = $result->fetch_array()) {
            echo "<table id=wait-pay>";
            echo "<tr>";
                echo "<th>Order_ID</th>";
                echo "<th>Order_Date</th>";
                echo "<th>Order_Status</th>";
                echo "<th>Order_Address</th>";
                echo "<th>User_ID</th>";
                echo "<th>Payment_ID</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<table>";
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
            . " orderdetail.OrderDetail_Updatetime"
            . " FROM `orderdetail`"
            . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE orderdetail.Order_ID = '$row[0]';";
            $result_pd = $conn->query($sql_pd);
            // echo "$sql_pd";
            while ($row_pd = $result_pd->fetch_array()) {
                echo "<tr>";
                echo "<td>$row_pd[0]</td>";
                echo "<td>$row_pd[1]</td>";
                echo "<td>$row_pd[2]</td>";
                echo "<td>$row_pd[3]</td>";
                echo "<td>$row_pd[4]</td>";
                echo "<td>$row_pd[5]</td>";
                echo "<td>$row_pd[6]</td>";
                if ($row_pd[7]==null){
                    echo "<td>รอการชำระเงิน</td>"; }else{ echo "<td>$row_pd[7]</td>";}
                if ($row_pd[8]==null){
                    echo "<td>รอการชำระเงิน</td>"; }else{ echo "<td>$row_pd[8]</td>";}
                echo "<td>$row_pd[9]</td>";
                echo "<td>$row_pd[10]</td>";
                echo "</tr>";
            }
            echo "</table>";
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
                echo "<th>Order_ID</th>";
                echo "<th>Order_Date</th>";
                echo "<th>Order_Status</th>";
                echo "<th>Order_Address</th>";
                echo "<th>User_ID</th>";
                echo "<th>Payment_ID</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<table>";
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
            . " orderdetail.OrderDetail_Updatetime"
            . " FROM `orderdetail`"
            . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='pending' ;";
            // echo "$sql_pd";
            $result_pd = $conn->query($sql_pd);
            while ($row_pd = $result_pd->fetch_array()) {
                echo "<tr>";
                echo "<td>$row_pd[0]</td>";
                echo "<td>$row_pd[1]</td>";
                echo "<td>$row_pd[2]</td>";
                echo "<td>$row_pd[3]</td>";
                echo "<td>$row_pd[4]</td>";
                echo "<td>$row_pd[5]</td>";
                echo "<td>$row_pd[6]</td>";
                if ($row_pd[7]==null){
                    echo "<td>รอการจัดส่ง</td>"; }
                    else{ echo "<td>$row_pd[7]</td>";}
                if ($row_pd[8]==null){
                    echo "<td>รอการจัดส่ง</td>"; }
                    else{ echo "<td>$row_pd[8]</td>";}
                echo "<td>$row_pd[9]</td>";
                echo "<td>$row_pd[10]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

    <div id="shiping-w" class="tabcontent">
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

        echo "<br><lable>กำลังดำเนินการจัดส่ง</lable>";
        $result = $conn->query($sql_p);
        while ($row = $result->fetch_array()) {
            echo "<table id=wait-pay>";
            echo "<tr>";
                echo "<th>Order_ID</th>";
                echo "<th>Order_Date</th>";
                echo "<th>Order_Status</th>";
                echo "<th>Order_Address</th>";
                echo "<th>User_ID</th>";
                echo "<th>Payment_ID</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<table>";
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
            . " orderdetail.OrderDetail_Updatetime"
            . " FROM `orderdetail`"
            . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='delivery' ;";
            // echo "$sql_pd";
            $result_pd = $conn->query($sql_pd);
            while ($row_pd = $result_pd->fetch_array()) {
                echo "<tr>";
                echo "<td>$row_pd[0]</td>";
                echo "<td>$row_pd[1]</td>";
                echo "<td>$row_pd[2]</td>";
                echo "<td>$row_pd[3]</td>";
                echo "<td>$row_pd[4]</td>";
                echo "<td>$row_pd[5]</td>";
                echo "<td>$row_pd[6]</td>";
                echo "<td>$row_pd[7]</td>";
                echo "<td>$row_pd[8]</td>";
                echo "<td>$row_pd[9]</td>";
                echo "<td>$row_pd[10]</td>";
                echo "<td><a href='./Method/Usersubmitorder.php?summitid=$row_pd[0]'>ยืนยันการรับสินค้า</a></td>";
                echo "</tr>";
            }
            echo "</table>";
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

        echo "<br><lable>จัดส่งเสร็จสิ้น</lable>";
        $result = $conn->query($sql_p);
        while ($row = $result->fetch_array()) {
            echo "<table>";
            echo "<tr>";
                echo "<th>Order_ID</th>";
                echo "<th>Order_Date</th>";
                echo "<th>Order_Status</th>";
                echo "<th>Order_Address</th>";
                echo "<th>User_ID</th>";
                echo "<th>Payment_ID</th>";
                echo "</tr>";
                echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            if ($row[5]==null){
                echo "<td><a href=\"./payment.php?paybillid=$row[0]\">Click</a></td>";
            }else{
                echo "<td>$row[5]</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<table>";
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
            . " orderdetail.OrderDetail_Updatetime"
            . " FROM `orderdetail`"
            . " LEFT JOIN donationtype on orderdetail.Donation_typeID = donationtype.DonationType_ID"
            . " LEFT JOIN shipment on orderdetail.Shipment_ID = shipment.Shipment_ID"
            . " WHERE orderdetail.Order_ID = '$row[0]' And orderdetail.OrderDetail_Status='finish' ;";
            // echo "$sql_pd";
            $result_pd = $conn->query($sql_pd);
            while ($row_pd = $result_pd->fetch_array()) {
                echo "<tr>";
                echo "<td>$row_pd[0]</td>";
                echo "<td>$row_pd[1]</td>";
                echo "<td>$row_pd[2]</td>";
                echo "<td>$row_pd[3]</td>";
                echo "<td>$row_pd[4]</td>";
                echo "<td>$row_pd[5]</td>";
                echo "<td>$row_pd[6]</td>";
                echo "<td>$row_pd[7]</td>";
                echo "<td>$row_pd[8]</td>";
                echo "<td>$row_pd[9]</td>";
                echo "<td>$row_pd[10]</td>";
                echo "<td><a href='User_givescore.php?reviewid=$row_pd[5]&order_id=$row_pd[0]'>ให้คะแนนสินค้า</a></td>";
                echo "</tr>";
            }
            echo "</table>";
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

  

</body>
</html>


