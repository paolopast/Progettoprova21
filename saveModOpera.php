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
	
	//dichiarazione variabili
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
	if($_POST['nome'] === '')
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        echo "error";
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
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
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
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$materiale = $_POST['materiale'];
	
	if($_POST['categoria'] === '')
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
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
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
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
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$peso = $_POST['peso'];
	
	if($_POST['valore'] === '')
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$valore = $_POST['valore'];
	
	if($_POST['dittaConsegna'] === '')
		$dittaConsegna = 'NULL';
	else
		$dittaConsegna = "'".$_POST['dittaConsegna']."'";
		
	if($_POST['integrita'] === '')
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$integrita = $_POST['integrita'];
	
	if(isset($_POST['original']) === false)
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
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
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$pubblicata = $_POST['pubblicata'];
	
	if($_POST['dataPubblicazione'] === '')
		$dataPubblicazione = 'NULL';
	else
		$dataPubblicazione = "'".$_POST['dataPubblicazione']."'";
		
	if($_POST['sede_id'] === '')
    {
    	if(is_numeric($_GET['id']))
        {
			$strdest = 'modOpera.php?err=1&id='.$_GET['id'];
        	$strdest = rawurlencode($strdest);
        	header('location: '.rawurldecode($strdest));
        }
        else
        	echo "error";
    }
	else
		$sede_id = $_POST['sede_id'];	





	if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name']))
    {
  		echo 'Non hai inviato nessun file...'; 
        $urlFoto = 'NULL';
	}

	if ($_FILES['userfile']['size'] > 4194304) 
    {
 		echo 'Il file è troppo grande!';
 		$urlFoto = 'NULL';
	}
    
    $target_file = 'upload/' . $_FILES['userfile']['name'];
	if (file_exists($target_file)) 
    {
 		echo 'Il file esiste già';
  		$urlFoto = 'NULL';
	}
	//percorso della cartella dove mettere le immagini caricate dagli utenti
	$uploaddir = 'upload/';

	//Recupero il percorso temporaneo del file
	$userfile_tmp = $_FILES['userfile']['tmp_name'];

	//recupero il nome originale del file caricato
	$userfile_name = $_FILES['userfile']['name'];

	//copio il file dalla sua posizione temporanea alla mia cartella upload
	if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name) === true) {
  	//Se l'operazione è andata a buon fine...
  	echo 'File inviato con successo.';
  	$urlFoto = "'".$uploaddir . $userfile_name."'";
	}
    else
    {
  	//Se l'operazione è fallta...
  	echo 'Upload NON valido!'; 
  	$urlFoto = 'NULL';
	}	



//percorso della cartella dove mettere i file audio caricati dagli utenti
$uploaddirA = 'uploadAudio/';

//Recupero il percorso temporaneo del file
$userfile_tmpA = $_FILES['audiofile']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_nameA = $_FILES['audiofile']['name'];

	if (!isset($_FILES['audiofile']) || !is_uploaded_file($_FILES['audiofile']['tmp_name']))
    {
  		echo 'Non hai inviato nessun file...'; 
 		$urlAudio = 'NULL';
	}

	if ($_FILES['audiofile']['size'] > 10000000) 
    {
 		echo 'Il file è troppo grande!';
 		$urlAudio = 'NULL';
	}
    
    $target_file = 'uploadAudio/' . $_FILES['audiofile']['name'];
	if (file_exists($target_file)) 
    {
 		echo 'Il file esiste già';
  		$urlAudio = 'NULL';
	}
//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmpA, $uploaddirA . $userfile_nameA) === true) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
  $urlAudio = "'".$uploaddirA . $userfile_nameA."'";
}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
  $urlAudio = 'NULL';
}
	//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddirV = 'uploadVideo/';

//Recupero il percorso temporaneo del file
$userfile_tmpV = $_FILES['videofile']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_nameV = $_FILES['videofile']['name'];

	if (!isset($_FILES['videofile']) || !is_uploaded_file($_FILES['videofile']['tmp_name']))
    {
  		echo 'Non hai inviato nessun file...'; 
 		$urlVideo = 'NULL';
	}

	if ($_FILES['videofile']['size'] > 44194304) 
    {
 		echo 'Il file è troppo grande!';
 		$urlVideo = 'NULL';
	}
    
    $target_file = 'uploadVideo/' . $_FILES['videofile']['name'];
	if (file_exists($target_file)) 
    {
 		echo 'Il file esiste già';
  		$urlVideo = 'NULL';
	}
//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmpV, $uploaddirV . $userfile_nameV) === true) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
  $urlVideo = "'".$uploaddirV . $userfile_nameV."'";
}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
  $urlVideo = 'NULL';
}
	
	$mysqli = new MySQLi("localhost", "root", "", "my_durresarchmuseum");
	$sql = "UPDATE opera SET nome ='".$nome."',anno=".$anno.",autore = ".$autore.",proprietario='".$proprietario."',numPass=".$numPass.",location=".$location.",materiale='".$materiale."',categoria='".$categoria."',urlFoto=".$urlFoto.",urlVideo=".$urlVideo.", urlAudio=".$urlAudio.", dataRicezione=".$dataRicezione.",tecnica='".$tecnica."',periodoStorico=".$periodoStorico.",dimensioni=".$dimensioni.",peso=".$peso.",valore=".$valore.",dittaConsegna=".$dittaConsegna.",integrita='".$integrita."',original='".$original."',luogoOrigine=".$luogoOrigine.",infoStoriche=".$infoStoriche.",descrizione=".$descrizione.",restauriEffettuati=".$restauriEffettuati.",dataPubblicazione=".$dataPubblicazione.",sede_id='".$sede_id."',pubblicata='".$pubblicata."' WHERE id = ".$_GET['id'];
	
	if ($mysqli->query($sql) === false) {
      echo "Error updating record: " . $mysqli->error;
}
else
{
	echo "query eseguita";
    header('location: gestop.php');
}



?>
</body>
</html>