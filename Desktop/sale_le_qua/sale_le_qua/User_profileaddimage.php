<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_addimage</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />

<link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
<link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel="stylesheet" type="text/css" href="star/style.css?V=1">
</head>

<style>
    img {
        width : 100px;
        height: 100px;
    }
</style>

<body>
      <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     
<div class='container'>
<div class="container-form">
    <?php
        include './Method/DBconfig.php';
        
        if(isset($_SESSION['user_id']))
            {
                $e_id=$_SESSION['user_id'];
                $sql = "SELECT * FROM `user` where `User_id` = '$e_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();
                $e_pro=$row['User_Profileimage'];
            }
    ?>
    <?php echo"<form method=\"POST\" action=\"./Method/Useraddprofileimage.php?useraddimage_ID=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Profileimage</label><br>
        <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $e_pro ).'"/></td>';?> <br>
        <input type="file" name="User_Profileimage" /><br>
        <input type="submit" name="useraddimage" value="submit">
    </form>
    <button onclick="location.href='./profile.php'">Back</button>






    </div>

</div>    

</body>
</html>