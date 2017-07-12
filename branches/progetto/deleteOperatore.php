<?php
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');

	//dichiarazione variabili
	$username = $_GET['username'];

$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
$db = new PDO($col , 'root', '');
$db->beginTransaction();
$sql = $db->prepare('DELETE FROM operatoremuseo WHERE username = :username');
$sql->bindParam(':username', $username);
$sql->execute();
?>