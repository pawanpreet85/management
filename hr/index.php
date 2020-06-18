<?php
include("php/dbconnect.php");
include("php/checklogin.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Invoice System</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<?php $page='dashboard'; ?>
<?php
require_once("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h2 style="text-align:center;"> Welcome to <strong> Document Management System</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                
                  
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="my-profile.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h5>Profile</h5>
                            </a>
                        </div>
                    </div>                  
                    
                 <!--    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="invoice.php">
                                <i class="fa fa-usd fa-5x"></i>
                                <h5>Invoice Genrate</h5>
                            </a>
                        </div>
                    </div>
                    
                    
                     <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="report.php">
                                <i class="fa fa-file-text fa-5x"></i>
                                <h5>Report</h5>
                            </a>
                        </div>
                    </div> -->
                  

                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        Invoice System | Brought To You By : <a href="http://www.techlabzinfosoft.com/" target="_blank">Techlabz Infosoft Pvt Ltd</a>
    </div>
   
   <script src="js/jquery-1.10.2.js"></script>  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    


</body>
</html>