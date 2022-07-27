<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">
    
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
</head>
<body>
          <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
<?php
        include './Method/DBconfig.php';
        if(isset($_GET['donationedit_ID']))
            {
                $s_id=$_GET['donationedit_ID'];
                $sql = "SELECT * FROM `donation` where `Donation_ID` = '$s_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_array();
            }
    ?>
<div class='container'>
<div class="container-form">

    <?php echo"<form method=\"POST\" action=\"./Method/Donationedit.php?donationeditid=$s_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Donation_Name</label>
        <input type="text" value="<?=$row[1]?>"name="Donation_Name" placeholder="Donation_Name"><br>
        <label>Donation_ManagerName</label>
        <input type="text" value="<?=$row[2]?>"name="Donation_ManagerName" placeholder="Donation_ManagerName"><br>
        <label>Donation_Email</label>
        <input type="text" value="<?=$row[3]?>"name="Donation_Email" placeholder="Donation_Email"><br>
        <label>Donation_Tel</label>
        <input type="text" value="<?=$row[4]?>"name="Donation_Tel" placeholder="Donation_Tel"><br>
        <label>Donation_Address</label>
        <input type="text" value="<?=$row[5]?>"name="Donation_Address" placeholder="Donation_Address"><br>
        <label>Donation_Status</label>
        <select name="Donation_Status">
            <option value="pending" <?php if ($row[7] == "pending") echo "selected"; ?>>pending</option>
            <option value="normal" <?php if ($row[7] == "normal") echo "selected"; ?>>normal</option>
        </select><br>
        <label>Donation_Detail</label>
        <input type="text" value="<?=$row[8]?>"name="Donation_Detail" placeholder="Donation_Detail"><br>
        <label>Donation_Need</label>
        <input type="text" value="<?=$row[9]?>"name="Donation_Need" placeholder="Donation_Need"><br>
        <label>User_ID</label>
        <input type="text" value="<?=$row[12]?>"name="User_ID" placeholder="User_ID"><br>
        <label>DonationType_ID</label>
        <select name="DonationType_ID">
            <option value="1"<?php if ($row[13] == "1") echo "selected"; ?>>วัด</option>
            <option value="2"<?php if ($row[13] == "2") echo "selected"; ?>>เพื่อเด็ก</option>
            <option value="3"<?php if ($row[13] == "3") echo "selected"; ?>>เพื่อสตรี</option>
            <option value="4"<?php if ($row[13] == "4") echo "selected"; ?>>ช่วยเหลือสัตว์</option>
            <option value="5"<?php if ($row[13] == "5") echo "selected"; ?>>เพื่อการศึกษา</option>
            <option value="6"<?php if ($row[13] == "6") echo "selected"; ?>>เพื่อผู้ด้อยโอกาสหรือผู้พิการ</option>
        </select><br>
        <input type="submit" name="editdonation" value="submit">
    </form>
    </div>

</div>    
</body>
</html>