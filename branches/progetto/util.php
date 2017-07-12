<?php

function menuPrivato($loginlev)
{
	define('MAX', 1);
	define('MIN', 2);
	if(isset($loginlev))
	{
		if($loginlev=== MIN || $loginlev === MAX )
		{
			$logoutstr = "<li><a href='logout.php'>Logout</a></li>";
			echo $logoutstr;
		}
		if($loginlev === MIN || $loginlev === MAX )
		{
			$gestopstr = "<li><a href='gestop.php'>Gestione Opere</a></li>";
			echo $gestopstr;
		}
		if($loginlev === MAX )
		{
			$gestevstr = "<li><a href='gestEv.php'>Gestione Eventi</a></li>";
			echo $gestevstr;
		}
		if($loginlev === MAX)
		{
			$gestoperatoristr = "<li><a href='gestOperatori.php'>Gestione Operatori</a></li>";
			echo $gestoperatoristr;
		}
		if($loginlev=== MAX )
		{
			$gestsedistr = "<li><a href='gestSedi.php'>Gestione Sedi</a></li>";
			echo $gestsedistr;
		}
	}
	else
	{
		$loginstr = "<li><a href='login.php'>Login</a></li>";
		echo $loginstr;
	}
}
						
function menuPubblico()
{
	$str = "<li><a href='login.php'>Login</a></li>";
	echo $str;
}

function connectDB()
{
	return new mysqli("localhost", "root", "", "my_durresarchmuseum");
}

function printCollection()
{
	$mysqli = connectDB();
	$res = $mysqli->query("SELECT id, nome FROM opera WHERE pubblicata = 'true'");
	
	while($row = $res->fetch_assoc())
	{
		$ref = "showinfoop.php?id=".$row['id'];
		$str = "<a href = $ref><color='#600'>".htmlspecialchars($row['nome']). "<br /><br /></a>"; 
		echo $str;
	}
}

function printEvents()
{
	$mysqli = connectDB();
	$data = date("Y-m-d");
	
	$res = $mysqli->query("SELECT * FROM evento WHERE data > '".$data."'");
	while($row = $res->fetch_assoc())
	{
		$str = "<b><h2>".$row['titolo']."</h3></b>Data: ".$row['data']."<br />".$row['descrizione'];	
		echo $str;
	}
}

function printEventsMod()
{
	$mysqli = connectDB();
	$res = $mysqli->query("SELECT * FROM evento");
	$str = "<table>";
	echo $str;
	while($row = $res->fetch_assoc())
	{
		$str1 = "<tr><td>".$row['titolo']."</td><td><a href = 'modEv.php?id=".$row['id']."'>[modify]</td</tr></a>";	
		echo $str1;
	}
	$str2 = "</table>";
	echo $str2;
}


function printInfoOpera($id)
{
			$mysqli = connectDB();
			  $res = $mysqli->query("SELECT* FROM opera WHERE id = ".$id);
			  while($row = $res->fetch_assoc())
			  {
				  ?>"<b><h2><?php echo $row['nome'] ?></h2></b><br/>
				  <?php
				  if($row['urlFoto'] !== null)
				  {
					  $str = "<img src = ".$row['urlFoto']." <br/><br/><br/>";
					  echo $str;
				  }
				  if($row['urlVideo'] !== null)
				  {
				  	$str = "<object data='".$row['urlVideo']."' type='video/mp4' width='560' height='315' autostart = 'false'></object><br/><br/>";
					echo $str;
				  }
				  if($row['urlAudio'] !== null)
				  {
				  	$str = "<object data='".$row['urlAudio']."'></object><br/><br/>";
					echo $str;
				  }
				  if($row['anno'] !== null)
				  {
					  $str = "<b>Anno di realizzazione: </b>".htmlspecialchars($row['anno'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['autore'] !== null)
				  {
					  $str = "<b>Autore: </b>".htmlspecialchars($row['autore'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['location'] !== null)
				  {
				  	  $str = "<b>Location: </b>".htmlspecialchars($row['location'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['materiale'] !== null)
				  {
				  	  $str = "<b>Materiali: </b>".htmlspecialchars($row['materiale'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['categoria'] !== null)
				  {
				  	  $str = "<b>Categoria: </b>".htmlspecialchars($row['categoria'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['tecnica'] !== null)
				  {
				  	  $str = "<b>Tecnica: </b>".htmlspecialchars($row['tecnica'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['periodoStorico'] !== null)
				  {
				  	  $str = "<b>Periodo storico di appartenenza: </b>".$row['periodoStorico']."<br/><br/>";
					  echo $str;
				  }
				  if($row['dimensioni'] !== null)
				  {
				  	  $str = "<b>Dimensioni dell'opera: </b>".htmlspecialchars($row['dimensioni'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['peso'] !== null)
				  {
				  	  $str = "<b>Peso dell'opera: </b>".htmlspecialchars($row['peso'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['integrita'] !== null)
				  {
				  	  $str = "<b>Integrità dell'opera su una scala da 0 a 10: </b>".htmlspecialchars($row['integrita'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['luogoOrigine'] !== null)
				  {
				  	  $str = "<b>Luogo di origine dell'opera: </b>".htmlspecialchars($row['luogoOrigine'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['original'] !== null && $row['original'] == 'true')
				  {
				  	  $str = "<b>l'opera è un originale</b><br/><br/>";
					  echo $str;
				  }
				  if($row['original'] !== null && $row['original'] == 'false')
				  {
				  	  $str = "<b>l'opera è una copia</b><br/><br/>";
					  echo $str;
				  }
				  if($row['infoStoriche'] !== null)
				  {
				  	  $str = "<b>Acune info storiche sull'opera: </b>".htmlspecialchars($row['infoStoriche'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['descrizione'] !== null)
				  {
				  	  $str = "<b>Descrizione testuale dell'opera: </b>".htmlspecialchars($row['descrizione'])."<br/><br/>";
					  echo $str;
				  }
				  if($row['restauriEffettuati'] !== null)
				  {
				  	  $str = "<b>Restauri effettuati: </b>".htmlspecialchars($row['restauriEffettuati'])."<br/><br/>";
					  echo $str;
				  }
					  
				}
}


function printOperatorMod()
{
	$mysqli = connectDB();
	$res = $mysqli->query("SELECT * FROM operatoremuseo");
	$str = "<table>";
	echo $str;
	while($row = $res->fetch_assoc())
	{
		$str = "<tr><td>".$row['nome']." ".$row['cognome']."</td><td><a href = 'modOperator.php?username=".$row['username']."'>[modify]</a><td><tr><br/>";	
		echo $str;
	}
}

function generaPwdCasuale()
{
// lista di caratteri che comporranno la stringa random
$caratteriPossibli = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
// inizializzo la stringa random
$stringa = "";
$i = 0;
while ($i < 10) {
// estrazione casuale di un un carattere dalla lista possibili caratteri
 $carattere = substr($caratteriPossibli,rand(0,strlen($caratteriPossibli)-1),1);
// prima di inserire il carattere controllo non sia già presente nella stringa random fin'ora creata
if (!strstr($stringa, $carattere)) {
	$stringa .= $carattere;
	$i++;
		}
	}
return $stringa;
}

function printOperaMod()
{
	$mysqli = connectDB();
	$res = $mysqli->query("SELECT * FROM opera");
	$str = "<table>";
	echo $str;
	while($row = $res->fetch_assoc())
	{
		$str = "<tr><td>".$row['nome']."</td><td> <a href = 'modOpera.php?id=".$row['id']."'>[modify]</td></tr><br/></a>";	
		echo $str;
	}
}
function printSedeMod()
{
	$mysqli = connectDB();
	$res = $mysqli->query("SELECT * FROM sede");
	$str = "<table>";
	echo $str;
	while($row = $res->fetch_assoc())
	{
		$str = "<tr><td>".$row['nome']."</td><td> <a href = 'modSede.php?id=".$row['id']."'>[modify]</td></tr><br/></a>";	
		echo $str;
	}
}
?>