<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>
<body>
<?php 	
		//Opprette kobling
		$kobling = new mysqli('localhost', 'root', 'root', 'vifte_db');
		
		//Sjekk om kobling virker
		if($kobling->connect_error) {
			die("Noe gikk galt: " . $kobling->connect_error);
		}
		
		//Angi UTF-8 som tegnsett
		$kobling->set_charset("utf8");
		
		$sql = "SELECT * FROM produkt";
		$resultat = $kobling->query($sql);
        echo var_dump($resultat);
		echo '<div class="container">';
		//Skriver ut innholdet i tabellen
		while($rad = $resultat->fetch_assoc()) {
			$navn = $rad["produktnavn"];
			$hastighet = $rad["hastighet_rpm"];
			$storrelse = $rad["storrelse_mm"];
			$bilde = $rad["bilde"];

			echo '<div class="item">';
			echo "<h1>$navn</h1>";
			echo "<h2>$$hastighet</h2>";
			echo "<h2>$storrelse</h2>";

            echo "<img src='bilde/$bilde' alt='Bilde av vifte' width='100' height='120'>";
			echo '</div>';
			echo '<script>alert("God jul!");</script>';
		
		}
		echo '</div>';
	?>
</body>
</html>
