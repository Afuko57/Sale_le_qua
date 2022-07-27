<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_edit</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">
</head>
<body>
    <?php
        include './Method/DBconfig.php';
        if(isset($_GET['storeedit_ID']))
            {
                $s_id=$_GET['storeedit_ID'];
                $sql = "SELECT * FROM `store` where `Store_ID` = '$s_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_array();
                $s_Name=$row[1];
                $s_Acountnumber=$row[2];
                $s_Bankname=$row[3];
                $s_Tel=$row[4];
                $s_Address=$row[5];
                $s_Maindonation=$row[7];
                $s_Status=$row[8];
                $s_Owner=$row[11];
            }
    ?>
    <div class='container'>
    <div class="container-form">
    <?php echo"<form method=\"POST\" action=\"./Method/Storeedit.php?storeeditid=$s_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Store_ID</label>
        <input type="text" value="<?=$s_id?>"name="Store_ID" placeholder="Store_ID"><br>
        <label>StoreName</label>
        <input type="text" value="<?=$s_Name?>"name="Store_Storename" placeholder="Store_Storename"><br>
        <label>Acountnumber</label>
        <input type="text" value="<?=$s_Acountnumber?>"name="Store_Acountnumber" placeholder="Store_Acountnumber"><br>
        <label>BankName</label>
        <select name="Store_Bankname">
            <option value="ธนาคารกรุงไทย" <?php if ($s_Bankname == "ธนาคารกรุงไทย") echo "selected"; ?>>ธนาคารกรุงไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารกรุงศรีอยุธยา" <?php if ($s_Bankname == "ธนาคารกรุงศรีอยุธยา") echo "selected"; ?>>ธนาคารกรุงศรีอยุธยา จำกัด (มหาชน)</option>
            <option value="ธนาคารกสิกรไทย" <?php if ($s_Bankname == "ธนาคารกสิกรไทย" ) echo "selected"; ?>>ธนาคารกสิกรไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารทหารไทยธนชาต" <?php if ($s_Bankname == "ธนาคารทหารไทยธนชาต") echo "selected"; ?>>ธนาคารทหารไทยธนชาต จำกัด (มหาชน)</option>
            <option value="ธนาคารซีไอเอ็มบี" <?php if ($s_Bankname == "ธนาคารซีไอเอ็มบี") echo "selected"; ?>>ธนาคารซีไอเอ็มบี ไทย จำกัด (มหาชน)</option>
            <option value="ธนาคารไทยพาณิชย์" <?php if ($s_Bankname == "ธนาคารไทยพาณิชย์") echo "selected"; ?>>ธนาคารไทยพาณิชย์ จำกัด (มหาชน)</option>
            <option value="พร้อมเพย์" <?php if ($s_Bankname == "พร้อมเพย์เบอร์โทรศัพท์" or $s_Bankname='รหัสบัตรประชาชน') echo "selected"; ?>>พร้อมเพย์</option>
        </select><br>
        <label>Tel</label>
        <input type="text" value="<?=$s_Tel?>"name="Store_Tel" placeholder="Store_Tel"><br>
        <label>Address</label>
        <input type="text" value="<?=$s_Address?>"name="Store_Address" placeholder="Store_Address"><br>
        <label>Maindonation</label>
        <select name="Store_Maindonation">
            <option value="1"<?php if ($s_Maindonation == "1") echo "selected"; ?>>วัด</option>
            <option value="2"<?php if ($s_Maindonation == "2") echo "selected"; ?>>เพื่อเด็ก</option>
            <option value="3"<?php if ($s_Maindonation == "3") echo "selected"; ?>>เพื่อสตรี</option>
            <option value="4"<?php if ($s_Maindonation == "4") echo "selected"; ?>>ช่วยเหลือสัตว์</option>
            <option value="5"<?php if ($s_Maindonation == "5") echo "selected"; ?>>เพื่อการศึกษา</option>
            <option value="6"<?php if ($s_Maindonation == "6") echo "selected"; ?>>เพื่อผู้ด้อยโอกาสหรือผู้พิการ</option>
        </select><br>
        <label>Status</label>
        <select name="Store_Status">
            <option value="normal"<?php if ($s_Status == "normal") echo "selected"; ?>>normal</option>
            <option value="suspend"<?php if ($s_Status == "suspend") echo "selected"; ?>>suspend</option>
            <option value="close"<?php if ($s_Status == "close") echo "selected"; ?>>close</option>
            <option value="pending"<?php if ($s_Status == "pending") echo "selected"; ?>>pending</option>
        </select><br>
        <label>Owner</label>
        <input type="text" value="<?=$s_Owner?>"name="Store_Owner" placeholder="Store_Owner"><br>

        <input type="submit" name="editstore" value="submit">
    </form>
        </div></div>








</body>
</html>