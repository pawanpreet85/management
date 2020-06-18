<?php 
session_start();
include('php/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
    else {    
//Code for student ID
        $count_my_page = ("managetid.txt");
        $hits = file($count_my_page);
        $hits[0] ++;
        $fp = fopen($count_my_page , "w");
        fputs($fp , "$hits[0]");
        fclose($fp); 
        $StudentId= $hits[0];   

        $section_name=$_POST['section_name'];
        $status=1;

        $sql="INSERT INTO sections (section_name,status) VALUES(:section_name,:status)";
// echo $sql; die;
        $query = $dbh->prepare($sql);

        $query->bindParam(':section_name',$section_name,PDO::PARAM_STR);

        $query->bindParam(':status',$status,PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

// var_dump($lastInsertId); die;
        if($lastInsertId)
        {
            echo '<script>alert("Section successfully added")</script>';
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin - Dashboard</title>

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

    <link href="css/ui.css" rel="stylesheet" />
    <link href="css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />	
    <link href="css/datepicker.css" rel="stylesheet" />	
    <link href="css/datatable/datatable.css" rel="stylesheet" />

    <script src="js/jquery-1.10.2.js"></script>	
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>

    <script src="js/dataTable/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        function valid()
        {
            if(document.signup.password.value!= document.signup.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'employeeEmail='+$("#emailid").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>  
</head>
<?php $page="add-section"; ?>
<?php
require_once("php/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Add Section  

                </h1>

            </div>
        </div>






        <div class="row" style="margin-bottom: 20px;">

            <div class="col-md-9 col-md-offset-1">
             <div class="panel panel-danger">
                <div class="panel-heading">
                 Add Section form
             </div>
             <div class="panel-body">

                <form name="signup" method="post" onSubmit="return valid();">
                    <div class="form-group">
                        <label>Section Name :</label>
                        <input class="form-control" type="text" name="section_name" maxlength="50" autocomplete="off" required />
                    </div>


                    <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
                    </div>                                
                    <button type="submit" name="signup" class="btn btn-danger" id="submit">Save </button>
                    <a href="all-sections.php" name="signup" class="btn btn-primary" id="submit">Back </a>

                </form>
            </div>
        </div>
    </div>
</div>











<!-------->




<!--------->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<div id="footer-sec">
   Invoice System | Brought To You By : <a href="http://www.techlabzinfosoft.com" target="_blank">Techlabz Infosoft Pvt Ltd</a>
</div>
<script type="text/javascript">     
 function printDiv(divName) {
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;

   window.print();

   document.body.innerHTML = originalContents;
}
</script>

<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="js/custom1.js"></script>


</body>
</html>
