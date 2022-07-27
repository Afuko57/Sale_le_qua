<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit profile</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

  
  <link rel="stylesheet" type="text/css" href="profile/edit-profile.css?V=1">

</head>
<body>
  <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

  <div class='container'>
  
  <div class="container-form">
  
  <div id="wrap-form">
  <div class="row">
      <div class="col-25">
        <label for="pname">รูปโปรไฟล์</label>
      </div>
      <div class="col-75">
      <!-- <form>
        <input type="file" class="add-button" onchange="preview()">
        <div class="imgprofile-cover">
        <img id="thumb"  width="300" height="300" src="https://occ-0-1722-1723.1.nflxso.net/dnm/api/v6/9pS1daC2n6UGc3dUogvWIPMR_OU/AAAABV-kOwbRYntbS3ZUPqpgvFrNbnBEOhnHKb4hQVtJsRQlzUUY3LWHvbPODoOTQhN18l-SvuHQ9fjpEAGVjTzDGoCY5BWCaUMc-nKGTnzVi61hpdGk.jpg?r=43c" width="150px"/>
        </div>
      </form> -->
      </div>
    </div>
    <?php 
    include './Method/DBconfig.php';
    if (isset($_SESSION['user_id'])) //เช็คการlogin
        {
          $User_ID = $_SESSION['user_id'];
          $sql_search = "SELECT
          `User_Firstname`,`User_Lastname`,`User_Tel`,`User_Email`,`User_Address`
          FROM `user`
          WHERE `User_ID` ='$User_ID' ";



          // echo "$sql_search";
          $result = $conn->query($sql_search);
          $row = $result->fetch_array();
        }
      ?>
    
    <form method="POST" action="./Method/Userprofileedit.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="pname">ชื่อ</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo "$row[0]";?>" id="pname" name="firstname" placeholder="ชื่อ..">
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="pname">นามสกุล</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo "$row[1]";?>" id="pname" name="lastname" placeholder="นามสกุล..">
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="pname">เบอร์โทร</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo "$row[2]";?>" id="pname" name="tel" placeholder="011-1111111..">
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="pname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo "$row[3]";?>" id="pname" name="email" placeholder="Email..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="detail-p">ที่อยู่</label>
      </div>
      <div class="col-75">
        <input type="text" id="detail-p" value="<?php echo "$row[4]";?>" name="address" placeholder="เขียนรายละเอียด.." style="height:200px">
      </div>
    </div>
   
  
  
    <div class="row">
      <input type="submit" name="userprofileedit" value="บันทึกข้อมูล">
    </div>
  </form>
</div>
</div>
<script>
   function preview() {
   thumb.src=URL.createObjectURL(event.target.files[0]);
}
</script>
  
  <!----------------------container END---------------------->
  </div>
 

<!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
  
</body>
</html>
