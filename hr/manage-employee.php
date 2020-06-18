<?php
session_start();
error_reporting(0);
include('php/config.php');

$section = $_SESSION['SectionId'];

if(strlen($_SESSION['alogin'])==-1)
{   
    header('location:index.php');
}
else{ 

// code for block manage    
    if(isset($_GET['inid']))
    {
        $id=$_GET['inid'];
        $status=0;
        $sql = "update employees set status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);
        $query -> bindParam(':status',$status, PDO::PARAM_STR);
        $query -> execute();
        header('location:manage-employee.php');
    }


//code for active students
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $status=1;
        $sql = "update employees set status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);
        $query -> bindParam(':status',$status, PDO::PARAM_STR);
        $query -> execute();
        header('location:manage-employee.php');
    }
    
    //Delete Manage
    if(isset($_GET['delid']))
    {
        $id=$_GET['delid'];
        
        $sql = "DELETE FROM employees WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);

        $query -> execute();
        header('location:manage-employee.php');
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
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <script src="js/jquery-1.10.2.js"></script>	
        <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
        <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
        <script src="js/dataTable/jquery.dataTables.min.js"></script>
        <style>
        .fa-pencil { color: #777777; }
        .fa-pencil:hover { color: #000; }
    </style>
</head>
<?php $page="manage-employee"; ?>
<?php
require_once("php/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"> Employees  

                </h1>

            </div>

            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">



                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel-heading">
                                  Employee Registration
                              </div>
                          </div>
                          <div class="col-md-6">
                            <input type="search" name="employeeSearch" id="employeeSearch" class="form-control" onkeyup="getemployee()" placeholder="Search Employee Here ... " style="margin-top: 5px; width: 90%">
                        </div>
                    </div>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Email id </th>
                                    <th>Mobile Number</th>
                                    <th>Joining Date</th>
                                    <th>Documents</th>
                                    <th>Status</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dynamicEmployee">
                                <?php $sql = "SELECT * from employees where section='".$section."'";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                        {               ?>                                      
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->employee_id);?></td>
                                                <td class="center"><?php echo htmlentities($result->name);?></td>
                                                <td class="center"><?php echo htmlentities($result->email);?></td>
                                                <td class="center"><?php echo htmlentities($result->phone);?></td>
                                                <td class="center"><?php echo htmlentities($result->date_of_joining);?></td>
                                                <td>
                                                    <a href="upload_documents.php?uid=<?php echo htmlentities($result->id);?>" class="btn btn-warning">Documents</a>
                                                </td>
                                                <td class="center"><?php if($result->status==1)
                                                {
                                                    echo htmlentities("Active");
                                                } else {


                                                    echo htmlentities("Blocked");
                                                }
                                                ?></td>
                                                <td class="center">
                                                    <?php if($result->status==1)
                                                    {?>
                                                        <a href="manage-employee.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to block this Employee?');" >  <button class="btn btn-danger"> Inactive</button>
                                                        <?php } else {?>

                                                            <a href="manage-employee.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to active this Employee?');""><button class="btn btn-primary"> Active</button> 
                                                            <?php } ?>

                                                            <a href="edit-employee.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-primary" style="background: #fff"><i class="fa fa-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $cnt=$cnt+1;}} ?>                                      
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
               2019 @copy, All Rights Reserved.
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

       <script type="text/javascript">
           function getemployee(){
            var search = $('#employeeSearch').val();
            $.ajax({
             url: 'ajx.php',
             type: 'POST',
             data: {search: search, type : 'searchEmployee' },
             success: function (data) {
               $('#dynamicEmployee').empty();
               $('#dynamicEmployee').html(data);
           },
           failure: function (data) {
               alert('Something Went Wrong');
           }
       });
        }
    </script>

</body>
</html>
<?php } ?>