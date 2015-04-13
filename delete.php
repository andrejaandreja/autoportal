<?php
	require('db.php');
	$id=$_GET['id'];
	mysql_query("DELETE FROM komentar WHERE id='$id'");
?>