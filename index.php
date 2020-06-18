<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    a{
        color: white;
        text-decoration: none;
        
    }
    h1,h2{
        font-family: roboto;
   color: black;
        
    }
    .jumbotro {
        
        
        
    padding-top: 48px;
    padding-bottom: 48px;
        align-content: center;
        font-family: roboto;

    }
    .jumbotro{
            color: inherit;
    
    }
    .Main{
        margin-top: 40px;
         margin-left: 30%;
        padding: 30px;
    }
    
.container {
   
  position: relative;
  width: 15%;
  max-width: 400px;
}

.image {
border-radius:50%;
  display: block;
  width: 100%;
  height: auto;
}
    body{
        background-image: url(background%20front.jpg);
        background-size: 1550px;
    }

/*.overlay {
border-radius:50%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 65%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  background-color: black;
}

.container:hover .overlay {
  opacity: 0.5;
}

.icon {
  color: white;
  font-size: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-user:hover {
  color: #eee;
}
    */
</style>
</head>
<body>
<center>
  <div class="jumbotro text-center">
      
    <h1 style="font-size: 50px;font-weight: 500;" >Welcome</h1>
    <p style="margin-bottom: -10px;font-weight: 500;"> to</p><br>
      <p style="font-size: 20px;font-weight: 500; margin-bottom: -10px;"> ATMC DMS</p>
  </div></center>

    <div class="Main">

        <div class="container"style="float:left;">
  <img src="people-round-icons-young-couple-cartoon_18591-604.jpg" alt="Avatar" class="image">
            <center><button type="button" class="btn btn-primary" style="margin-top: 20px;"> <a href="supper-admin/login.php" style="text-decoration: none;color: white;">ADMIN</a></button></center>
  <div class="overlay">
 
  </div>
  
</div>
<div class="container"style="float:left;margin-left:40px;" >
  <img src="hr.jpg" alt="Avatar" class="image">
    <center><button type="button" class="btn btn-primary" style="width: 100px;margin-top: 20px;"><a href="hr/login.php" style="text-decoration: none;color: white;" >MANAGER</a></button></center>
  <div class="overlay">
  <!--<a href="http://localhost/HrManagement/hr/login.php" class="icon" title="User Profile">
    <i class="fa fa-user"></i>
  </a>-->
  </div>
  
</div>
<div class="container"style="float:left;margin-left:40px;">
  <img src="employes.jpg" alt="Avatar" class="image">
    <center><button type="button" class="btn btn-primary" style="margin-top: 20px;text-decoration: none;"> <a href="employee/login.php" style="text-decoration: none;color: white;" >STAFF</a></button></center>
  <div class="overlay">
 <!-- <a href="HrManagement/employee/login.php" class="icon" title="User Profile">
    <i class="fa fa-user"></i>
  </a>-->
      
  </div>
    
</div>

        </div>
</body>
</html>
