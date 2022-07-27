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
    if (isset($_SESSION['donation_id'])) //เช็คการlogin
        {
          $Don_ID = $_SESSION['donation_id'];
          $sql_search = "SELECT
                `Donation_Need`
            FROM
                `donation`
            WHERE `Donation_ID` = '$Don_ID';";



          // echo "$sql_search";
          $result = $conn->query($sql_search);
          $row = $result->fetch_array();
        }
      ?>
    
    <form method="POST" action="./Method/Donationneededit.php" enctype="multipart/form-data">
    <div class="row">
      
      <div class="col-25">
        <label for="detail-p">ความต้องการ</label>
      </div>
      <div class="col-75">
        <input type="text" id="detail-p" value="<?php echo "$row[0]";?>" name="need" placeholder="เขียนรายละเอียด.." style="height:200px">
      </div>
    </div>
   
  
  
    <div class="row">
      <input type="submit" name="donationneededit" value="บันทึกข้อมูล">
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
