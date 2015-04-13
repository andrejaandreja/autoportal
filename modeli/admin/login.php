<?php
session_start();
error_reporting(0);
if ($_SESSION['adminlogovan'] != "da") {

	die("
		<form action='logovanje.php' method='post'>
			<table align='center'>
			<tr>
			<td align='center'>
			Korisnicko ime: <input type='text' name='user'><br>
			</td>
			<td align='center'>
			Lozinka: <input type='password' name ='pass'><br>
			</td>
			<td align='center'>
			<input type='submit' value='Uloguj se'>
			</td>
			</tr>
			</table>
	</form>");	
}
?>
