<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Manage</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  
  <link rel="stylesheet" type="text/css" href="profile/style.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/side-menu.css?V=1">
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="profile/flex-profile.css?V=1">
  <link rel="stylesheet" type="text/css" href="profile/element.css?V=1">

</head>

<body>
  <!-- Nav --> <?php require_once("nav_footer_cate/navbar.php"); ?></div>
  <?php 
  include './Method/DBconfig.php';
  ?>
  <style>
    .edit_profile_button{
    font-size: 18px;
    border: none;
    display: inline-block;
    padding: 5px 10px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    color: rgb(0, 0, 0)!important;
    border:2px solid #ffffff;
    background-color: #FF9C50;
    border-radius: 10px;
    margin-top: 10px;
    transition: 0.3s;
  }


  .edit_profile_button:hover{
      color: rgb(255, 255, 255)!important;
      background-color:rgb(9, 0, 58)!important;
  }
  .edit_profile_button>p:hover{
    color: rgb(255, 255, 255)!important;
  }

  </style>

  <div class="container">
      <div class="cover-page">



        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'profile')" id="defaultOpen">โปรไฟล์</button>
          <button class="tablinks" onclick="openCity(event, 'like')">ถูกใจ</button>

        </div>

        <?php if (isset($_SESSION['user_id'])) //เช็คการlogin
        {
          $User_ID = $_SESSION['user_id'];
          $sql_search = "SELECT
          `User_Firstname`,`User_Lastname`,`User_Tel`,`User_Email`,`User_Address`,`User_Profileimage`
          FROM `user`
          WHERE `User_ID` ='$User_ID' ";



          // echo "$sql_search";
          $result = $conn->query($sql_search);
          $row = $result->fetch_array();
        }
        ?>

    <div id="profile" class="tabcontent">

      <h3>โปรไฟล์</h3>


      <div class="flex-container">

        <div class="child">

          <div class="left-img-cover">
            <div class="imgprofile-cover">

              <?php 
              if($row['5']!=null){
              echo '<img class="img-profile" width="300" height="300" src="data:image/jpeg;base64,'.base64_encode( $row['5'] ).'"/>';
              } else{
              echo '<img class="img-profile" width="300" height="300" src="./Comment/pleaseupload.jpg"/>';   
              }
              ?>
            
              <!-- <img
                src="https://occ-0-1722-1723.1.nflxso.net/dnm/api/v6/9pS1daC2n6UGc3dUogvWIPMR_OU/AAAABV-kOwbRYntbS3ZUPqpgvFrNbnBEOhnHKb4hQVtJsRQlzUUY3LWHvbPODoOTQhN18l-SvuHQ9fjpEAGVjTzDGoCY5BWCaUMc-nKGTnzVi61hpdGk.jpg?r=43c"
                class="img-profile" width="300" height="300"> -->
            </div>
          </div>

          <div class="left-txt">

            <p class="l-user"><?php echo "$_SESSION[user]";?></p>
            
            <a class="edit_profile_button" href="./User_profileaddimage.php">
              <p class="Edit">เพิ่มรูปภาพ</p>
            </a>

            <br>

            <a class="edit_profile_button" href="Edit_profile.php">
              <p class="Edit">แก้ไขข้อมูล</p>
            </a>
          </div>

        </div>


        <div class="child">
          <div class="right-txt">
            <span class="txt-m">ชื่อ : </span> <span><?php echo "$row[0]";?></span><br><br>
            <span class="txt-m">นามสกุล : </span> <span><?php echo "$row[1]";?></span><br><br>
            <span class="txt-m">เบอร์โทร : <span> <span><?php echo "$row[2]";?></span><br><br>
            <span class="txt-m">Email : </span> <span><?php echo "$row[3]";?></span><br><br>
            <span class="txt-m">ที่อยู่ : </span> <span class="address-txt"><?php echo "$row[4]";?></span><br>
          </div>
        </div>

      </div>
    </div>


    <div id="like" class="tabcontent">
      <h3>ถูกใจ</h3>

      <?php
      $userid = $_SESSION['user_id'];
      $sqllk = "SELECT
          liked.Product_ID,
          liked.Productlot_ID,
          product.Product_Name,
          product.Product_Detail,
          product.Product_Mainimage,
          productlot.Productlot_SellPrice,
          productlot.Productlot_Exdate,
          productlot.Productlot_Extype
      FROM
          liked
      left JOIN product on product.Product_ID = liked.Product_ID
      left JOIN productlot on productlot.Productlot_ID = liked.Productlot_ID
      WHERE liked.User_ID = '$userid'";
      // echo "$sqllk"; 
      $result = $conn->query($sqllk);
      while ($row = $result->fetch_array()){
        echo "<div class=\"wait-detail\">";
        echo "<div id=\"child-wait\">";
        echo '<div class="img-box"> <img id=\'img-inbox\' src="data:image/jpeg;base64,'.base64_encode( $row['4'] ).'"/></div>';
        echo "<span class=\"name-p\">$row[2]</span>";
        // echo "<span class=\"total-p\">จำนวน $row_pd[1] ชิ้น</span>";
        echo "<span class=\"price-p\">ราคา $row[5] บาท</span>";
        echo "<span class=\"code-p\">NO.สินค้า $row[0]</span>";
       
       
        // echo "<span class=\"give-p\">$row_pd[9]</span>";
       
        echo "</div>";
        echo "<div id=\"child-wait\">";
        // if ($row_pd[7]==null and $row_pd[8]==null){
        //   echo "<span class=\"status-p\">รอการจัดส่ง</span>"; }
        // else{ 
        // echo "<td>รหัสติดตามการจัดส่ง $row_pd[7]</td>";
        // echo "<td> จัดส่งโดย$row_pd[8]</td>";}
        echo "<span class=\"datetime-p\">$row[7] $row[6]</span>";
        echo "<span class=\"lot-p\">ล๊อตที่ $row[1]</span>";
        echo "<td><a class=\"button-f\" href='./Product_detail.php?productid=$row[0]&&productlot=$row[1]'>ดูเพิ่มเติม</a></td>";
        echo "<td><a class=\"delete-like\" href='./Method/Likedel.php?productid=$row[0]&&productlot=$row[1]&&like=1'>เลิกถูกใจ</a></td>";
        echo "</div>";
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

</body>

</html>