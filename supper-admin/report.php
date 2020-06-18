<?php
session_start();
error_reporting(0);
include('php/connection.php');

unset($_SESSION["message"]);


if(isset($_GET['id'])){
    $getId = $_GET['id'];
    $delete_invoice = "DELETE from invoice where id='".$getId."'";
    
    $result = mysqli_query($con,$delete_invoice);

    if($result){
        $_SESSION['message'] = 'Invoice  deleted successfully';
    }
    else {
        $_SESSION['message'] = 'Something went wrong';
    }
}


$select_invoice = "SELECT * from invoice";

$fetch_invoice = mysqli_query($con,$select_invoice);

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
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="js/jquery-1.10.2.js"></script> 
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>

    <script src="js/dataTable/jquery.dataTables.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) { ?>
        var msg= "<?php echo $_SESSION['message'];?>";
            alert(msg);
        <?php  }  ?>
    </script>


</head>
<?php $page="report"; ?>
<?php
require_once("php/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"> Invoice Report </h1>
            </div>

            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Registration
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Invoice Number</th>
                                    <th>Manage ID</th>
                                    <th>Consignor </th>
                                    <th>Mobile Number</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($invoice = mysqli_fetch_array($fetch_invoice)){

                                    @extract($invoice)
                                    ?>                                 
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i++;?></td>
                                        <td class="center"><?=$Date1?></td>
                                        <td class="center"><?=$Inno?></td>
                                        <td class="center"><?=$ManageId?></td>
                                        <td class="center"><?=$Consignor?></td>
                                        <td class="center"><?=$Mob2?></td>
                                        <td class="center"><?=$Total1?></td>
                                        <td class="center"><?php if($invoice['Status']==1)
                                        {
                                            echo "Active";
                                        } else {


                                            echo "Blocked";
                                        }
                                        ?></td>
                                        <td class="center">
                                            <a href="finalInvoice.php?id=<?=$id?>" class="btn btn-primary" sty
                                                c>Print</a>
                                                <a href="edit-invoice.php?id=<?=$id?>" class="btn btn-primary" style="background: #fff"><i class="fa fa-pencil" style="color: #000"></i></a>
                                                <a href="report.php?id=<?=$id?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        
        










        <!-------->



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
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>


</body>
</html>
