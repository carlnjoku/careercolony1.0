<?php
include 'db.php';

session_start();
$session_uid='1'; // $_SESSION['user_id'];

include 'userUpdates.php';
$userUpdates = new userUpdates($db);

include_once 'getExtension.php';

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST" && isset($session_uid))
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];


if(strlen($name))
{
$ext = getExtension($name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024))
{
$actual_image_name = time().$session_uid.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
$bgSave='<div id="uX'.$session_uid.'" class="bgSave wallbutton blackButton">Save Cover</div>';
if(move_uploaded_file($tmp, $path.$actual_image_name))
{

$data=$userUpdates->userBackgroundUpdate($session_uid,$actual_image_name);
if($data)
echo $bgSave.'<img src="'.$path.$actual_image_name.'"  id="timelineBGload" class="headerimage ui-corner-all" style="top:0px"/>';

}				
else
{
echo "Fail upload folder with read access.";
}
}
else
echo "Image file size max 1 MB";
}
else
echo "Invalid file format.";
}

else
echo "Please select image..!";

exit;
}
?>
