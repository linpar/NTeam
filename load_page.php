<?php
if(!$_POST['page']) die("0");
$page = $_POST['page'];
$page .= '.php';
$page = trim($page,"#");
$page = 'pages/'.$page;
if(file_exists($page))
	echo file_get_contents($page);
else if(file_exists('pages/404.php'))
	echo file_get_contents('pages/404.php');
else 
	echo "404 error";
?>
