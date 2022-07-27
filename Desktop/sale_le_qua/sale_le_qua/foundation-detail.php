<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="foundation-promotion/foundation-detail.css?V=1">
</head>
<body>
  <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

  <div class='container'>
  
  <div class="foundation-main">
    <?php 
    $don=$_GET['donation'];
    $sqlp = "SELECT
    donation.Donation_Name,
    donation.Donation_Detail,
    donation.Donation_ProfileImage,
    donationtype.DonationType_Name,
    donation.Donation_ID,
    donation.Donation_Need
FROM
    donation
    JOIN donationtype on donation.DonationType_ID = donationtype.DonationType_ID
    WHERE donation.Donation_ID = '$don';";
    // echo $sqlp;
        $result = $conn->query($sqlp);
        $row = $result->fetch_array(); 
    ?>
    
  <h1><?php echo "$row[0]"; ?><h1>
      <div class="cover-img-f">
        <!-- <img src="https://occ-0-1723-1722.1.nflxso.net/dnm/api/v6/9pS1daC2n6UGc3dUogvWIPMR_OU/AAAABaZX3--FrdYIv5C7iscHT1i5RcDSSnJ5E27Eq5uHwSBjFrJq95gIUfTKDJ00dik1w5ZaPcZByvIlzzjFOGPGf6HXmGb53m5dHQzqMUpAKCr54wCe.jpg?r=480" class="imgF-storeresize"> -->
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['2'] ).'" class="imgF-storeresize"">';?>
      </div>

      <div class="flex-container">
      <div class="child">
        ข้อมูลทั่วไป<br>
        <span class="need-detail">
        <?php echo "$row[1]"; ?>
        </span>
      </div>
      <div class="child">
        ความต้องการ<br>
      <span class="need-detail">
        <?php echo "$row[5]"; ?>
      </span>
      </div>
      
      
    </div>


    <!--<button class="button"></button>-->
 
    </div>


  
  
  <!----------------------container END---------------------->
  </div>

<!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
  
</body>
</html>