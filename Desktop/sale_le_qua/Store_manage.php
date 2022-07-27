<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_manage</title>
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/style.css" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/side-menu.css" />
    <link rel="stylesheet" type="text/css" href="Admin/Navbar/table.css" />
</head>

<!-- <style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    img {
        width: 50px;
        height: 50px;
    }
</style> -->


<body>
    <?php
    include './Method/DBconfig.php';

    $keyword = "";
    if (isset($_POST['keyword']))
        $keyword = trim($_POST['keyword']);
    // $query = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_row($query);
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
      <button
        class="tablinks" onclick="window.location.href='User_manage.php'">ผู้ใช้
      </button>
      <button class="tablinks"onclick="window.location.href='Store_manage.php'">ร้านค้า</button>
      <button class="tablinks" onclick="window.location.href='./Dashboard/AdDashBoard_Year.php'">แดชบอร์ด</button>
      <button class="tablinks" onclick="window.location.href='./Donation_manage.php'"   id="defaultOpen">องค์กรการกุศล</button>
      <button class="tablinks" onclick="window.location.href='./Cost.php'">ต้นทุน</button>
    </div>

    <a href="./Store_register.php">Insert store</a>
    <form method="POST">
      <input type="search" placeholder="SearchProduct" aria-label="Search"name="keyword">
      <button type="submit">Search</button>
    </form>
    <div id="store-manage" class="tabcontent">
    <?php 
    $sql = "SELECT * FROM `store` WHERE `Store_ID` LIKE '%$keyword%' or `Store_Name` LIKE '%$keyword%' ORDER BY `Store_ID` ";
    //echo "$sql";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {
    


        echo "<table id=\"Usertable\">";
        echo "<tr><td colspan=2>"; 
        if(trim($keyword!=""))echo "ผลลัพธ์การค้นพบ $keyword ";
        echo "ค้นพบ ".$result->num_rows." รายการ</td></tr>";
        
    
        echo "<tr>
            <th>รหัสร้าน</th>
            <th>ชื่อร้าน</th>
            <th>เลขบัญชี</th>
            <th>ประเภทบัญชี</th>
            <th>เบอร์โทร</th>
            <th>ที่อยู่</th>
            <th>รูป</th>
            <th>เพิ่ทรูป</th>
            <th>การบริจาค</th>
            <th>สถานะ</th>
            <th>Accountupdate</th>
            <th>Accountcreate</th>
            <th>เจ้าของ</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>";

        while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row[0] ."</td>";
                echo "<td>" . $row[1]."</td>";
                echo "<td>" . $row[2] ."</td>";
                echo "<td>" . $row[3] ."</td>";
                echo "<td>" . $row[4] ."</td>";
                echo "<td>" . $row[5] ."</td>";
                echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['6'] ).'"/></td>';
                echo "<td><a href=\"./Store_profileaddimage.php?storeaddimage_ID=$row[0]\"> Add </a></td>";
                echo "<td>" . $row[7] ."</td>";
                echo "<td>" . $row[8] ."</td>";
                echo "<td>" . $row[9] ."</td>";
                echo "<td>" . $row[10] ."</td>";
                echo "<td>" . $row[11] ."</td>";
                echo "<td><a href=\"./Store_edit.php?storeedit_ID=$row[0]\"> Edit </a></td>";
                echo "<td><a href=\"./Method/Storedelete.php?delete=$row[0]\"> Delete </a></td>";
                echo "<tr>";
                // echo "<td>" . $row[8] ."</td>";
                // echo "<td> <div> <img data-u='image' src='./Method/Userdisplay.php?id=". $row[0] . "' ></div></td>";  ///OLD input
            }
    echo "</table>"; }
    else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </div>
</body>

</html>