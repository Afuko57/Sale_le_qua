<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation_addimage</title>
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">
</head>

<style>
    img {
        width : 200px;
        height: 200px;
    }
    .back_button{
        background-color:rgb(9, 0, 58)!important;
        color: white!important;
        padding: 12px 20px!important;
        border: none!important;
        border-radius: 4px!important;
        cursor: pointer!important;
        
    }
    .submit_button{
    background-color: #3BB783!important;
    color: white!important;
    padding: 12px 20px!important;
    border: none!important;
    border-radius: 4px!important;
    cursor: pointer!important;
    float: right!important;
    }
    @media (max-width: 590px) {
        .back_button{
            margin-top:10px!important;
            margin-bottom:50px!important;
        }
        
    }    
</style>

<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     
<div class='container'>
<div class="container-form">
    <?php
        include './Method/DBconfig.php';
        if(isset($_GET['donationaddimage_ID']))
            {
                $e_id=$_GET['donationaddimage_ID'];
                $sql = "SELECT * FROM `donation` where `Donation_ID` = '$e_id' ";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();
                $e_pro=$row['Donation_ProfileImage'];
            }
    ?>
    <?php echo"<form method=\"POST\" action=\"./Method/Donationprofileaddimage.php?donationaddimage_ID=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>Profileimage</label><br>
        <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $e_pro ).'"/></td>';?> <br>
        <input type="file" name="Donation_Profileimage" /><br>
        <input class="submit_button" type="submit" name="Donationaddimage" value="submit">
    </form>
    <button  class="back_button" onclick="location.href='./Donation_profile.php'">Back</button>
    </div></div>








</body>
</html>