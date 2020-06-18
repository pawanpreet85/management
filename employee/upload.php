
<?php
session_start();
//upload.php
include('php/config.php');

$id = $_SESSION['rainbow_employeeid'];
// echo $id; die;
$folder_name = '../documents/';
$time=time();

if(!empty($_FILES))
{
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
