<?php
// including the config file
include('config.php');
$pdo = connect();

// get request params
$last_id = $_POST['last_id'];
$limit = 5; // default value
if (isset($_POST['limit'])) {
	$limit = intval($_POST['limit']);
}

// select items for page params
try {
	$sql = 'SELECT * FROM items WHERE id > :last_id ORDER BY id ASC LIMIT 0, :limit';
	$query = $pdo->prepare($sql);
	$query->bindParam(':last_id', $last_id, PDO::PARAM_INT);
	$query->bindParam(':limit', $limit, PDO::PARAM_INT);
	$query->execute();
	$list = $query->fetchAll();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

$last_id = 0;
foreach ($list as $rs) {
    $last_id = $rs['id'];
    echo '<li>';
    echo '<h2>'.$rs['title'].'</h2>';
    echo '<img src="'.$rs['photo'].'">';
    echo '<p>'.$rs['description'].'</p>';
    echo '</li>';
}

if ($last_id != 0) {
	echo '<script type="text/javascript">var last_id = '.$last_id.';</script>';
}

// sleep for 1 second to see loader, it must be deleted in prodection
sleep(1);
?>


