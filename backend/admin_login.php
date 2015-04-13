<?php 
session_start();
if (isset($_SESSION["manager"])){
	header("location: index.php"); 
	exit();
}
if(isset($_POST["username"]) && isset($_POST["password"])){
	$manager = preg_replace('#[^A-Za-z0-9]#i','', $_POST["username"]);
	$password = preg_replace('#[^A-Za-z0-9]#i','', $_POST["password"]);

	include "connect_to_mysql.php";
$sql= mysql_query("SELECT * FROM admin WHERE username='$manager' AND password='$password' LIMIT 1");

$existCount=mysql_num_rows($sql);
if($existCount==1){
	while ($row=mysql_fetch_array($sql)) {
		$id=$row["id"];
	}
	$_SESSION["id"] = $id;
	$_SESSION["manager"] = $manager;
	$_SESSION["password"] = $password;
	header("location: index.php");
	exit();
	} else{
		echo 'Username ili password nisu dobri, probajte ponovo <a href="admin_login.php">Kliknite ovde</a>';
		exit();
	}
}
?>
<html>
<head><title>Admin Log in</title></head>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>
<div align="center" id="mainWrapper">
	<div id="pageContent"><br></br>
		<div align="left" stype="margin-left: 24px;">
			Molimo Vas ulogujte se:<br></br>
			<form id="form1" name="form1" method="post" action="admin_login.php">
					User name: <br /><input name="username" type="text" id="username" size="40" />
				<br></br>
					Password: <br /><input name="password" type="password" id="password" size="40" />
				<br></br>
					<input name="button" type="submit" id="button" value="Log in" />
			</form>
		</div>
		
	<?php
		include("footer.php");
	?>
</div>
</body>
</html>