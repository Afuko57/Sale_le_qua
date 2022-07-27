<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Score</title>
    <link rel="icon" type="image/png" href="nav_footer_cate/logo.png" />

    <link rel="stylesheet" type="text/css" href="nav_footer_cate/style.css?V=1">
    <link rel="stylesheet" type="text/css" href="nav_footer_cate/form.css?V=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" type="text/css" href="star/style.css?V=1">
</head>
<style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    img {
        width: 50px;
        height: 50px;
    }
    input[type="text"]{ padding: 20px 10px; line-height: 28px; }
</style>
<body>
     <!--NAV--><?php require_once("nav_footer_cate/navbar.php"); ?><!--NAV-->
     
<div class='container'>
<div class="container-form">
    <?php
        include './Method/DBconfig.php';
    ?>

    <?php
        if (isset($_SESSION['user_id']))
        {
            $user_id = $_SESSION['user_id'];
            // echo "$user_id<br>";
            if (isset($_GET['reviewid']) And isset($_GET['order_id'])And isset($_GET['productlot_id'])){
                $product_id = $_GET['reviewid'];
                $order_id = $_GET['order_id'];
                $productlot_id = $_GET['productlot_id'];
                //  echo "$product_id<br>";
                //  echo "$order_id<br>";
                //  echo "$productlot_id";
            }

            // $sql_order = "SELECT * "
            // . " FROM `orderdetail`"
            // . " WHERE OrderDetail_ID = '$order_id' And Product_ID = '$product_id'"
            // . " ORDER BY `OrderDetail_ID`;";
            // echo"<br>$sql_order<br>";


            echo "<lable>ให้คะแนน 1- 5 </lable>";
            // $result = $conn->query($sql_order);
            // $row = $result->fetch_assoc();
            echo "<form  method=\"POST\" action=\"./Method/Usergivescore.php?product=$product_id&order=$order_id&productlot_id=$productlot_id\">";
            // echo '<input type="range" name="score_product" min="1" max="5">';

            echo '<div id="star-wrapper">';
            echo '<section>';
            echo '<select data-type="range" name="rating">';
            echo '<option disabled selected>Select one</option>';
            echo '</select>';
            echo '</section>';
            echo '</div>';
            echo  '<br>';
            echo "<br>ความคิดเห็น<br>";
            echo '<input type="text" name="comment_detail" style="width: 500px max-width:100%" >';
            echo "<br>";
            echo '<input type="submit" name="insertscore" value="submit">';
            echo "</form>";

            

        }else {
            header("location:../Homepage_main.php?no_user"); 
        }
    ?>
</div>

</div>    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="star/script.js"></script>
</body>

</html>