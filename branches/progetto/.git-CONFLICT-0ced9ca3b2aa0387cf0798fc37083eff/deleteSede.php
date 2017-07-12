<?php
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
	$id = $_GET['id'];
$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
$db = new PDO($col , 'root', '');
$db->beginTransaction();
$sql = $db->prepare('DELETE FROM sede WHERE id= :id');
$sql->bindParam(':id', $id);
$sql->execute();
?>