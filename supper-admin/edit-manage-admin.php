<?php 
session_start();
include('php/connection.php');

$id = $_GET['id'];

unset($_SESSION["msg"]);

if(count($_POST)>0)
{   
    if(!empty($_POST['password'])){
        if($_POST['password']==$_POST['confirmpassword']){
            $password = md5($_POST['password']);
            $update_admin = "UPDATE manage set FullName='".$_POST["fullname"]."',EmailId='".$_POST["email"]."',MobileNumber='".$_POST["mobileno"]."',Password='".$password."' where id='".$id."'"; 
        }
    }
    else{
        $update_admin = "UPDATE manage set FullName='".$_POST["fullname"]."',EmailId='".$_POST["email"]."',MobileNumber='".$_POST["mobileno"]."' where id='".$id."'"; 
    }
    $result = mysqli_query($con,$update_admin);        

    if(!empty($result)) {
      $_SESSION['msg'] = "Manage Updated Successfully";
  }
  else{
    $_SESSION['msg']="Something went wrong";
}
}

$page='manage';
$select_admin = "SELECT * from manage where id='".$id."'";

$fetch_admin = mysqli_query($con,$select_admin);

$admin = mysqli_fetch_assoc($fetch_admin);

@extract($admin);


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
                data:'emailid='+$("#emailid").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }

        <?php if(isset($_SESSION['msg'])) { ?>
        var msg= "<?php echo $_SESSION['msg'];?>";
            alert(msg);
        <?php  }  ?>
    </script>  
</head>
<?php
include("php/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit Manager Info  

                </h1>

            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">

            <div class="col-md-9 col-md-offset-1">
             <div class="panel panel-danger">
                <div class="panel-heading">
                 Edit Form
             </div>
             <div class="panel-body">
                <form name="signup" method="post" action="edit-manage-admin.php?id=<?=$id?>">

                    <div class="form-group">
                        <label>ManageId</label>
                        <input class="form-control" type="text" name="manageid" autocomplete="off" required value="<?=$ManageId?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="fullname" autocomplete="off" required value="<?=$FullName?>" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" id="emailid"  autocomplete="off" required  value="<?=$EmailId?>"/>
                        <span id="user-availability-status" style="font-size:12px;"></span> 
                    </div>

                    <div class="form-group">
                        <label>Mobile Number :</label>
                        <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required value="<?=$MobileNumber?>"/>
                    </div>



                    <div class="form-group">
                        <label>Enter Password</label>
                        <input class="form-control" type="password" name="password" autocomplete="off"  />
                    </div>

                    <div class="form-group">
                        <label>Confirm Password </label>
                        <input class="form-control"  type="password" name="confirmpassword" autocomplete="off"  />
                    </div>
                    <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
                    </div>                                
                    <button type="submit" name="edit" class="btn btn-danger" id="submit">Update </button>
                    <a href="manage-admin.php?sid=<?php echo $_GET['sid']; ?>" name="signup" class="btn btn-primary" id="submit">Back </a>

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
