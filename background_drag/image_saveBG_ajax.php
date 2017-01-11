 <?php
include 'db.php';

session_start();
$session_uid='1'; // $_SESSION['user_id'];

include 'userUpdates.php';
$userUpdates = new userUpdates($db);
if(isset($_POST['position']) && isset($session_uid))
{

$position=$_POST['position'];
$data=$userUpdates->userBackgroundPositionUpdate($session_uid,$position);
if($data)
echo $position;

}
?>
