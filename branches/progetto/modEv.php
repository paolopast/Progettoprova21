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
<title>Home Durres Museum</title>
<style type = "text/css">
</style>

<script type="text/javascript"> function cancella() 
{ 
confirm(<a href="deleteEv.php">Vuoi procedere con la cancellazione </a>) 
} 
</script>
<!--si importa la libreria degli stili-->
<link href="Stili/stili.css" rel="stylesheet">
<link href="Stili/slider.css" rel="stylesheet">
</head>

<body>
<!-- contenitore principale--> 
<div class = "mainContainer">
	<!-- contenitore per un immagine-->
	<div class = "imgHeader">
    	<div id="slider">
		<figure>
<img src="Pictures/Immagine.png" width="100%" height="367px" alt>
<img src="Pictures/museum.jpg" width="100%" height="367px" alt>
<img src="Pictures/durazzo.jpg" width="100%" height="367px" alt>
<img src="Pictures/102716.jpg" width="100%" height="367px" alt>
<img src="Pictures/Durres-Amphitheatre-Albania-1024x768-iloveimg-resized (1).jpg" width="100%" height="367px" alt>
</figure>
</div>
  	</div>
</div> 
<div class = "menuContentBox">
   <!--Contenitore per il menu con i relativi link per le altre pagine del sito-->
    <div class = "navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="findus.php">Find us</a></li>
                    <li><a href="contacts.php">Contacts</a></li>    
                    <li><a href="collection.php">Collection</a></li>
                    <li><a href="event.php">Events</a></li>
                    <!--piccolo script in php che permette di visualizzare voci particolari voci del menu solo nel caso in cui si sia loggati come admin o operatori-->  
                    <?php 
					//se loglevel = 1 significa che si è loggati come admin
					//se loglevel = 2 significa che si è loggati come operatori
					include 'util.php';
					if(isset($_SESSION['loginlev'])===true)
						menuPrivato($_SESSION['loginlev']);
					else
						menuPubblico();
					?>
                </ul>
            </div>


    <div class ="content">
	<?php
		$mysqli = new MySQLi("localhost", "root","", "my_durresarchmuseum");
		$res = $mysqli->query("SELECT * FROM evento WHERE id = ".$_GET['id']);
		$res2 =$mysqli->query("SELECT * FROM sede");
		$row = $res->fetch_assoc();
    ?> 
        <div class = 'titlebox'><?php echo htmlspecialchars($row['titolo']) ?></div>
        <?php
        if(isset($_GET['err'])===true)
			echo "Inserisci i valori obbligatori";
        ?>
        
		<form name = 'modify' action = 'saveModEvento.php?id=<?php echo $_GET['id']?>' method = 'POST'>
    	<label>Titolo evento*:</label>
   		<input name = 'titolo' rows 1 value ='<?php echo $row['titolo']?>'><br/><br/>
    	<label>Descrizione:</label>
    	<textarea name = 'descrizione' rows = 10 col = 50><?php echo htmlspecialchars($row['descrizione'])?></textarea><br/><br/>
        <label>Data*:</label>
    	<input type= 'text' name = 'data' value = '<?php echo $row['data']?>'/><br/><br/>
    	
		<tr>
		<td>Sede*:</td>
		<td>
			<select name='sede_id'>
            <?php
			while($row2 = $res2->fetch_assoc())
			{
				?><option value= '<?php echo $row2['id']?>'><?php echo $row2['nome']?></option>"
				<?php 
			}
			?></select>
		</td>
		</tr>
		<br/><br/>
		<button type='submit'>Salva Modifiche</button>

    	</form>
		<button onclick="window.location.href='deleteEv.php?id=<?php echo $_GET['id']?>'">Cancella Evento</button>
    </div>
</div>
</body>
</html>