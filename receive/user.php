<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include "db_connection.php";


session_start();

$userid = $_SESSION['user'];
function  createConfirmationmbox(){
    echo '<script type="text/javascript"> ';
    echo ' function openurl(link) {';
    echo '  if (confirm("確定刪除？")) {';
    echo '    document.location = link;';
    echo '  }';
    echo '}';
    echo '</script>';
}

if($_SESSION['user'] != null)
      { 
      $sql = "SELECT * FROM `member`where m_account= '$userid'";
      $result = filterTable($sql);

        if($row = mysqli_fetch_array($result)){
         echo "<tr>";
         $isna = $row['m_name'];
         $img =$row['img'];
         
    
         echo "</tr>";
      
        
        }
    
    }
?>
<?php  //抓檢傷分級資料
     $sql1="SELECT  COUNT(r_Check) FROM report WHERE `r_Check`= '1'AND `r_Done`='1' AND `r_member`='$userid'  ";
        $re1 = filterTable($sql1);
        $ro1 = mysqli_fetch_array($re1);
    $sql2="SELECT  COUNT(r_Check) FROM report WHERE `r_Check`= '2'AND `r_Done`='1' AND `r_member`='$userid'  ";
        $re2 = filterTable($sql2);
        $ro2 = mysqli_fetch_array($re2);
    $sql3="SELECT  COUNT(r_Check) FROM report WHERE `r_Check`= '3'AND `r_Done`='1' AND `r_member`='$userid'  ";
        $re3 = filterTable($sql3);
        $ro3 = mysqli_fetch_array($re3);
   $sql4="SELECT  COUNT(r_Check) FROM report WHERE `r_Check`= '4'AND `r_Done`='1' AND `r_member`='$userid'  ";
        $re4 = filterTable($sql4);
        $ro4 = mysqli_fetch_array($re4);
   $sql5="SELECT  COUNT(r_Check) FROM report WHERE `r_Check`= '5'AND `r_Done`='1' AND `r_member`='$userid'  ";
        $re5 = filterTable($sql5);
        $ro5 = mysqli_fetch_array($re5);
        
             
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>使用端</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="css/pignose.calender.css" />
    <!--// Calender Css -->
    <!-- Common Css -->
    <link href="css/styleuser.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->

    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
 
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-light" style=" background:#14274E;">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="t" aria-label="Toggle navigation" style=" background:#F1F6F9;">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="receive.php"><img src="img/home_icon-icons.com_64840.png"><span class="sr-only">(current)</span></a>
    </li>
 
    
 
    </ul>
  </ul>



  

  <form class="form-inline my-3 my-lg-0">

  <a class="nav-link disabled" href=""><?php echo"<img src='img/$img.png' class='rounded float-right' style='width:8%;'>"?></a>
  <a class="nav-lin  " style="color:#F1F6F9; font-size:15px;" href="user.php"><?php echo $isna?></a>
  &nbsp;
  &nbsp;
  <button type="button" class="btn btn-outline-secondary"   onclick="location.href='logout.php'">登出</button>

  </form>
</div>
</nav>
        <!-- Page Content Holder -->
        <div id="content">
            <!--// top-bar -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Stats -->
                    <div style="width:30%;"class="outer-w3-agile ">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-danger">
                            <div class="s-l">
                                <h5  >第一級</h5>
                       
                            </div>
                            <div class="s-r">
                                <h6><?php echo$ro1[0]
                                    ?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                            <div class="s-l">
                                <h5>第二級</h5>
                        
                            </div>
                            <div class="s-r">
                                <h6><?php echo$ro2[0]
                                    ?>
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                        <div style="background-color:#FFFF37;"class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between ">
                            <div class="s-l">
                                <h5>第三級</h5>
                            
                            </div>
                            <div class="s-r">
                                <h6><?php echo$ro3[0]
                                    ?>
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success">
                            <div class="s-l">
                                <h5>第四級</h5>
                        
                            </div>
                            <div class="s-r">
                                <h6><?php echo$ro4[0]
                                    ?>
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-primary">
                            <div class="s-l">
                                <h5>第五級</h5>
                            
                            </div>
                            <div class="s-r">
                                <h6>
                                <?php echo$ro5[0]
                                    ?>
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!--// Stats -->
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                        <h4 class="tittle-w3-agileits mb-4"><?php echo $isna?>檢傷分級比例</h4>
                        <div  id="chartdiv"></div>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>
            <!-- Simple-chart -->
            <div class="outer-w3-agile mt-3">
                <h4 class="tittle-w3-agileits mb-4">Graph</h4>
                <div id="Hybridgraph" class="simple-chart1">
                </div>
            </div>
            <!--// Simple-chart -->

            <!--// Bar-Chart -->
            <div class="outer-w3-agile mt-3">
                <h4 class="tittle-w3-agileits mb-4">Bar Chart</h4>
                <div id="chart-1"></div>
            </div>
            <!--// Bar-Chart -->

            <!--// three-grids -->
          


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->
    
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Graph -->
    <script src="js/SimpleChart.js"></script>
    <script>
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [{
                    X: "6",
                    Y: 300.00
                },
                {
                    X: "7",
                    Y: 101.98
                },
                {
                    X: "8",
                    Y: 140.00
                },
                {
                    X: "9",
                    Y: 340.00
                },
                {
                    X: "10",
                    Y: 470.25
                },
                {
                    X: "11",
                    Y: 180.56
                },
                {
                    X: "12",
                    Y: 680.57
                },
                {
                    X: "13",
                    Y: 740.00
                },
                {
                    X: "14",
                    Y: 800.89
                },
                {
                    X: "15",
                    Y: 420.57
                },
                {
                    X: "16",
                    Y: 980.24
                },
                {
                    X: "17",
                    Y: 1080.00
                },
                {
                    X: "18",
                    Y: 140.24
                },
                {
                    X: "19",
                    Y: 140.58
                },
                {
                    X: "20",
                    Y: 110.54
                },
                {
                    X: "21",
                    Y: 480.00
                },
                {
                    X: "22",
                    Y: 580.00
                },
                {
                    X: "23",
                    Y: 340.89
                },
                {
                    X: "0",
                    Y: 100.26
                },
                {
                    X: "1",
                    Y: 1480.89
                },
                {
                    X: "2",
                    Y: 1380.87
                },
                {
                    X: "3",
                    Y: 1640.00
                },
                {
                    X: "4",
                    Y: 1700.00
                }
            ]
        };
        $(function () {
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });
    </script>
    <!--// Graph -->
    <!-- Bar-chart -->
    <script src="js/rumcaJS.js"></script>
    <script src="js/example.js"></script>
    <!--// Bar-chart -->
    <!-- Calender -->
    <script src="js/moment.min.js"></script>
    <script src="js/pignose.calender.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
        //]]>
    </script>
    <!--// Calender -->

    <!-- profile-widget-dropdown js-->
    <script src="js/script.js"></script>
    <!--// profile-widget-dropdown js-->

    <!-- Count-down -->
    <script src="js/simplyCountdown.js"></script>
    <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->

    <!-- pie-chart -->
    <script src='js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "第一級",
                value:<?php echo $ro1[0]; ?>,
            },
            {
                country: "第二級",
                value:<?php echo $ro2[0]; ?>,
            },
            {
                country: "",
                value: 0
            },
            {
                country: "",
                value: 0
            },
            {
                country: "第三級",
                value:<?php echo $ro3[0]; ?>,
            },
            {
                country: "",
                value: 0
            },
            {
                country: "第四級",
                value:<?php echo $ro4[0]; ?>,
            },
            {
                country: "第五級",
                value:<?php echo $ro5[0]; ?>,
            },
          
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;
     
            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>