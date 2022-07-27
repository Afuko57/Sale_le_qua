<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_edit</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />

<link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
<link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel="stylesheet" type="text/css" href="star/style.css?V=1">
</head>
<body>
      <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     
<div class='container'>
<div class="container-form">
    <?php
        include './Method/DBconfig.php';
        if(isset($_GET['useredit_ID']))
            {
                $e_id=$_GET['useredit_ID'];
                $sql = "SELECT * FROM `user` where `User_ID` = '$e_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_array();
                $e_name=$row[1];
                // $e_pass=$row[2];
                $e_email=$row[3];
                $e_first=$row[4];
                $e_last=$row[5];
                $e_tel=$row[6];
                $e_add=$row[7];
                // $e_pro=$row[8];
            }
    ?>

    <?php echo"<form method=\"POST\" action=\"./Method/Useredit.php?usereditid=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>User_id</label>
        <input type="text" value="<?=$e_id?>"name="User_ID" placeholder="User_id"><br>
        <label>Username</label>
        <input type="text" value="<?=$e_name?>"name="User_Username" placeholder="User_Username"><br>
        <!-- <label>Password</label>
        <input type="text" value="<?=$e_pass?>"name="User_Password" placeholder="User_Password"><br> -->
        <label>Email</label>
        <input type="text" value="<?=$e_email?>"name="User_Email" placeholder="User_Email"><br>
        <label>Firstname</label>
        <input type="text" value="<?=$e_first?>"name="User_Firstname" placeholder="User_Firstname"><br>
        <label>Lastname</label>
        <input type="text" value="<?=$e_last?>"name="User_Lastname" placeholder="User_Lastname"><br>
        <label>Tel</label>
        <input type="text" value="<?=$e_tel?>"name="User_Tel" placeholder="User_Tel"><br>
        <label>Address</label>
        <input type="text" value="<?=$e_add?>"name="User_Address" placeholder="User_Address"><br>
        <!-- <label>Profileimage</label><br> -->
        <!-- <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $e_pro ).'"/></td>';?> -->
        <!-- <input type="file" name="User_Profileimage" /><br> -->
        <input type="submit" name="edituser" value="submit">
    </form>


</div>


</div>



</body>
</html>