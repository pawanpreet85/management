<?php

$localhost='localhost';
$username='transport';
$password='transport';
$dbname='shivtransportcom_invoice3';

// $localhost='localhost';
// $username='root';
// $password='';
// $dbname='invoice';

$con=mysqli_connect($localhost,$username,$password,$dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// echo "Connected successfully";
// die;
?>