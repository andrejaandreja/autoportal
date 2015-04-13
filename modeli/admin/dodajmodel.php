<?php
	include ('login.php');
	include ('../db.php');
?>

<form action="snimimodel.php" method="post" enctype="multipart/form-data">
	<table>
	<tr>
	<td align="center">
	Naziv Modela: <input type="text" name="naziv" /><BR /><BR />
	</td>
	<tr>
	<td align="center">		
	Pripada proizvodjacu: 
	<select name="proizvodjac">
		<option value="1">Alfa Romeo</option>
		<option value="2">Audi</option>
		<option value="3">BMW</option>
		<option value="4">Cadilac</option>
		<option value="5">Chevrolet</option>
		<option value="6">Citroen</option>
		<option value="7">Dacia</option>
		<option value="8">Daewoo</option>
		<option value="9">Fiat</option>
		<option value="10">Ford</option>
		<option value="11">Honda</option>
		<option value="12">Hyundai</option>
		<option value="13">Jeep</option>
		<option value="14">Kia</option>
		<option value="15">Lada</option>
		<option value="16">Lexus</option>
		<option value="17">Mazda</option>
		<option value="18">Mercedes</option>
		<option value="19">Mitsubishi</option>
		<option value="20">Nissan</option>
		<option value="21">Opel</option>
		<option value="22">Peugeot</option>
		<option value="23">Renault</option>
		<option value="24">Seat</option>
		<option value="25">Skoda</option>
		<option value="26">Suzuki</option>
		<option value="27">Toyota</option>
		<option value="28">Volkswagen</option>
		<option value="29">Volvo</option>
		<option value="30">Yugo</option>
	</select><br></br>
	</td>
	</tr>
	<tr>
	<td>
	Specifikacija:
	</td>
	</tr>
	<tr>
	<td align="center">
	 <textarea name="spec" cols="40" rows="5" ></textarea><br></br>
	</td>
	</tr>
	<tr>
	<td align="center">
	Slika modela: <input type="file" name="slika" /><br></br>
	</td>
	</tr>
	<tr>
	<td align="center">
	<input type="submit" value="Dodaj model" />
	</td>
	</tr>
	</table>
</form>