
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
                        <a class="<?php if($page=='profile')echo 'active-menu'; ?>" href="my-profile.php"><i class="fa fa-users "></i>Profile</a>
                    </li> 

                    <li>
                        <a class="<?php if($page=='document')echo 'active-menu'; ?>" href="upload_documents.php"><i class="fa fa-university "></i>Documents</a>
                    </li>
                   
                    <li>
                        <a href="logout.php"><i class="fa fa-power-off "></i>Logout</a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->