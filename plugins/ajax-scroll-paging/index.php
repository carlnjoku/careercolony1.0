<?php
// including the config file
include('config.php');
$pdo = connect();
// select 4 items ordered by id
$sql = 'SELECT * FROM items ORDER BY id ASC LIMIT 0, 4';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Scroll Paging Using jQuery, PHP and MySQL</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="images/BeWebDeveloper.png" alt="BeWebDeveloper" />
        </div><!-- header -->
        <h1 class="main_title">Ajax Scroll Paging Using jQuery, PHP and MySQL</h1>
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['id']; // keep the last id for the paging
                    ?>
                    <li>
                        <h2><?php echo $rs['title']; ?></h2>
                        <img src="<?php echo $rs['photo']; ?>">
                        <p><?php echo $rs['description']; ?></p>
                    </li>
                    <?php
                }
                ?>
                <script type="text/javascript">var last_id = <?php echo $last_id; ?>;</script>
            </ul>
            <!-- this is the paging loader, now is hidden, it wiil be shown when we scroll to bottom --> 
            <p id="loader"><img src="images/ajax-loader.gif"></p>
        </div><!-- content -->    
        <div class="footer">
            Powered by <a href="http://www.bewebdeveloper.com/">bewebdeveloper.com</a>
        </div><!-- footer -->
    </div><!-- container -->
</body>
</html>
