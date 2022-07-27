<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="style-home/style.css">
  <!--------------------NAV---------------------->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="style-home/nav.css">
<!--------------------Footer---------------------->
  <link rel="stylesheet" type="text/css" href="style-home/footer.css">
  <!--------------------Register---------------------->
  <link rel="stylesheet" type="text/css" href="login-register/login.css?v=<?php echo time(); ?>">
</head>
<body>
     <!--nav--><div><?php require_once("nav_footer_cate/navbar.php"); ?></div><!--nav-->
  <div class='container'>

<div class="login-main">

  <div class="login-box">
    
    <form method="post" action="./Method/Userlogin.php">
      <spa class="login-text">เข้าสู่ระบบ</span>
      <input type="text" name="username" id="user-name" name="firstname" placeholder="ชื่อผู้ใช้">
  
    
      <input type="password" id="pass" name="userpassword" placeholder="รหัสผ่าน"><br>
     
      <input type="checkbox" value="lsRememberMe" id="rememberMe">
       <label class="rememberMe">จดจำผู้ใช้</label>
        <a href="./User_register.php" class="regis-page" >สมัครสมาชิก</a>
      </select>
    
      <input type="submit" name="userlogin" value="เข้าสู่ระบบ">
    </form>

  </div>

</div>

<!----------------------container END---------------------->
</div>

 <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
</body>
</html>