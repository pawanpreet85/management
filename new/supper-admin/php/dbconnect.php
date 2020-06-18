<?php
//error_reporting(0);
ob_start();
session_start();
$siteName = "Cipet.in";

// //DEFINE("BASE_URL","http://cipetbhopal.com/");
// DEFINE("BASE_URL","http://localhost/rainbow/");

// DEFINE ('DB_USER', 'transport');
// DEFINE ('DB_PSWD', 'transport'); 
// DEFINE ('DB_HOST', 'localhost'); 
// DEFINE ('DB_NAME', 'shivtransportcom_invoice3'); 

// date_default_timezone_set('Asia/Calcutta'); 
// $conn =  new mysqli(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
// if($conn->connect_error)
// die("Failed to connect database ".$conn->connect_error );
// else
// echo "Done";
// die;


$localhost='localhost';
$username='transport';
$password='transport';
$dbname='shivtransportcom_invoice3';

// DEFINE ('DB_USER', 'transport');
// DEFINE ('DB_PSWD', 'transport'); 
// DEFINE ('DB_HOST', 'localhost'); 
// DEFINE ('DB_NAME', 'shivtransportcom_invoice3'); 

$con=mysqli_connect($localhost,$username,$password,$dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 