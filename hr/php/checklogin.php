<?php

if(!isset($_SESSION['rainbow_manageid']))
echo '<script type="text/javascript">window.location="login.php"; </script>';
elseif($_SESSION['role']!='manager'){
	echo '<script type="text/javascript">window.location="login.php"; </script>';
}

?>