<?php
//avvio sessione
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//connessione a database
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$PDO = new PDO($col , 'root', '');
	//dichiarazione variabili
	if($_POST['titolo'] === '')
    {
		$strdest = 'modEv.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 19)) === true && is_numeric(substr(rawurldecode($strdest), 19)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$titolo = $_POST['titolo'];
		
	if($_POST['data'] === '')
    {
		$strdest = 'modEv.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 19)) === false && is_numeric(substr(rawurldecode($strdest), 19)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
       return;	
    }
	else
		$data = $_POST['data'];
		
	if($_POST['descrizione'] === '')
		$descrizione = 'NULL';
	else
		$descrizione = "'".$_POST['descrizione']."'";
	
	if($_POST['sede_id'] === '')
    {
		$strdest = 'modEv.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 19)) === false && is_numeric(substr(rawurldecode($strdest), 19)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";  
       	return;	
    }
	else
		$sede_id = $_POST['sede_id'];
	
	//esecuzione query
if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    echo "accesso negato";
    }
  }
  else{
	$stmt = $PDO->prepare( 'UPDATE evento SET titolo = ?, descrizione = ?, data = ?, sede_id = ? WHERE id = ?');
	$stmt->execute( array($titolo,$descrizione,$data, $sede_id, $_GET['id']));

header('location: gestEv.php');
}

?>
</body>
</html>