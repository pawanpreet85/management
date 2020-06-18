<?php 
session_start();
include('php/connection.php');



$lastId = "SELECT * from invoice order by id limit 1";

$get = mysqli_query($con,$lastId);

    $id = mysqli_fetch_assoc($get);


    $invoice = $id['id']+1;
    $invoice = "INNO".(sprintf("%04d", $invoice));
    
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

</script>

</head>
<?php $page="invoice"; ?>
<?php
require_once("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h2 style="text-align:center;"> Welcome to <strong> Invoice System</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                
                  <div class="col-md-12">
                
                <form name="signup" method="post" id="invoice-form" >
                             <table bgcolor = "pink"  border =1 Align= "center" class="table"  >
         <tr>
           <td rowspan =5 >image logo </td>
            <td colspan =3 > Shiv Transport PVT LTD </td>
            <td colspan = 2   > L.R No .:<input  type="text" name="lrno"   autocomplete="off" required  /> </td>
          </tr>
    
            <tr> 
           <td colspan =3 >E -155 , BK DUTT COLONY LODHI ROAD , NEW DELHI </td>
           <td colspan = 2 > Date: <input type="date" name="date1" autocomplete="off" required /> </td>
            </tr>
    <!-------------------->
         <tr>
           <td colspan =3 > Mob No :<input  type="text" name="mob1" maxlength="10"autocomplete="off" required /> </td> 
           <td rowspan =2 colspan=2> Vehicle No:<input  type="text" name="vehicle"   autocomplete="off" required  /> </td>
         </tr>
    <!-------------------->
     <tr>
          <td rowspan = 2> Pan No : <input  type="text" name="pan"   autocomplete="off" required  /></td>
          <td colspan =2> CIN :<input  type="text" name="cin"   autocomplete="off" required  /> </td>
     </tr>
     <!-------------------->
     <tr>
          
          <td colspan =4  > Tax paid by : GST </td> 
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 > Consignor : <input  type="text" name="consignor"   autocomplete="off" required  /></td>
         <td rowspan =2 colspan =2> From :<input  type="text" name="from1"   autocomplete="off" required  /> </td>
         <td rowspan =4 > per kg <input type="text" name="perkg" autocomplete="off" required ></td>
        
    </tr>
    <!-------------------->
     <tr>
           <td colspan = 2 > Mob no <input  type="text" name="mob2"   autocomplete="off" required  />
 </td>
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 >Consignee :<input type="text" name="consignee" autocomplete="off" required > </td>
         <td rowspan = 2 colspan =2> To :   <input type="text" name="to1" autocomplete="off" required ></td> 
     </tr>
     <!-------------------->
     <tr>
          <td colspan =2> Mob No - <input type="text" name="mob3" autocomplete="off" required ></td>
     </tr>
     <!-------------------->
     <tr>
           <td > No of Articles </td>
           <td > Descriptions of Goods
                      (side to Contain ) OWNER RISK </td>
           <td colspan =2>TBB</td>
           <td rowspan = 3 width= 20%> FREIGHT <input type="text" name="freight" autocomplete="off" required ></td>
           
     </tr>
     <!-------------------->
     <tr>

            <td><input type="text" name="noarticle" autocomplete="off" required ></td>
            <td> <input type="text" name="description" autocomplete="off" required ></td><br>
            
            <td rowspan =2> value rs<input type="text" name="value" autocomplete="off" required > </td>
            <td rowspan =2> Actual kgs<input type="text" name="actualkg" autocomplete="off" required >  </td>
     </tr>
      <tr>

             <td><input type="text" name="noarticle" autocomplete="off" required ></td>
            <td> <input type="text" name="description" autocomplete="off" required ></td><br><br>
            
            
     </tr>
     
     <!-------------------->
    
           
            <tr>
            <td rowspan =4> P.Marks :-<input type="text" name="pmark" autocomplete="off" required ></td>
            <td rowspan =4> Charged Kgs :<input type="text" name="chargekg" autocomplete="off" required ></td>
           
            <td rowspan =4 >TOTAL :<input type="text" name="total2" autocomplete="off" required ></td>
            
     </tr>
     <!-------------------->
     <tr>
           
            <td colspan =2 > invoice no- <input type="text" name="inno" autocomplete="off" required value="<?php echo $invoice; ?>" readonly></td>
     </tr>
     <!-------------------->
     <tr>
     <tr>
        <td> Total : <input type="text" name="total1" autocomplete="off" required > </td>

        <td> Eway bill no :<input type="text" name="eway" autocomplete="off" required ></td>
        </tr>
        <tr>
         <td colspan =3 > Remarks <input type="text" name="remark" autocomplete="off" required ></td>

      </td>
         <td> Driver copy </td>
         <td> for SM Logistics Pvt ltd </td>
          
      </tr>    
     <input type="hidden" name="InvoiceFormat" id="InvoiceFormat" value="invoice">
    </table>





 <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>                                
<button type="button" onclick="saveNPrint('invoice-form')" name="signup" class="btn btn-danger" id="submit">SAVE </button>

                                    </form></div>
                    </div>
                    
                    
                    

                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        Invoice System | Brought To You By : <a href="http://www.techlabzinfosoft.com/" target="_blank">Techlabz Infosoft Pvt Ltd</a>
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
