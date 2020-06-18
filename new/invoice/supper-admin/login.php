<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['Username']));
$password =  mysqli_real_escape_string($conn,$_POST['Password']);

if($username=='' || $password=='')
{
$error='All fields are required';
}

$sql = "select * from admin where Username='".$username."' and Password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();

$_SESSION['rainbow_Username']=$res['Username'];
$_SESSION['rainbow_uid']=$res['id'];
$_SESSION['rainbow_name']=$res['name'];
$_SESSION['role']='superadmin';
echo '<script type="text/javascript">window.location="index.php"; </script>';

}else
{
$error = 'Invalid Username or Password';
}

}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

    
    
<title>Supper Admin Login </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css2/css/bootstrap.min.css">
<link rel="stylesheet" href="css2/css/bootstrap-theme.min.css">
<script src="../ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href="css2/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css2/css/style.css" rel="stylesheet" type="text/css" media="screen">
<style>
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}
</style>

</head>
<body class="login-page" >
  
   <div class="container"     style="margin-top: 90px;">
    <div class="col-md-3">

    </div>  
        <div class="col-md-6">
        
    </div>  
    <div class="col-md-3">

    </div>  
    <form class="form-login" action="login.php" method="post" id="login-form">
    <?php
                                    if($error!='')
                                    {                                   
                                    echo '<h5 class="text-danger text-center">'.$error.'</h5>';
                                    }
                                    ?>
    <img  src="../www.evermoltech.com/images/logo.png">
        <h3 class="form-login-heading "><span class="titledata">Supper Admin Login</span></h3><hr />
        <div id="error">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter User Id" name="Username" id="user_email" />
            <span id="check-e"></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter password" name="Password" id="password" />
        </div>
        <hr />
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="login" id="login_button">
            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Login Now
            </button> 
        </div> 
        
    
        
    </form>     
    </div>
</body>
</html>
