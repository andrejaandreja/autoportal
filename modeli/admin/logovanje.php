<?php
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == "stefan" && $pass == "stefan") {
	$_SESSION['adminlogovan'] = "da";
	?>
	<script>window.location="index.php";</script>
	<?php
}
else {
	die("
		<form action='logovanje.php' method='post'>
			Korisnicko ime: <input type='text' name='user'><br>
			Lozinka: <input type='password' name ='pass'><br><br>
			<input type='submit' value='Uloguj se'>
		</form>");		
}
?>