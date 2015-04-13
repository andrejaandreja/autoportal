<?php 
session_start();
if (!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}
$managerID = preg_replace('#[^0-9]#i','', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["password"]);

	include ('connect_to_mysql.php');
$sql= mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");
$existCount=mysql_num_rows($sql);
if($existCount==0){
	echo "Niste dolelili usera u bazi";
	exit();
}
?>
<html>
<head><title>Admin panel</title></head>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>
<div align="center" id="mainWrapper">
	
	<div id="pageContent"><br></br><br></br>
		<div align="center" stype="padding-left: 24px;">
			<strong>Dobrodosli na sajt!</strong><form align="right" action="logout.php"><input type="submit" value="Log out"></form>
					</div>
			<table align="center" border="1" cellspacing="20" cellpadding="20"><br></br><br></br><br></br>
				<tr>
					<td align="center"><a href="dodavanje_proizvodjaca.php">Dodavanje proizvodjaca</a><br></td>
					<td align="center"><a href="dodavanje_modela.php">Dodavanje modela</a></td>
				</tr>
				<tr>
					<td align="center"><a href="#.php">************</a><br></td>
					<td align="center"><a href="#.php">Komentari</a></td>
				</tr>
			</table>
	</div>
	<?php
		include("footer.php");
	?>
</div>
</body>
</html>