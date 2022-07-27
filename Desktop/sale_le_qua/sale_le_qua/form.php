<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
  <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

  <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">



</head>
<body>
  <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

  <div class='container'>
  
  <div class="container-form">
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="pname">ชื่อสินค้า</label>
      </div>
      <div class="col-75">
        <input type="text" id="pname" name="firstname" placeholder="ชื่อสินค้า..">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="detail-p">รายละเอียดสินค้า</label>
      </div>
      <div class="col-75">
        <textarea id="detail-p" name="detail-p" placeholder="เขียนรายละเอียด.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="cate-p">ประเภทสินค้า</label>
      </div>
      <div class="col-75">
        <select id="cate-p" name="cate-p">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
      </div>
    </div>
   <br>
  
  
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

  
  <!----------------------container END---------------------->
  </div>
 

<!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->
  
</body>
</html>
