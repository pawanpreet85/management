<?php

include('php/connection.php');
session_start();
// $_SESSION['rainbow_uid'];



// die;
if(isset($_REQUEST) && $_POST['InvoiceFormat']=="invoice"){

    $manageid = 'Admin'; 

	$message = "Something Went Wrong";

    $insert_invoice = "INSERT INTO invoice (ManageId,Lrno,Date1,Mob1,pan,Cin,Vehicle,Consignor,Mob2,From1,To1,Consignee,Mob3,Perkg,Noarticle,Description,Value,Actualkg,Freight,Inno,Pmark,Chargekg,Total1,Total2,Eway,Remark,Status) VALUES ('".$manageid."','".$_POST['lrno']."','".$_POST['date1']."','".$_POST['mob1']."','".$_POST['pan']."','".$_POST['cin']."','".$_POST['vehicle']."','".$_POST['consignor']."','".$_POST['mob2']."','".$_POST['from1']."','".$_POST['to1']."','".$_POST['consignee']."','".$_POST['mob3']."','".$_POST['perkg']."','".$_POST['noarticle']."','".$_POST['description']."','".$_POST['value']."','".$_POST['actualkg']."','".$_POST['freight']."','".$_POST['inno']."','".$_POST['pmark']."','".$_POST['chargekg']."','".$_POST['total1']."','".$_POST['total2']."','".$_POST['eway']."','".$_POST['remark']."','1')";
    $create = mysqli_query($con, $insert_invoice);


if($create){ 
    $_SESSION['message'] = "Data inserted successfully."; 
    $message = "Inserted";
    echo "Done";
    // return $message;

    // header("Location:".$_SERVER[REQUEST_URI]);
} else { 
    $_SESSION['message'] = "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($con); 
                            // header("Location:".$_SERVER[REQUEST_URI]);
                            // exit();
}  

}



?>