<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">

</head>

<style>
    .wrap-button{
      height: auto;
      /* background-color: red; */
      padding-top: 150px;
      padding-bottom: 50px;
    } 
    h1{
      text-align:center;
    }
      .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      grid-column-gap: 5px;
      grid-row-gap: 5px;
      justify-items: center;
    }

    .grid-content {
      height: 300px;
      width: 300px;
      /* padding: 15px; */
      text-align: center;
      margin-top: 50px;
    }

    /* Colours */

    /* .red {
      background-color: rgb(255, 77, 77);
    }

    .blue {
      background-color: rgb(62, 130, 255);
    }

    .yellow {
      background-color: rgb(255, 255, 118);
    }

    .green {
      background-color: rgb(128, 255, 128);
    } */
    #img-r{
      width: 100%;
      height: auto;
    }
    .button {
    background-color: orange;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    width: 100%;
}
    
</style>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->

<div class='container'>

<div class="wrap-button">

<h1>รายงานการแบ่งปัน</h1>
<div class="grid-container">
      <div class="grid-content red"><img id="img-r" src="img/tri4.JPG"><a href="pdf/tri4.php" class="button">ดูเพิ่มเติม</a></div>
      <div class="grid-content blue"><img id="img-r" src="img/tri3.JPG"><a href="pdf/tri3.php" class="button">ดูเพิ่มเติม</a></div>
      <div class="grid-content yellow"><img id="img-r" src="img/tri2.JPG"><a href="pdf/tri2.php" class="button">ดูเพิ่มเติม</a></div>
      <div class="grid-content green"><img id="img-r" src="img/tri1.JPG"><a href="pdf/tri1.php" class="button">ดูเพิ่มเติม</a></div>
</div>
</div>

</div>

  <!--FOOTER--><div><?php require_once("nav_footer_cate/footer.php"); ?></div><!--FOOTER-->

    
</body>
</html>