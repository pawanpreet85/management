<?php
//error_reporting(0);
ob_start();
session_start();
$siteName = "Cipet.in";

//DEFINE("BASE_URL","http://cipetbhopal.com/");
DEFINE("BASE_URL","http://localhost/rainbow/");

DEFINE ('DB_USER', 'invoicea');
DEFINE ('DB_PSWD', 'admin'); 
DEFINE ('DB_HOST', 'localhost'); 
DEFINE ('DB_NAME', 'invoicea'); 

date_default_timezone_set('Asia/Calcutta'); 
$conn =  new mysqli(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if($conn->connect_error)
die("Failed to connect database ".$conn->connect_error );