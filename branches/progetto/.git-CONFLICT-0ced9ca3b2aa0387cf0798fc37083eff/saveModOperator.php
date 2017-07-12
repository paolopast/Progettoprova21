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
	//dichiarazione variabili
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
	
	if($_POST['email'] === '')
    {
    	if(is_string($_GET['username']))
        {
			$strdest = 'modSede.php?err=1&username='.$_GET['username'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        echo "error";
    }
	else
		$email = $_POST['email'];
		
	if($_POST['telefono'] === '')
		$telefono = null;
	else
		$telefono =$_POST['telefono'];
		
	if($_POST['nome'] === '')
    {
    	if(is_string($_GET['username']))
        {
			$strdest = 'modSede.php?err=1&username='.$_GET['username'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        echo "error";
    }
	else
		$nome = $_POST['nome'];
	
	if($_POST['cognome'] === '')
    {
    	if(is_string($_GET['username']))
        {
			$strdest = 'modSede.php?err=1&username='.$_GET['username'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        echo "error";
    }
	else
		$cognome = $_POST['cognome'];
		
	if($_POST['cf'] === '')
		$cf = null;
	else
		$cf = $_POST['cf'];
	
	if($_POST['dataN'] === '')
    {
    	if(is_string($_GET['username']))
        {
			$strdest = 'modSede.php?err=1&username='.$_GET['username'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        echo "error";
    }
	else
		$dataN = $_POST['dataN'];
	
	if($_POST['amministratore'] !== 'true' && $_POST['amministratore'] !== 'false' )
	{
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        header('location: '.rawurldecode($strdest));
    	return;
    }
	else
		$amministratore = $_POST['amministratore'];
	
	if($_POST['citta'] === '')
		$citta = null;
	else
		$citta = $_POST['citta'];
		
	if($_POST['sede_id'] === '')
	{
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        header('location: '.rawurldecode($strdest));
    	return;
    }
	else
		$sede_id = $_POST['sede_id'];
	//esecuzione query
	$stmt = $PDO->prepare( 'UPDATE operatoremuseo SET nome = ?, cognome = ?, cf = ?, dataNascita = ?, ammministratore = ?, citta = ?, sede_id = ?, email = ?, telefono = ? WHERE username = ?');
	$stmt->execute( array($nome,$cognome,$cf, $dataN, $amministratore, $citta, $sede_id, $email, $telefono, $_GET['username']));

	
	header('location: gestOperatori.php');


?>
</body>
</html>