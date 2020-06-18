
<?php
session_start();
//upload.php
include('php/config.php');

$id = $_SESSION['upload_id'];
$mid = $_SESSION['manager_id'];

// $id=1;
$folder_name = '../documents/';
$time=time();

if(!empty($_FILES))
{
	

	if($id>0){

		$temp_file = $_FILES['file']['tmp_name'];
	$location = $folder_name . $id.$_FILES['file']['name'];
	move_uploaded_file($temp_file, $location);
	$res = $id.$_FILES['file']['name']; 

		$sql="INSERT INTO  uploads (user_id,document) VALUES(:UserId,:Document)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':UserId',$id,PDO::PARAM_STR);
		$query->bindParam(':Document',$res,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
	}

	else if($mid>0){

		$temp_file = $_FILES['file']['tmp_name'];
	$location = $folder_name . $mid.$id.$_FILES['file']['name'];
	move_uploaded_file($temp_file, $location);
	$res = $mid.$id.$_FILES['file']['name']; 

		$sql2="INSERT INTO  manager_documnets (manager_id,documents) VALUES(:ManagerId,:Documents)";
		$query = $dbh->prepare($sql2);
		$query->bindParam(':ManagerId',$mid,PDO::PARAM_STR);
		$query->bindParam(':Documents',$res,PDO::PARAM_STR);
		$query->execute();
		$lastInsertIdManager = $dbh->lastInsertId();
	}
}

if(isset($_POST["name"]))
{
	$filename = $folder_name.$_POST["name"];


	unlink($filename);
}



$result = array();

$files = scandir('../documents');

$output = '<div class="row">';

if(false !== $files)
{
	foreach($files as $file)
	{
		if('.' !=  $file && '..' != $file)
		{
			$output .= '
			<div class="col-md-2">
			<img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
			<button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
			</div>
			';
		}
	}
}
$output .= '</div>';



echo $output;

?>
