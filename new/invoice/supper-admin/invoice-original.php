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
$count_my_page = ("invoiceid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$StudentId= $hits[0];   
$lrno=$_POST['lrno'];
$date1=$_POST['date1'];
$mob1=$_POST['mob1']; 
$pan=$_POST['pan'];
$cin=$_POST['cin'];
$vehicle=$_POST['vehicle']; 
$consignor=$_POST['consignor'];
$mob2=$_POST['mob2'];
$from1=$_POST['from1']; 
$to1=$_POST['to1'];
$consignee=$_POST['consignee'];
$mob3=$_POST['mob3']; 
$perkg=$_POST['perkg'];
$noarticle=$_POST['noarticle'];
$description=$_POST['description']; 
$value=$_POST['value'];
$actualkg=$_POST['actualkg'];
$freight=$_POST['freight']; 
$inno=$_POST['inno'];
$pmark=$_POST['pmark'];
$chargekg=$_POST['chargekg']; 
$total1=$_POST['total1'];
$total2=$_POST['total2'];
$eway=$_POST['eway']; 
$remark=$_POST['remark'];
$status=1;
$sql="INSERT INTO  invoice(ManageId,Lrno,Date1,Mob1,Pan,Cin,Vehicle,Consignor,Mob2,From1,To1,Consignee,Mob3,Perkg,Noarticle,Description,Value,Actualkg,Freight,Inno,Pmark,Chargekg,Total1,Total2,Eway,Remark,Status) VALUES(:ManageId,:lrno,:date1,:mob1,:pan,:cin,:vehicle,:consignor,:mob2,:from1,:to1,:consignee,:mob3,:perkg,:noarticle,:description,:value,:actualkg,:freight,:inno,:pmark,:chargekg,:total1,:total2,:eway,:remark,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':ManageId',$StudentId,PDO::PARAM_STR);
$query->bindParam(':lrno',$lrno,PDO::PARAM_STR);
$query->bindParam(':date1',$date1,PDO::PARAM_STR);
$query->bindParam(':mob1',$mob1,PDO::PARAM_STR);
$query->bindParam(':pan',$pan,PDO::PARAM_STR);
$query->bindParam(':cin',$cin,PDO::PARAM_STR);
$query->bindParam(':vehicle',$vehicle,PDO::PARAM_STR);
$query->bindParam(':consignor',$consignor,PDO::PARAM_STR);
$query->bindParam(':mob2',$mob2,PDO::PARAM_STR);
$query->bindParam(':from1',$from1,PDO::PARAM_STR);
$query->bindParam(':to1',$to1,PDO::PARAM_STR);
$query->bindParam(':consignee',$consignee,PDO::PARAM_STR);
$query->bindParam(':mob3',$mob3,PDO::PARAM_STR);
$query->bindParam(':perkg',$perkg,PDO::PARAM_STR);
$query->bindParam(':noarticle',$noarticle,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':value',$value,PDO::PARAM_STR);
$query->bindParam(':actualkg',$actualkg,PDO::PARAM_STR);
$query->bindParam(':freight',$freight,PDO::PARAM_STR);
$query->bindParam(':inno',$inno,PDO::PARAM_STR);
$query->bindParam(':pmark',$pmark,PDO::PARAM_STR);
$query->bindParam(':chargekg',$chargekg,PDO::PARAM_STR);
$query->bindParam(':total1',$total1,PDO::PARAM_STR);
$query->bindParam(':total2',$total2,PDO::PARAM_STR);
$query->bindParam(':eway',$eway,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your invoice Save successfull and your Invoice id is  "+"'.$StudentId.'")</script>';
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
<?php
include("php/header.php");
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
                
                <form name="signup" method="post" onSubmit="return valid();">
                             <table bgcolor = "pink"  border =1 Align= "center" class="table"  >
         <tr>
           <td rowspan =5 >image logo </td>
            <td colspan =3 > SM LOGISTICS PVT LTD </td>
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
           
            <td colspan =2 > invoice no- <input type="text" name="inno" autocomplete="off" required ></td>
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

     
     
    </table>





 <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>                                
<button type="submit" name="signup" class="btn btn-danger" id="submit">SAVE </button>

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
    


</body>
</html>
