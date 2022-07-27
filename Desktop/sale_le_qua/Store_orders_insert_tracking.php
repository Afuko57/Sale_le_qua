<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert tracking</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

    <link rel="stylesheet" type="text/css" href="tracking/table.css?V=1">
   
</head>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

<div class='container'>
<div class="container-form">
    
    <?php
    include './Method/DBconfig.php';
    ?>
    
    <?php
    if (isset($_GET['order_tracking']))
    {
        $order_tracking_id = $_GET['order_tracking'];
        // echo "$order_tracking_id<br>";

        $sql_order = "SELECT * "
        . " FROM `orderdetail`"
        . " WHERE OrderDetail_ID = '$order_tracking_id'"
        . " ORDER BY `OrderDetail_ID`;";
        // echo"$sql_order<br>";

        echo "<lable><h3>กรอกช่องทางการจัดส่ง</h3></lable>";
        $result = $conn->query($sql_order);
        $row = $result->fetch_array();
        
    }
    ?>
    <?php
    echo "<form method=\"POST\" action=\"./Method/Storeordersaddtracking.php?order_tracking=$order_tracking_id\">";
    ?>
    <table table id="wait-pay2">
        <!-- <tr><th style="width: 20%;">OrderDetail_ID</th><td><?php echo "$row[0]"  ?></td></tr>
        <tr><th>Product_Quantity</th><td><?php echo "$row[1]"  ?></td></tr>
        <tr><th>Product_Price</th><td><?php echo "$row[2]"  ?></td></tr>
        <tr><th>OrderDetail_Status</th><td><?php echo "$row[3]"  ?></td></tr>
        <tr><th>Order_ID</th><td><?php echo "$row[4]"  ?></td></tr>
        <tr><th>Product_ID</th><td><?php echo "$row[5]"  ?></td></tr>
        <tr><th>OrderDetail_Lotnumber</th><td><?php echo "$row[6]"  ?></td></tr> -->
        <tr><th>เลขที่พัศดุ</th><td><input type="text" value=""name="Shipment_Code" placeholder="รหัสการจัดส่งสินค้า"></td></tr>
        <tr>
            <th>จัดส่งโดย</th>
        <td>
        <select name="Shipment_ID">
            <option value="1">ไปรษณีย์ไทย</option>
            <option value="2">KERRY EXPRESS</option>
            <option value="3">BEST EXPRESS</option>
            <option value="4">NINJA VAN</option>
            <option value="5">FLASH EXPRESS</option>
            <option value="6">SCG EXPRESS</option>
            <option value="7">J&T EXPRESS</option>
            <option value="8">DHL EXPRESS</option>
            <option value="9">LALAMOVE</option>
            <option value="10">ALPHA FAST</option>
        </select><br>
        </td>
        </tr>
        <!-- <tr><th>Donation_typeID</th><td><?php echo "$row[9]"  ?></td></tr> -->
        <tr><th></th><td><input type="submit" name="inserttracking" value="submit"></td></tr>
    </table>
    </form>
    </div>

</div>
</body>
</html>