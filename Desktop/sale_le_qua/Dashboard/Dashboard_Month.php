<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../nav_footer_cate/logo.png" />

    <title>Dashboard</title>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
   

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/filter.css" rel="stylesheet">
    <link href="css/datepick.css" rel="stylesheet">
    <script>
    $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>


</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="Homepage_main.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
               
                <div class="sidebar-brand-text mx-3">Sale le qua </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
                    <li class="nav-item active">
                            <a class="nav-link" href="../Store_profile.php">
                                
                                <span>Profile</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                
                                <span>Dashboard</span></a>
                        </li>

                        <hr class="sidebar-divider">
                        

                        <li class="nav-item active">
                            <a class="nav-link" href="../Store_orders_manage.php">
                                
                                <span>รับคำสั่งซื้อ</span></a>
                        </li>

                        
                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <li class="nav-item active">
                            <a class="nav-link" href="../Store_orders_manage.php">
                                
                                <span>กำลังรอการยืนยันการรับสินค้า</span></a>
                        </li>
                        <hr class="sidebar-divider">
                        <li class="nav-item active">
                            <a class="nav-link" href="../Store_orders_manage.php">
                                
                                <span>รายการจัดส่งสำเร็จ</span></a>
                        </li>
                        
            
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 " id="sidebarToggle">
                    
                </button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

                          <!-- Topbar -->
                          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    
</button>

</nav>
<!-- End of Topbar -->

<!-- Filter -->
<?php
 $year="2022";
 $month="";
 if (isset($_POST['selectmonth'])){
   $year = trim($_POST['year']);
   $month = trim($_POST['month']);
 }
?>
      <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="./Dashboard_Year.php" aria-controls="home" role="tab">รายปี</a></li>
                  <li role="presentation" class="active"><a href="./Dashboard_Quarter.php" aria-controls="profile" role="tab" >ไตรมาส</a></li>
                  <li role="presentation"class="active" ><a href="./Dashboard_Month.php" aria-controls="messages" role="tab" >รายเดือน</a></li>
                  <div class="select-dropdown">
      </ul>

  <div class="wrap-select">
      <div class="options">
      <h4>ค้นหา</h4>
      <form method="POST" action="./Dashboard_Month.php" enctype="multipart/form-data">
            <select name="year">
              <option value=''     <?php if ($year == "") echo "selected"; ?>>Choose</option>
              <option value='2021' <?php if ($year == "2021") echo "selected"; ?>>2021</option>
              <option value='2022' <?php if ($year == "2022") echo "selected"; ?>>2022</option>
            </select>  
            <select name="month">
              <option value=''   <?php if ($month == "") echo "selected"; ?>>Choose</option>
              <option value='1'  <?php if ($month == "1") echo "selected"; ?>>1</option>
              <option value='2'  <?php if ($month == "2") echo "selected"; ?>>2</option>
              <option value='3'  <?php if ($month == "3") echo "selected"; ?>>3</option>
              <option value='4'  <?php if ($month == "4") echo "selected"; ?>>4</option>
              <option value='5'  <?php if ($month == "5") echo "selected"; ?>>5</option>
              <option value='6'  <?php if ($month == "6") echo "selected"; ?>>6</option>
              <option value='7'  <?php if ($month == "7") echo "selected"; ?>>7</option>
              <option value='8'  <?php if ($month == "8") echo "selected"; ?>>8</option>
              <option value='9'  <?php if ($month == "9") echo "selected"; ?>>9</option>
              <option value='10' <?php if ($month == "10") echo "selected"; ?>>10</option>
              <option value='11' <?php if ($month == "11") echo "selected"; ?>>11</option>
              <option value='12' <?php if ($month == "12") echo "selected"; ?>>12</option>
            </select>  

            <!-- <select>
              <option value='1' selected='' >Choose</option>
              <option value='2' >Strawberry</option>
              <option value='3'>Lemon</option>
              <option value='4' >Chocolate</option>
            </select>   -->

      <input type="submit" name="selectmonth" value="ค้นหา">
      </form>   
      </div>  

    
  </div>

            
<!-- Filter -->

          <div class="tab-content">
      
                <div class="row">
                      
                        <!-- Bar Chart -->
                   
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <?php //--------------------------------------------------------input variable----------------------------------
                                            include '../Method/DBconfig.php';

                                            $sid = $_SESSION['store_id'];
                                            $query = "
                                            SELECT
                                                SUM(
                                                    orderdetail.Product_Quantity) AS totalsum,
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d') AS datesave
                                                FROM
                                                    orderdetail
                                                LEFT JOIN product ON orderdetail.Product_ID = product.Product_ID
                                                JOIN store ON product.Store_ID = store.Store_ID
                                                JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID
                                                WHERE store.Store_ID = '$sid' 
                                                AND orderdetail.OrderDetail_Status IN ('finish','complete')
                                                AND YEAR(orderdetail.OrderDetail_Updatetime ) = '$year' 
                                                AND MONTH(orderdetail.OrderDetail_Updatetime) = '$month'
                                                GROUP By
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d%')
                                                ORDER BY
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d%')
                                                ;";
                                                  // echo $query;
                                            $result = mysqli_query($conn, $query);
                                            $resultchart = mysqli_query($conn, $query);
                                            //for chart
                                            $datesave = array();
                                            $totol = array();
                                            while($rs = mysqli_fetch_array($resultchart)){
                                            $datesave[] = "\"".$rs['datesave']."\"";
                                            $totol[] = "\"".$rs['totalsum']."\"";
                                            }
                                            $datesave = implode(",", $datesave);
                                            $totol = implode(",", $totol);

                                            ?>

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">กราฟรายได้</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

                                        <canvas id="myBarChart"  style="display: block; padding-bottom:12%" >
                                        <script>
                                        Chart.defaults.global.defaultFontColor = '#858796';

                                        function number_format(number, decimals, dec_point, thousands_sep) {
                                      
                                          number = (number + '').replace(',', '').replace(' ', '');
                                          var n = !isFinite(+number) ? 0 : +number,
                                            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                            s = '',
                                            toFixedFix = function(n, prec) {
                                              var k = Math.pow(10, prec);
                                              return '' + Math.round(n * k) / k;
                                            };
                                    
                                          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                                          if (s[0].length > 3) {
                                            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                                          }
                                          if ((s[1] || '').length < prec) {
                                            s[1] = s[1] || '';
                                            s[1] += new Array(prec - s[1].length + 1).join('0');
                                          }
                                          return s.join(dec);
                                        }
                                          var ctx = document.getElementById("myBarChart");
                                            debugger;
                                             data = {
                                              labels:  [<?php echo $datesave; ?>] ,
                                              datasets: [{
                                                data: [<?php echo $totol;?>],
                                                backgroundColor: "#FF9C50",
                                                hoverBackgroundColor: "#171E27",
                                              }]
                                            }
                                            var myBarChart = new Chart(ctx, {
                                              type: 'bar',
                                              data: data,
                                              options: {
                                                "hover": {
                                                  "animationDuration": 0
                                                },
                                                "animation": {
                                                  "duration": 1,
                                                  "onComplete": function () {
                                                    var chartInstance = this.chart,
                                                      ctx = chartInstance.ctx;

                                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                                    ctx.textAlign = 'center';
                                                    ctx.textBaseline = 'bottom';

                                                    this.data.datasets.forEach(function (dataset, i) {
                                                      var meta = chartInstance.controller.getDatasetMeta(i);
                                                      meta.data.forEach(function (bar, index) {
                                                        var data = dataset.data[index];
                                                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                                      });
                                                    });
                                                  }
                                                },
                                                
                                                legend: {
                                                  "display": false
                                                },
                                                
                                                tooltips: {
                                              titleMarginBottom: 10,
                                              titleFontColor: '#6e707e',
                                              titleFontSize: 14,
                                              backgroundColor: "rgb(255,255,255)",
                                              bodyFontColor: "#858796",
                                              borderColor: '#dddfeb',
                                              borderWidth: 1,
                                              xPadding: 15,
                                              yPadding: 15,
                                              displayColors: false,
                                              caretPadding: 10,
                                              callbacks: {
                                                label: function(tooltipItem, chart) {
                                                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                  return datasetLabel +  number_format(tooltipItem.yLabel)+ ' ชิ้น';
                                                }
                                              }
                                            },
                                                scales: {
                                                  yAxes: [{
                                                    display: true,
                                                    gridLines: {
                                                      display: true
                                                    },
                                                    ticks: {
                                                      min: 0,
                                                      max: 100,
                                                      maxTicksLimit: 5,
                                                      padding: 10,
                                                      callback: function(value, index, values) {
                                                      return  number_format(value)+' ชิ้น' ;
                                                    }  
                                                     
                                                    }
                                                  }],
                                                  xAxes: [{
                                                    gridLines: {
                                                      display: false
                                                    },
                                                    ticks: {
                                                      beginAtZero: true
                                                    }
                                                  }]
                                                }
                                              }
                                            });
                                          </script>

                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->

                                <?php 
                                  $query = "
                                  SELECT
                                  SUM(
                                    (
                                        orderdetail.Product_Price
                                    ) -(
                                        CASE WHEN(
                                            orderdetail.Product_Price / orderdetail.Product_Quantity
                                        ) > 100 THEN(
                                            orderdetail.Product_Price * 0.1
                                        ) ELSE(
                                            orderdetail.Product_Quantity * 10
                                        )
                                    END
                                    )
                                ) AS totalsum,
                                      SUM(
                                        CASE WHEN(
                                            orderdetail.Product_Price / orderdetail.Product_Quantity
                                        ) > 100 THEN(
                                            orderdetail.Product_Price * 0.1
                                        ) ELSE(
                                            orderdetail.Product_Quantity * 10
                                        )
                                    END
                                ) AS totaldonate
                                  FROM
                                      orderdetail
                                  JOIN product ON orderdetail.Product_ID = product.Product_ID
                                  JOIN store ON product.Store_ID = store.Store_ID
                                  JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID
                                  WHERE
                                      store.Store_ID = '$sid' AND orderdetail.OrderDetail_Status IN ('finish','complete') AND YEAR(orderdetail.OrderDetail_Updatetime ) = '$year' 
                                      AND MONTH(orderdetail.OrderDetail_Updatetime) = '$month'";
                                      // echo $query;
                                  $result = mysqli_query($conn, $query);
                                  $resultchart = mysqli_query($conn, $query);


                                  //for chart
                                  $save = array();
                                  $row = mysqli_fetch_array($resultchart);
                                  

                                  ?>
                             

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">รายได้และยอดบริจาค</h6>
                                    <div class="dropdown no-arrow">
                                        
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

                                        <canvas id="myPieChart">
                                          <script>
                                                                                      // Set new default font family and font color to mimic Bootstrap's default styling
                                          Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                                          Chart.defaults.global.defaultFontColor = '#858796';

                                          // Pie Chart Example
                                          var ctx = document.getElementById("myPieChart");
                                          var myPieChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                              labels: ['รายได้','บริจาค'],
                                              datasets: [{
                                                data: [<?php echo $row[0];?>,<?php echo $row[1];?>],
                                                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                                                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                              }],
                                            },
                                            
                                            options: {
                                              maintainAspectRatio: false,
                                              tooltips: {
                                                backgroundColor: "rgb(255,255,255)",
                                                bodyFontColor: "#858796",
                                                borderColor: '#dddfeb',
                                                borderWidth: 1,
                                                xPadding: 15,
                                                yPadding: 15,
                                                displayColors: false,
                                                caretPadding: 10,
                                              },
                                              legend: {
                                                display: false
                                              },
                                              cutoutPercentage: 80,
                                            },
                                          });

                                                                                    </script>
                                        </canvas>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                      <!-- Area Chart -->
                      <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <?php //--------------------------------------------------------input variable----------------------------------
                                            include '../Method/DBconfig.php';
                                           
                                            $sid = $_SESSION['store_id'];
                                            $query = "
                                            SELECT
                                                SUM(
                                                    orderdetail.Product_Price) AS totalsum,
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d') AS datesave
                                                FROM
                                                    orderdetail
                                                LEFT JOIN product ON orderdetail.Product_ID = product.Product_ID
                                                JOIN store ON product.Store_ID = store.Store_ID
                                                JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID
                                                WHERE store.Store_ID = '$sid' AND orderdetail.OrderDetail_Status IN ('finish','complete')
                                                AND YEAR(orderdetail.OrderDetail_Updatetime ) = '$year' 
                                                AND MONTH(orderdetail.OrderDetail_Updatetime) = '$month'
                                                GROUP By
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d%')
                                                ORDER BY
                                                    DATE_FORMAT(orderdetail.OrderDetail_Updatetime, '%d%')
                                                ;";
                                                // echo $query;
                                            $result = mysqli_query($conn, $query);
                                            $resultchart = mysqli_query($conn, $query);
                                            //for chart
                                            $datesave = array();
                                            $totol = array();
                                            while($rs = mysqli_fetch_array($resultchart)){
                                            $datesave[] = "\"".$rs['datesave']."\"";
                                            $totol[] = "\"".$rs['totalsum']."\"";
                                            }
                                            $datesave = implode(",", $datesave);
                                            $totol = implode(",", $totol);

                                            ?>

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">กราฟบริจาค</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

                                        <canvas id="myAreaChart">
                                                                                  <script>
                                          // Set new default font family and font color to mimic Bootstrap's default styling
                                          Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                                          Chart.defaults.global.defaultFontColor = '#858796';

                                          function number_format(number, decimals, dec_point, thousands_sep) {
                                            // *     example: number_format(1234.56, 2, ',', ' ');
                                            // *     return: '1 234,56'
                                            number = (number + '').replace(',', '').replace(' ', '');
                                            var n = !isFinite(+number) ? 0 : +number,
                                              prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                                              sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                                              dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                                              s = '',
                                              toFixedFix = function(n, prec) {
                                                var k = Math.pow(10, prec);
                                                return '' + Math.round(n * k) / k;
                                              };
                                            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                                            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                                            if (s[0].length > 3) {
                                              s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                                            }
                                            if ((s[1] || '').length < prec) {
                                              s[1] = s[1] || '';
                                              s[1] += new Array(prec - s[1].length + 1).join('0');
                                            }
                                            return s.join(dec);
                                          }

                                          // Area Chart Example
                                          var ctx = document.getElementById("myAreaChart");
                                          var myLineChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                              labels: [<?php echo $datesave;?>],
                                              datasets: [{
                                                label: "จำนวนเงิน",
                                                lineTension: 0.3,
                                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                                borderColor: "rgba(78, 115, 223, 1)",
                                                pointRadius: 3,
                                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                                pointHoverRadius: 3,
                                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                                pointHitRadius: 10,
                                                pointBorderWidth: 2,
                                                data: [<?php echo $totol;?>],
                                              }],
                                            },
                                            options: {
                                              maintainAspectRatio: false,
                                              layout: {
                                                padding: {
                                                  left: 10,
                                                  right: 25,
                                                  top: 25,
                                                  bottom: 0
                                                }
                                              },
                                              scales: {
                                                xAxes: [{
                                                  time: {
                                                    unit: 'date'
                                                  },
                                                  gridLines: {
                                                    display: false,
                                                    drawBorder: false
                                                  },
                                                  ticks: {
                                                    maxTicksLimit: 7
                                                  }
                                                }],
                                                yAxes: [{
                                                  ticks: {
                                                    maxTicksLimit: 5,
                                                    padding: 10,
                                                    // Include a dollar sign in the ticks
                                                    callback: function(value, index, values) {
                                                      return  number_format(value)+' บาท' ;
                                                    }
                                                  },
                                                  gridLines: {
                                                    color: "rgb(234, 236, 244)",
                                                    zeroLineColor: "rgb(234, 236, 244)",
                                                    drawBorder: false,
                                                    borderDash: [2],
                                                    zeroLineBorderDash: [2]
                                                  }
                                                }],
                                              },
                                              legend: {
                                                display: false
                                              },
                                              tooltips: {
                                                backgroundColor: "rgb(255,255,255)",
                                                bodyFontColor: "#858796",
                                                titleMarginBottom: 10,
                                                titleFontColor: '#6e707e',
                                                titleFontSize: 14,
                                                borderColor: '#dddfeb',
                                                borderWidth: 1,
                                                xPadding: 15,
                                                yPadding: 15,
                                                displayColors: false,
                                                intersect: false,
                                                mode: 'index',
                                                caretPadding: 10,
                                                callbacks: {
                                                  label: function(tooltipItem, chart) {
                                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                    return datasetLabel + ': ' +  number_format(tooltipItem.yLabel)+ ' บาท' ;
                                                  }
                                                }
                                              }
                                            }
                                          });
                                          </script>

                                        </canvas>
                                    </div>
                                </div>
                            </div>
                       <!-- Area Chart -->

                    <div class="container-fluid">


                      <!-- DataTales Example -->
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">ออร์เดอสินค้า</h6>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                            <tr>
                                              <th>รหัสใบสั่งซื้อ</th>
                                              <th>รหัสสินค้า</th>
                                              <th>ชื่อสินค้า</th>
                                              <th>จำนวนสินค้า</th>
                                              <th>ราคาสินคเา</th>
                                              <th>ราคารวม</th>
                                              <th>รหัสล็อตสินค้า</th>
                                            </tr>
                                            </thead>
                                <?php //--------------------------------------------------------input Table----------------------------------;
                                            $sid = $_SESSION['store_id'];
                                            $query = "
                                            SELECT
                                                orderdetail.OrderDetail_ID,
                                                product.Product_ID,
                                                product.Product_Name,
                                                orderdetail.Product_Quantity,
                                                orderdetail.Product_Price,
                                                product.Store_ID,
                                                store.Store_Maindonation,
                                                donationtype.DonationType_Name,
                                                orderdetail.OrderDetail_Lotnumber
                                            FROM
                                                orderdetail
                                            LEFT JOIN product ON orderdetail.Product_ID = product.Product_ID
                                            JOIN store ON product.Store_ID = store.Store_ID
                                            JOIN donationtype ON store.Store_Maindonation = donationtype.DonationType_ID 
                                            WHERE store.Store_ID = '$sid' AND orderdetail.OrderDetail_Status IN ('finish','complete')
                                            AND YEAR(orderdetail.OrderDetail_Updatetime ) = '$year' 
                                            AND MONTH(orderdetail.OrderDetail_Updatetime) = '$month'
                                            ORDER by orderdetail.OrderDetail_ID DESC;";
                                            $result = mysqli_query($conn, $query);
                                            while($row = mysqli_fetch_array($result)){

                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>$row[0]</td>";
                                            echo "  <td>$row[1]</td>";
                                            echo "  <td>$row[2]</td>";
                                            echo "  <td>$row[3]</td>";
                                            echo "  <td>".$row[4]/$row[3]."</td>";
                                            echo "  <td>".$row[4]."</td>";
                                            echo "  <td>$row[8]</td>";
                                            echo "</tr>";
    
                                            }
                                            ?>
                                  </table>
                              </div>
                          </div>
                      </div>

                      </div>
                      <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

               

            </div>
            <!-- End of Content Wrapper -->

        </div>

        </div>
        <!-- End of Page Wrapper -->

       <!--php-->
        
       <!--php-->
      
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/datepick.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
        <!-- Page level custom scripts -->
        <!-- <script src="js/demo/chart-area-demo.js"></script> -->
        <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>