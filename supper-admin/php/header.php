<?php
include('php/config.php');

?>
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
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        { 

                            ?>
                            <li>
                                <a class="<?php if($_GET['sid']=='<?php echo htmlentities($result->id);?>')echo 'active-menu'; ?>"  onclick="openSection(<?php echo htmlentities($result->id);?>)" ><i class="fa fa-university "></i><?php echo htmlentities($result->section_name);?></a>

                                <div class="dropdown" id="section<?php echo htmlentities($result->id);?>" style="display: none">
                                    <ul>
                                        <li><a class="<?php if($page=='manage')echo 'active-menu'; ?>" href="manage-admin.php?sid=<?php echo htmlentities($result->id);?>"><i class="fa fa-university "></i>Managers</a></li>

                                        <a class="<?php if($page=='employee')echo 'active-menu'; ?>" href="manage-employee.php?sid=<?php echo htmlentities($result->id);?>"><i class="fa fa-university "></i>Staff</a>
                                    </ul>
                                </div>
                            </li>

                            <?php 
                        }
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