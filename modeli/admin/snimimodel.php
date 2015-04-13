<?php
	include ('login.php');
	include ('../db.php');

$naziv = $_POST['naziv'];
$slika = $_POST['slika'];
$spec = $_POST['spec'];
$marka = $_POST['proizvodjac'];

		
	move_uploaded_file($_FILES["slika"]["tmp_name"], "../slike_vozila/" . $_FILES["slika"]["name"]);
	$nazivSlike = $_FILES["slika"]["name"];
	mysql_query("INSERT INTO modeli (nazivModela, marka, specifikacije, slika) VALUES ('$naziv', '$marka', '$spec', '$nazivSlike')") or die(mysql_error());
	echo "Model je uspesno dodat. <a href='dodajmodel.php'>-DODAJ NOVI MODEL-</a> ili <a href='index.php'> -Nazad u ADMIN DEO-</a>";

?>