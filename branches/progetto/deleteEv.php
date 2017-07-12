<?php
session_start();


	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
	$id = $_GET['id'];
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$db = new PDO($col , 'root', '');
	$db->beginTransaction();
    if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    echo "Voleeeeeevi";
    }
  }
  else{
	$sql = $db->prepare('DELETE FROM evento WHERE id = :id');
	$sql->bindParam(':id', $id);
	$sql->execute();
    }
}
?>