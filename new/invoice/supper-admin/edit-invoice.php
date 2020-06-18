<?php 
session_start();
include('php/connection.php');
$getId = $_GET['id'];

unset($_SESSION["message"]);

if(count($_POST)>0){
    $update_invoice = "UPDATE invoice set Lrno='".$_POST['lrno']."',Date1='".$_POST['date1']."',Mob1='".$_POST['mob1']."',pan='".$_POST['pan']."',Cin='".$_POST['cin']."',Vehicle='".$_POST['vehicle']."',Consignor='".$_POST['consignor']."',Mob2='".$_POST['mob2']."',From1='".$_POST['from1']."',To1='".$_POST['to1']."',Consignee='".$_POST['consignee']."',Mob3='".$_POST['mob3']."',Perkg='".$_POST['perkg']."',Noarticle='".$_POST['noarticle']."',Description='".$_POST['description']."',Value='".$_POST['value']."',Actualkg='".$_POST['actualkg']."',Freight='".$_POST['freight']."',Inno='".$_POST['inno']."',Pmark='".$_POST['pmark']."',Chargekg='".$_POST['chargekg']."',Total1='".$_POST['total1']."',Total2='".$_POST['total2']."',Eway='".$_POST['eway']."',Remark='".$_POST['remark']."',Status=1 where id='".$getId."'";
    $result = mysqli_query($con,$update_invoice);

    if($result)
    {
        $_SESSION['message'] = "Invoice updated successfully";
    }
    else{
        $_SESSION['message'] = "Something went wrong";
    }
}
  
  $lastId = "SELECT * from invoice where id='".$getId."'";
    $get = mysqli_query($con,$lastId);
    $id = mysqli_fetch_assoc($get);
    @extract($id);

    


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

<script>
    <?php if(isset($_SESSION['message'])) { ?>
        var msg= "<?php echo $_SESSION['message'];?>";
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
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h2 style="text-align:center;"> Edit <strong> Invoice System</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                
                  <div class="col-md-12">
                
                <form name="signup" method="post" id="invoice-form" action="edit-invoice.php?id=<?php echo $getId; ?>" >
                             <table bgcolor = "pink"  border =1 Align= "center" class="table"  >
         <tr>
           <td rowspan =5 >image logo </td>
            <td colspan =3 > Shiv Transport PVT LTD </td>
            <td colspan = 2   > L.R No .:<input  type="text" name="lrno"   autocomplete="off" required  value="<?=$Lrno?>"/> </td>
          </tr>
    
            <tr> 
           <td colspan =3 >E -155 , BK DUTT COLONY LODHI ROAD , NEW DELHI </td>
           <td colspan = 2 > Date: <input type="date" name="date1" autocomplete="off" required  value="<?=$Date1?>"/> </td>
            </tr>
    <!-------------------->
         <tr>
           <td colspan =3 > Mob No :<input  type="text" name="mob1" maxlength="10"autocomplete="off" required  value="<?=$Mob1?>"/> </td> 
           <td rowspan =2 colspan=2> Vehicle No:<input  type="text" name="vehicle"   autocomplete="off" required   value="<?=$Vehicle?>"/> </td>
         </tr>
    <!-------------------->
     <tr>
          <td rowspan = 2> Pan No : <input  type="text" name="pan"   autocomplete="off" required   value="<?=$pan?>"/></td>
          <td colspan =2> CIN :<input  type="text" name="cin"   autocomplete="off" required   value="<?=$Cin?>"/> </td>
     </tr>
     <!-------------------->
     <tr>
          
          <td colspan =4  > Tax paid by : GST </td> 
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 > Consignor : <input  type="text" name="consignor"   autocomplete="off" required   value="<?=$Consignor?>"/></td>
         <td rowspan =2 colspan =2> From :<input  type="text" name="from1"   autocomplete="off" required   value="<?=$From1?>"/> </td>
         <td rowspan =4 > per kg <input type="text" name="perkg" autocomplete="off" required  value="<?=$Perkg?>"></td>
        
    </tr>
    <!-------------------->
     <tr>
           <td colspan = 2 > Mob no <input  type="text" name="mob2"   autocomplete="off" required   value="<?=$Mob2?>"/>
 </td>
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 >Consignee :<input type="text" name="consignee" autocomplete="off" required  value="<?=$Consignee?>"> </td>
         <td rowspan = 2 colspan =2> To :   <input type="text" name="to1" autocomplete="off" required  value="<?=$To1?>"></td> 
     </tr>
     <!-------------------->
     <tr>
          <td colspan =2> Mob No - <input type="text" name="mob3" autocomplete="off" required  value="<?=$Mob3?>"></td>
     </tr>
     <!-------------------->
     <tr>
           <td > No of Articles </td>
           <td > Descriptions of Goods
                      (side to Contain ) OWNER RISK </td>
           <td colspan =2>TBB</td>
           <td rowspan = 3 width= 20%> FREIGHT <input type="text" name="freight" autocomplete="off" required  value="<?=$Freight?>"></td>
           
     </tr>
     <!-------------------->
     <tr>

            <td><input type="text" name="noarticle" autocomplete="off" required  value="<?=$Noarticle?>"></td>
            <td> <input type="text" name="description" autocomplete="off" required  value="<?=$Description?>"></td><br>
            
            <td rowspan =2> value rs<input type="text" name="value" autocomplete="off" required  value="<?=$Value?>"> </td>
            <td rowspan =2> Actual kgs<input type="text" name="actualkg" autocomplete="off" required  value="<?=$Actualkg?>">  </td>
     </tr>
      <tr>

             <td><input type="text" name="noarticle" autocomplete="off" required  value="<?=$Noarticle?>"></td>
            <td> <input type="text" name="description" autocomplete="off" required  value="<?=$Description?>"></td><br><br>
            
            
     </tr>
     
     <!-------------------->
    
           
            <tr>
            <td rowspan =4> P.Marks :-<input type="text" name="pmark" autocomplete="off" required  value="<?=$Pmark?>"></td>
            <td rowspan =4> Charged Kgs :<input type="text" name="chargekg" autocomplete="off" required  value="<?=$Chargekg?>"></td>
           
            <td rowspan =4 >TOTAL :<input type="text" name="total2" autocomplete="off" required  value="<?=$Total2?>"></td>
            
     </tr>
     <!-------------------->
     <tr>
           
            <td colspan =2 > invoice no- <input type="text" name="inno" autocomplete="off" required  value="<?=$Inno?>" readonly></td>
     </tr>
     <!-------------------->
     <tr>
     <tr>
        <td> Total : <input type="text" name="total1" autocomplete="off" required  value="<?=$Total1?>"> </td>

        <td> Eway bill no :<input type="text" name="eway" autocomplete="off" required  value="<?=$Eway?>"></td>
        </tr>
        <tr>
         <td colspan =3 > Remarks <input type="text" name="remark" autocomplete="off" required  value="<?=$Remark?>"></td>

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
<button type="submit" name="signup" class="btn btn-danger" id="submit">Update </button>

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
