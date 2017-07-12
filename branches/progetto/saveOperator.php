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
	include 'util.php';
	//connessione a database
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$PDO = new PDO($col , 'root', '');
	//dichiarazione variabili
	//dichiarazione variabili
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
	if($_POST['username'] === '')
		header('location: addOperatore.php?err=1');
	else
		$username = $_POST['username'];
	
	if($_POST['email'] === '')
		header('location: addOperatore.php?err=1');
	else
		$email = $_POST['email'];
		
	if($_POST['telefono'] === '')
		$telefono = null;
	else
		$telefono = $_POST['telefono'];
		
	if($_POST['nome'] === '')
		header('location: addOperatore.php?err=1');
	else
		$nome = $_POST['nome'];
	
	if($_POST['cognome'] === '')
		header('location: addOperatore.php?err=1');
	else
		$cognome = $_POST['cognome'];
		
	if($_POST['cf'] === '')
		$cf = null;
	else
		$cf = $_POST['cf'];
	
	if($_POST['dataN'] === '')
		header('location: addOperatore.php?err=1');
	else
		$dataN = $_POST['dataN'];
	
	if($_POST['amministratore'] === '')
		header('location: addOperatore.php?err=1');
	else
		$amministratore = $_POST['amministratore'];
	
	if($_POST['citta'] === '')
		$citta = null;
	else
		$citta = $_POST['citta'];
		
	if($_POST['sede_id'] === '')
		header('location: addOperatore.php?err=1');
	else
		$sede_id = $_POST['sede_id'];

	$password = generaPwdCasuale();
	//esecuzione query

    if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    echo "accesso negato";
    }
  }
  else{
	$sql = "INSERT INTO operatoremuseo(nome,cognome,cf,dataNascita,ammministratore,citta, sede_id, username,password,email,telefono) VALUES(".$PDO->quote($nome).",".$PDO->quote($cognome).",".$PDO->quote($cf).",".$PDO->quote($dataN).",".$PDO->quote($amministratore).",".$PDO->quote($citta).",".$PDO->quote($sede_id).",".$PDO->quote($username).",".$PDO->quote($password).",".$PDO->quote($email).",".$PDO->quote($telefono).");";
	$stmt = $PDO->prepare('INSERT INTO operatoremuseo(nome, cognome, cf, dataNascita, ammministratore, citta, sede_id, username, password, email, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute( array($nome,$cognome,$cf, $dataNascita, $ammministratore, $citta, $sede_id, $username, $password, $email, $telefono));

echo "La password per l'utente appena registrato e': ".$password;
}


?>
</body>
</html>