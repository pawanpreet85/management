<?php 
session_start();
include('php/connection.php');
error_reporting(0);

$id = $_SESSION['rainbow_uid'];
$_SESSION['message'] = 'Something went wrong.';

if(count($_POST)>0){
    if($_POST['password']==Null){
        $update_Admin = "UPDATE admin set FullName='".$_POST['FullName']."',AdminEmail='".$_POST['AdminEmail']."',UserName='".$_POST['UserName']."' where id='".$id."'";

            $result = mysqli_query($con,$update_Admin);

            if($result){
                $_SESSION['message'] = 'Profile updated successfully';
            }
    }
    else{
        if($_POST['password'] == $_POST['confirmpassword']){
            $password = md5($_POST['password']);
            $update_Admin = "UPDATE admin set FullName='".$_POST['FullName']."',AdminEmail='".$_POST['AdminEmail']."',UserName='".$_POST['UserName']."',Password='".$password."' where id='".$id."'";

            $result = mysqli_query($con,$update_Admin);

            if($result){
                $_SESSION['message'] = 'Profile updated successfully';
            }
        }
    }
}

$select_admin = "SELECT * from admin where id='".$id."'";
$fetch_admin = mysqli_query($con,$select_admin);

$admin = mysqli_fetch_assoc($fetch_admin);


@extract($admin);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admn Profile</title>

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
<?php $page="profile"; ?>
<?php
require_once("php/header.php");
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Admin Profile   

                </h1>

            </div>
        </div>        
        

        <div class="row" style="margin-bottom: 20px;">

            <div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                <div class="panel-heading">
                   Admin Details
               </div>
               <div class="panel-body">
                <form name="update" method="post" action="my-profile.php">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="FullName" autocomplete="off" required value="<?=$FullName?>"/>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="UserName" autocomplete="off" required value="<?=$UserName?>"/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="AdminEmail" id="AdminEmail" onBlur="checkAvailability()"  autocomplete="off" required  value="<?=$AdminEmail?>"/>
                        <span id="user-availability-status" style="font-size:12px;"></span> 
                    </div>

                    <div class="form-group">
                        <label>Enter Password</label>
                        <input class="form-control" type="password" name="password" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label>Confirm Password </label>
                        <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
                    </div>                                
                    <button type="submit" name="signup" class="btn btn-danger" id="submit">Update Account</button>

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
<script src="js/jquery-1.10.2.js"></script>  
<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="js/custom1.js"></script>

<script>
    function saveNPrint(divName){
        $.ajax({
            type: 'POST',
            url: 'ajaxData.php',
            data: $('#invoice-form').serialize(),
            success:function(data){
                if(data=='Done'){

                    window.location.href = "finalInvoice.php";

            //         var printContents = document.getElementById(divName).innerHTML;
            // var originalContents = document.body.innerHTML;
            // document.body.innerHTML = printContents;
            // window.print();
            // document.body.innerHTML = originalContents;


                    // window.print();
                }

            }
        });
    }
</script>

</body>
</html>