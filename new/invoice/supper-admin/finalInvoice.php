<?php

include('php/connection.php');
session_start();
$id = "";

if(isset($_GET['id'])){
  $getId = $_GET['id'];
  
  $lastId = "SELECT * from invoice where id='".$getId."'";
    $get = mysqli_query($con,$lastId);
    $id = mysqli_fetch_assoc($get);
}
else{ 

$lastId = "SELECT * from invoice order by id DESC limit 1";
    $get = mysqli_query($con,$lastId);
    $id = mysqli_fetch_assoc($get);
}
    
   
    @extract($id);


?>
                             <table bgcolor = "pink"  border =1 Align= "center" class="table"  >
         <tr>
           <td rowspan =5 >image logo </td>
            <td colspan =3 > SM LOGISTICS PVT LTD </td>
            <td colspan = 2   > L.R No .:<input  type="text" name="lrno"   autocomplete="off" required  value="<?=$Lrno ?>"/> </td>
          </tr>
    
            <tr> 
           <td colspan =3 >E -155 , BK DUTT COLONY LODHI ROAD , NEW DELHI </td>
           <td colspan = 2 > Date: <input type="date" name="date1" autocomplete="off" required value="<?=$Date1 ?>"/> </td>
            </tr>
    <!-------------------->
         <tr>
           <td colspan =3 > Mob No :<input  type="text" name="mob1" maxlength="10"autocomplete="off" required value="<?=$Mob1 ?>" /> </td> 
           <td rowspan =2 colspan=2> Vehicle No:<input  type="text" name="vehicle"   autocomplete="off" required  value="<?=$Vehicle ?>"/> </td>
         </tr>
    <!-------------------->
     <tr>
          <td rowspan = 2> Pan No : <input  type="text" name="pan"   autocomplete="off" required  value="<?=$pan ?>"/></td>
          <td colspan =2> CIN :<input  type="text" name="cin"   autocomplete="off" required  value="<?=$Cin ?>"/> </td>
     </tr>
     <!-------------------->
     <tr>
          
          <td colspan =4  > Tax paid by : GST </td> 
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 > Consignor : <input  type="text" name="consignor"   autocomplete="off" required  value="<?=$Consignor ?>"/></td>
         <td rowspan =2 colspan =2> From :<input  type="text" name="from1"   autocomplete="off" required value="<?=$From1 ?>" /> </td>
         <td rowspan =4 > per kg <input type="text" name="perkg" autocomplete="off" required value="<?=$Perkg ?>"></td>
        
    </tr>
    <!-------------------->
     <tr>
           <td colspan = 2 > Mob no <input  type="text" name="mob2"   autocomplete="off" required  value="<?=$Mob2 ?>"/>
 </td>
     </tr>
     <!-------------------->
     <tr>
         <td colspan =2 >Consignee :<input type="text" name="consignee" autocomplete="off" required value="<?=$Consignee ?>"> </td>
         <td rowspan = 2 colspan =2> To :   <input type="text" name="to1" autocomplete="off" required value="<?=$To1 ?>"></td> 
     </tr>
     <!-------------------->
     <tr>
          <td colspan =2> Mob No - <input type="text" name="mob3" autocomplete="off" required value="<?=$Mob3 ?>"></td>
     </tr>
     <!-------------------->
     <tr>
           <td > No of Articles </td>
           <td > Descriptions of Goods
                      (side to Contain ) OWNER RISK </td>
           <td colspan =2>TBB</td>
           <td rowspan = 3 width= 20%> FREIGHT <input type="text" name="freight" autocomplete="off" required value="<?=$Freight ?>"></td>
           
     </tr>
     <!-------------------->
     <tr>

            <td><input type="text" name="noarticle" autocomplete="off" required value="<?=$Noarticle ?>"></td>
            <td> <input type="text" name="description" autocomplete="off" required value="<?=$Description ?>"></td><br>
            
            <td rowspan =2> value rs<input type="text" name="value" autocomplete="off" required value="<?=$Value ?>"> </td>
            <td rowspan =2> Actual kgs<input type="text" name="actualkg" autocomplete="off" required value="<?=$Actualkg ?>">  </td>
     </tr>
      <tr>

             <td><input type="text" name="noarticle" autocomplete="off" required value="<?=$Noarticle ?>"></td>
            <td> <input type="text" name="description" autocomplete="off" required value="<?=$Description ?>"></td><br><br>
            
            
     </tr>
     
     <!-------------------->
    
           
            <tr>
            <td rowspan =4> P.Marks :-<input type="text" name="pmark" autocomplete="off" required value="<?=$Pmark ?>"></td>
            <td rowspan =4> Charged Kgs :<input type="text" name="chargekg" autocomplete="off" required value="<?=$Chargekg ?>"></td>
           
            <td rowspan =4 >TOTAL :<input type="text" name="total2" autocomplete="off" required value="<?=$Total2 ?>"></td>
            
     </tr>
     <!-------------------->
     <tr>
           
            <td colspan =2 > invoice no- <input type="text" name="inno" autocomplete="off" required value="<?=$Inno ?>"></td>
     </tr>
     <!-------------------->
     <tr>
     <tr>
        <td> Total : <input type="text" name="total1" autocomplete="off" required value="<?=$Total1 ?>"> </td>

        <td> Eway bill no :<input type="text" name="eway" autocomplete="off" required value="<?=$Eway ?>"></td>
        </tr>
        <tr>
         <td colspan =3 > Remarks <input type="text" name="remark" autocomplete="off" required value="<?=$Remark ?>"></td>

      </td>
         <td> Driver copy </td>
         <td> for SM Logistics Pvt ltd </td>
          
      </tr>    
     <input type="hidden" name="InvoiceFormat" id="InvoiceFormat" value="invoice">
    </table>
    <p style="text-align: center;">
    <input type="button" name="print" value="Print" onclick="window.print()" style="text-align: center; padding: 5px 20px; background-color: #555; color: #fff">
  </p>