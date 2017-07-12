<?php
//avvio sessione
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
        require('csrfpphplibrary/libs/csrf/csrfprotector.php');
csrfProtector::init();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	//dichiarazione variabili
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
	if($_POST['nome'] === '')
    {
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$nome = $_POST['nome'];
	
	if($_POST['anno'] === '')
		$anno = 'NULL';
	else
		$anno = "'".$_POST['anno']."'";
		
	if($_POST['autore'] === '')
		$autore = 'NULL';
	else
		$autore = "'".$_POST['autore']."'";
		
	if($_POST['proprietario'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$proprietario = $_POST['proprietario'];
	
	if($_POST['numPass'] === '')
		$numPass = 'NULL';
	else
		$numPass = "'".$_POST['numPass']."'";
		
	if($_POST['location'] === '')
		$location = 'NULL';
	else
		$location = "'".$_POST['location']."'";
	
	if($_POST['materiale'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$materiale = $_POST['materiale'];
	
	if($_POST['categoria'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$categoria = $_POST['categoria'];
	
	if($_POST['urlVideo'] === '')
		$urlVideo = 'NULL';
	else
		$urlVideo = "'".$_POST['urlVideo']."'";
		
	if($_POST['dataRicezione'] === '')
		$dataRicezione = 'NULL';
	else
		$dataRicezione = "'".$_POST['dataRicezione']."'";
		
	if($_POST['tecnica'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$tecnica = $_POST['tecnica'];
	
	if($_POST['periodoStorico'] === '')
		$periodoStorico = 'NULL';
	else
		$periodoStorico = "'".$_POST['periodoStorico']."'";
		
	if($_POST['dimensioni'] === '')
		$dimensioni = 'NULL';
	else
		$dimensioni = "'".$_POST['dimensioni']."'";
		
	if($_POST['peso'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$peso = $_POST['peso'];
	
	if($_POST['valore'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$valore = $_POST['valore'];
	
	if($_POST['dittaConsegna'] === '')
		$dittaConsegna = 'NULL';
	else
		$dittaConsegna = "'".$_POST['dittaConsegna']."'";
		
	if($_POST['integrita'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$integrita = $_POST['integrita'];
	
	if(isset($_POST['original']) === false)
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$original = $_POST['original'];
	
	if($_POST['luogoOrigine'] === '')
		$luogoOrigine = 'NULL';
	else
		$luogoOrigine = "'".$_POST['luogoOrigine']."'";
		
	if($_POST['infoStoriche'] === '')
		$infoStoriche = 'NULL';
	else
		$infoStoriche = "'".$_POST['infoStoriche']."'";
		
	if($_POST['descrizione'] === '')
		$descrizione = 'NULL';
	else
		$descrizione = "'".$_POST['descrizione']."'";
		
	if($_POST['restauriEffettuati'] === '')
		$restauriEffettuati = 'NULL';
	else
		$restauriEffettuati = "'".$_POST['restauriEffettuati']."'";
		
	if(isset($_POST['pubblicata']) === false)
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$pubblicata = $_POST['pubblicata'];
	
	if($_POST['dataPubblicazione'] === '')
		$dataPubblicazione = 'NULL';
	else
		$dataPubblicazione = "'".$_POST['dataPubblicazione']."'";
		
	if($_POST['sede_id'] === '')
    {
		$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 22)) === true && is_numeric(substr(rawurldecode($strdest), 22)) === true)
        	header('location: '.rawurldecode($strdest));
   		else
    		echo "error";
        return;	
    }
	else
		$sede_id = $_POST['sede_id'];	







?>
</body>
</html>
