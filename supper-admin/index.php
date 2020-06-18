<?php
include("php/dbconnect.php");
include("php/checklogin.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Supper Admin || Management System</title>

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


<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Management System</a>
            </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <!-- <div class="user-img-div">
                            <img src="img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $_SESSION['rainbow_name'];?>
                            <br />
                               
                            </div>
                        </div> -->

                    </li>


                    <li>
                        <a class="<?php if($page=='dashboard')echo 'active-menu'; ?>" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>

                    <li>
                        <a class="<?php if($page=='add-section' || $page == 'edit-section' || $page == 'sections')echo 'active-menu'; ?>" href="all-sections.php"><i class="fa fa-university "></i>Sections</a>
                    </li>

                    <?php
                    $sql = "SELECT * from sections where status=1";
                    $query = mysqli_query($conn,$sql);
                    
                   
                        while($result = mysqli_fetch_assoc($query))
                        { 

                            ?>
                            <li>
                                <a class="<?php if($_GET['sid']=='<?php echo $result["id"];?>')echo 'active-menu'; ?>"  onclick="openSection(<?php echo $result['id'];?>)" ><i class="fa fa-university "></i><?php echo $result['section_name'];?></a>

                                <div class="dropdown" id="section<?php echo $result['id'];?>" style="display: none">
                                    <ul>
                                        <li><a class="<?php if($page=='manage')echo 'active-menu'; ?>" href="manage-admin.php?sid=<?php echo $result['id'];?>"><i class="fa fa-university "></i>Managers</a></li>

                                        <a class="<?php if($page=='employee')echo 'active-menu'; ?>" href="manage-employee.php?sid=<?php echo $result['id'];?>"><i class="fa fa-university "></i>Staff</a>
                                    </ul>
                                </div>
                            </li>

                            <?php 
            
                    }
                    ?>
                   
                    <!-- 
                     <li>
                        <a class="<?php if($page=='invoice')echo 'active-menu'; ?>" href="invoice.php"><i class="fa fa-users "></i>Invoice</a>
                    </li> -->

                    <!--  <li>
                        <a class="<?php if($page=='report')echo 'active-menu'; ?>" href="report.php"><i class="fa fa-file-text "></i>Report </a>
                    </li>
                -->


                <li>
                    <a class="<?php if($page=='setting')echo 'active-menu'; ?>" href="setting.php"><i class="fa fa-cogs "></i>Setting</a>
                </li>

                <li>
                    <a href="logout.php"><i class="fa fa-power-off "></i>Logout</a>
                </li>


            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <script type="text/javascript">
        function openSection(id){
            $('#section'+id).toggle();
        }
    </script>

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
                
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="my-profile.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h5>Profile</h5>
                            </a>
                        </div>
                    </div>                  
                    
                    <!-- <div class="col-md-4">
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
                    </div>        -->           

                </div>
                <!-- /. ROW  -->
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        H.R. Management System | Brought To You By : ATMC DMS
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
