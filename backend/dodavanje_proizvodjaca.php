<?php
session_start();
$managerID = preg_replace('#[^0-9]#i','', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["password"]);

	include ('connect_to_mysql.php');
$sql= mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password'");
$existCount=mysql_num_rows($sql);
if($existCount==0){
	echo "Sesija ne postoji u bazi";
	exit();
}
?>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>
<?php
if(isset($_GET['deleteid'])){
echo 'Da li zelite da obrisete proizvod sa ID '.$_GET['deleteid'].'?<a href="dodavanje_proizvodjaca.php?yesdelete=' .$_GET['deleteid'].' "> Da</a>|
																		   <a href="dodavanje_proizvodjaca.php"> Ne</a>';
	exit();
}
if(isset($_GET['yesdelete'])){
	$id_to_delete=$_GET['yesdelete'];
	$sql=mysql_query("DELETE FROM proizvodjaci WHERE id='$id_to_delete'") or die (myslq_error);
	$pictodelete=("../pictureG/$id_to_delete.jpg");
		if (file_exists($pictodelete)){
			unlink($pictodelete);
		}
		header("location: dodavanje_proizvodjaca.php");
		exit();
}
?>
<?php
	if(isset($_POST['naziv'])){
		$naziv= mysql_real_escape_string($_POST['naziv']);
	$sql= mysql_query("SELECT id FROM proizvodjaci WHERE naziv='$naziv'");

	$sql= mysql_query("INSERT INTO proizvodjaci (naziv,date_added) 
									VALUES ('$naziv',now())") or die(mysql_error());
	$pid= mysql_insert_id();
	$newname="$pid.jpg";
	move_uploaded_file($_FILES['fileField']['tmp_name'],"../pictureG/$newname");
	
	}
?>
<?php
	$product_list="";
	$sql= mysql_query("SELECT * FROM proizvodjaci ORDER BY date_added DESC"); 
	$productCount=mysql_num_rows($sql);
	if($productCount>0){
		while ($row=mysql_fetch_array($sql)) {
			$id=$row["id"];
			$naziv=$row["naziv"];
			$date_added= strftime("%b %d, %Y", strtotime($row['date_added']));
			$product_list.="Product ID: $id - <strong>$naziv</strong> - <em>Added $date_added</em>&nbsp;&nbsp;&nbsp; <a href='edit_proizvodjaca.php?pid=$id'>edit</a> &bull; 
																	  <a href='dodavanje_proizvodjaca.php?deleteid=$id'>delete</a><br />";

		}
	} else {
	 $product_list="Jos uvek niste dodali proizvodjaca";
	}
?>
<html>
<head><title>Dodavanje proizvoda</title>
<script type="text/javascript" language="javascript"> 
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.form1.uName.value == "" ) { 
	    alert ( "Please type your Name" ); 
	    isValid = false;
    } else if ( document.form1.uName.value.length < 8 ) { 
            alert ( "Your name must be at least 8 characters long" ); 
            isValid = false;
    } else if ( document.form1.uEmail.value == "" ) { 
            alert ( "Please type your Email" ); 
            isValid = false;
    } else if ( document.form1.uCity.value == "" ) { 
            alert ( "Please type your City" ); 
            isValid = false;
    }
    return isValid;
}
</script>
</head>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>
<div align="center" id="mainWrapper">
	<?php
		include("header.php");
	?>
	<div id="pageContent">

		<div align="right" stype="margin-right: 32px;">
			<table align="right">
			<tr><td><form action="dodavanje_proizvodjaca.php#forma"><input type="submit" value="Dodajte proizvodjaca"></form></td></tr>
			<tr><td><form action="dodavanje_modela.php#forma"><input type="submit" value="Dodajte model"></form></td></tr>
			</table>
		</div>
		<div id="inventory"><strong>Dodavanje proizvodjaca</strong></div>
		<div align="left" id= "product_list" stype="margin-left: 24px;">
				<?php
					echo "$product_list";	
				?>
		</div><br></br>
			<form action="dodavanje_proizvodjaca.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
	  	<table width="90%" border="0" cellpadding="6">
	  		<tr>
	  				<td align="left">
	  					Pripada proizvodjacu:
	  				</td>
	  				<td align="left">
	 					<select name="naziv" id="naziv">
							<option value="Alfa romeo">Alfa romeo</option>
							<option value="Audi">Audi</option>
							<option value="Bmw">BMW</option>
							<option value="Cadilac">Cadilac</option>
							<option value="Chevrolet">Chevrolet</option>
							<option value="Citroen">Citroen</option>
							<option value="Dacia">Dacia</option>
							<option value="Daewoo">Daewoo</option>
							<option value="Fiat">Fiat</option>
							<option value="Ford">Ford</option>
							<option value="Honda">Honda</option>
							<option value="Hyundai">Hyundai</option>
							<option value="Jepp">Jeep</option>
							<option value="Kia">Kia</option>
							<option value="Lada">Lada</option>
							<option value="Lexus">Lexus</option>
							<option value="Mazda">Mazda</option>
							<option value="Mercedes">Mercedes</option>
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Nissan">Nissan</option>
							<option value="Opel">Opel</option>
							<option value="Peugeot">Peugeot</option>
							<option value="Renault">Renault</option>
							<option value="Seat">Seat</option>
							<option value="Skoda">Skoda</option>
							<option value="Suzuki">Suzuki</option>
							<option value="Toyota">Toyota</option>
							<option value="Volkswagen">Volkswagen</option>
							<option value="Volvo">Volvo</option>
							<option value="Yugo">Yugo</option>
						</select><br></br>
	  				</td>
	   			</tr>
	  		
	  			<!--<tr><td align="left">
	  				Naziv proizvodjaca
	  			</td>
	  			<td align="left">
	  				<input name="naziv" id="naziv" type="text" size="60"> 
	  			</td>
	  		</tr>-->
	  		<tr>
	  			<td align="left">
	  				Slika proizvodjaca:
	  			</td>
	  			<td align="left">
	  				<input type="file" name="fileField" id="fileField" value="Browse...">
	  			</td>
	  		</tr>
	  		<tr>
	  			<td align="left">
	  				
	  			</td>
	  			<td align="left"><br></br>
	  				<input type="submit" value="Dodajte proizvodjaca" onclick="javascript:return validateMyForm();"> 
	  			</td>
	  		</tr>
	  	</table>
	  </form>	
	</div>
	<?php
		include("footer.php");
	?>
</div>
</body>
</html>