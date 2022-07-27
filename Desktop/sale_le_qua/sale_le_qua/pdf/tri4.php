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
<body>
<?php
    $file = "./file/report_4_64.pdf";
    $filename = $_POST['report_4_64.pdf'];
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
    ?>
    
    </body>
</html>