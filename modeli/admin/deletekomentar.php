<?php
	include('login.php');
	include ('../db.php');

echo "<a href='index.php'>Vrati se nazad.</a><Br><BR>";
if (isset($_GET['brisanje']) && $_GET['brisanje'] == "da") {
	
	$id = $_GET['id'];
	
	mysql_query("DELETE FROM komentar WHERE id = '$id'");
	
		
}

$komentari = mysql_query("SELECT * FROM komentar ORDER BY id DESC");

while ($row=mysql_fetch_array($komentari)) {
	echo "e";
	echo "<hr><br>Komentar je poslao: ($row[ime])</b> - <a href='deletekomentar.php?brisanje=da&id=$row[id]'>Obrisi</a><br></br>
	".htmlspecialchars(stripslashes($row['komentar']))." 
	<hr><br></br>";
}
?>
