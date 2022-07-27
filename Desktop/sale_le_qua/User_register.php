<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" type="text/css" href="style-home/style.css">
  <!--------------------NAV---------------------->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="style-home/nav.css">
<!--------------------Footer---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/footer.css">
  <!--------------------Register---------------------->
  <link rel="stylesheet" type="text/css" href="login-register/register.css?v=<?php echo time(); ?>">
</head>
<body>
<!--nav--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--nav-->
  <div class='container'>

    <div class="register-main">
    
      <div class="register-box">
        
        <form method="POST" action="./Method/Userregister.php">
          <spa class="register-text">ลงทะเบียนผู้ใช้</span>
          <input type="text" id="user-name" name="User_Username" placeholder="ชื่อผู้ใช้" required>
      
        
          <input type="password" id="pass" value="" name="User_Password" placeholder="รหัสผ่าน" required>
          
          <input type="password" id="confirm-pass" value="" name="User_ConfirmPassword" placeholder="ยืนยันรหัส" required>
          
          
          <input type="text" id="email" value="" name="User_Email" placeholder="Email" required>
          
          
          <input type="text" id="name" value="" name="User_Firstname" placeholder="ชื่อ" required>
          
       
          <input type="text" id="lname" value="" name="User_Lastname" placeholder="นามสกุล" required>

          
          <input type="text" id="tel" value="" name="User_Tel" placeholder="เบอร์โทร" required>

          
          <input type="text" id="address" value="" name="User_Address1" placeholder="บ้านเลขที่" required>
          <input type="text" id="address" value="" name="User_Address2" placeholder="ตำบล" required>
          <input type="text" id="address" value="" name="User_Address3" placeholder="อำเภอ" required>
          <input type="text" id="address" value="" name="User_Address4" placeholder="จังหวัด" required>
          <input type="text" id="address" value="" name="User_Address5" placeholder="เลขรหัสไปรษณีย์" required>

         
          </select>
        
          <input type="submit" name="registeruser" value="สมัครสมาชิก">
        </form>
      </div>

    </div>
    
  <!----------------------container END---------------------->
  </div>
 <!--FOOTER-->
 <div>
   <?php 
   require_once("nav_footer_cate/footer.php"); 
   ?>
  </div>
 <!--FOOTER-->
</body>
</html>