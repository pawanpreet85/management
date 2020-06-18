<?php

if(!isset($_SESSION['rainbow_employeeid']))
echo '<script type="text/javascript">window.location="login.php"; </script>';
elseif($_SESSION['role']!='employee'){
	echo '<script type="text/javascript">window.location="login.php"; </script>';
}

?>