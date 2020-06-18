<?php 
session_start();
include('php/connection.php');
error_reporting(0);

$id = $_SESSION['rainbow_employeeid'];
unset($_SESSION['message']);



$uid = $_GET['uid'];


$_SESSION['upload_id'] = $_GET['uid'] ?? '0';
$_SESSION['manager_id'] = $_GET['mid'] ?? '0';

//Delete Manage
    if(!empty($_GET['del']))
    {
       $did=$_GET['del'];
        
        $del_upload = "DELETE FROM uploads WHERE id='".$did."'";



$del = mysqli_query($con,$del_upload);

        // header('location:upload_documents.php');
    }

     if(!empty($_GET['delm']))
    {
       $did=$_GET['delm'];
        
        $del_upload = "DELETE FROM manager_documnets WHERE id='".$did."'";



$del = mysqli_query($con,$del_upload);

        // header('location:upload_documents.php');
    }

@extract($admin);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Profile</title>

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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<script>
    <?php if(isset($_SESSION['message'])) { ?>
        var msg= "<?php echo $_SESSION['message'];?>";
            alert(msg);
        <?php  }  ?>
</script>

</head>
<?php $page="document"; ?>
<?php
require_once("php/header.php");
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Upload Documents   

                </h1>

            </div>
        </div>        
        

        <div class="row" style="margin-bottom: 20px;">

            <div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                <div class="panel-heading">
                   Upload Your Documents
               </div>
               <div class="panel-body">
               <form action="upload.php" class="dropzone" id="dropzoneFrom">

</form>
<br>
<a href="" class="btn btn-danger">Save</a>
<!-- <a href="index.php" class="btn btn-primary">Back</a> -->
            </div>
        </div>
    </div>
</div>


<?php
  if(!empty($_GET['uid'])){


 $select_upload = "SELECT * from uploads where user_id='".$_GET['uid']."'";



$fetch_upload = mysqli_query($con,$select_upload);

while($rowData = mysqli_fetch_assoc($fetch_upload))
{

                                    ?>
<div class="row">
    <div class="col-md-9 col-md-offset-1">
    <div class="col-sm-1 col-xs-2"><a href="upload_documents.php?uid=<?php echo $_GET['uid']; ?>&del=<?php echo $rowData['id']; ?>"><i class="fa fa-trash"></i></div>
    <div class="col-sm-11 col-xs-10">
        <a href="../documents/<?php echo $rowData['document'] ?>" target="blank"><?php echo $rowData['document'] ?></a>
    </div>
</div>
</div>

<?php }
}

if(!empty($_GET['mid'])){


$select_upload = "SELECT * from manager_documnets where manager_id='".$_GET['mid']."'";



$fetch_upload = mysqli_query($con,$select_upload);

while($rowData = mysqli_fetch_assoc($fetch_upload))
{

                                    ?>
<div class="row">
    <div class="col-md-9 col-md-offset-1">
    <div class="col-sm-1 col-xs-2"><a href="upload_documents.php?mid=<?php echo $_GET['mid']; ?>&delm=<?php echo $rowData['id']; ?>"><i class="fa fa-trash"></i></div>
    <div class="col-sm-11 col-xs-10">
        <a href="../documents/<?php echo $rowData['documents'] ?>" target="blank"><?php echo $rowData['documents'] ?></a>
    </div>
</div>
</div>

<?php }



} ?>

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
   
Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg,.pdf,.doc",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 function list_image()
 {
    id = <?php echo $id; ?>
  $.ajax({
   url:"upload.php",
   data : {Id: id}
   success:function(data){
    $('#preview').html(data);
   }
  });
 }


$(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
    id = <?php echo $id; ?>
  $.ajax({
   url:"upload.php",
   method:"POST",
   data:{name:name, Id: id},
   success:function(data)
   {
    list_image();
   }
  })
 });

</script>

</body>
</html>