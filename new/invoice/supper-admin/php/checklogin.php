<?php

if(!isset($_SESSION['rainbow_uid']))
echo '<script type="text/javascript">window.location="login.php"; </script>';
elseif($_SESSION['role']!='superadmin'){
	echo '<script type="text/javascript">window.location="login.php"; </script>';
}


?>