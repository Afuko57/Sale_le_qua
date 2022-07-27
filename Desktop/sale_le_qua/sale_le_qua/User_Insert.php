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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" type="text/css" href="star/style.css?V=1">
</head>
<body>
        <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     
<div class='container'>
<div class="container-form">


    <form method="POST" action="./Method/Userinsert.php" enctype="multipart/form-data">
        <!-- <label>User_id</label>
        <input type="text" value=""name="User_ID" placeholder="User_id"><br> -->
        <label>Username</label>
        <input type="text" value=""name="User_Username" placeholder="User_Username"><br>
        <label>Password</label>
        <input type="text" value=""name="User_Password" placeholder="User_Password"><br>
        <label>Email</label>
        <input type="text" value=""name="User_Email" placeholder="User_Email"><br>
        <label>Firstname</label>
        <input type="text" value=""name="User_Firstname" placeholder="User_Firstname"><br>
        <label>Lastname</label>
        <input type="text" value=""name="User_Lastname" placeholder="User_Lastname"><br>
        <label>Tel</label>
        <input type="text" value=""name="User_Tel" placeholder="User_Tel"><br>
        <label>Address</label>
        <input type="text" value=""name="User_Address" placeholder="User_Address"><br>
        <!-- <label>Profileimage</label> -->
        <!-- <input type="file" name="User_Profileimage"/><br> -->
        <!-- <input type="text" value=""name="User_Profileimage" placeholder="User_Profileimage"><br> -->
        <input type="submit" name="insertuser" value="submit">
    </form>
    </div>

</div>    

</body>


</html>