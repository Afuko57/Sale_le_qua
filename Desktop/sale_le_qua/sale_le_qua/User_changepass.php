<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_edit</title>
</head>
<body>
    <?php
        include './Method/DBconfig.php';
        if(isset($_GET['userchangpass_ID']))
            {
                $e_id=$_GET['userchangpass_ID'];  
            }
    ?>

    <?php echo"<form method=\"POST\" action=\"./Method/Userchangepass.php?userchangepassid=$e_id\" enctype=\"multipart/form-data\">"; ?>
        <label>NewPassword</label>
        <input type="password" value=""name="User_Password" placeholder="User_Password"><br>
        <label>ConfirmPassword</label>
        <input type="password" value=""name="User_ConPassword" placeholder="User_ConPassword"><br>
        <input type="submit" name="changepassuser" value="submit">
    </form>
    <button onclick="location.href='./User_manage.php'">Back</button>







</body>
</html>