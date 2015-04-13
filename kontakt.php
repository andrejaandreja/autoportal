<?php
	include('header.php');
?>
<script language="javascript">

function alphaOnly(e) {

  if (!e) var e = window.event;

  if (e.keyCode) code = e.keyCode;
  else if (e.which) code = e.which;

  if ((code >= 48) && (code <= 57)) { return false; }

  return true;
}

function numberOnly(e) 
{
  var code;
  if (!e) 
	var e = window.event;
  if (e.keyCode) 
	code = e.keyCode;
  else if (e.which) 
	code = e.which;
  if ((code < 48) || (code > 57)) 
  { 
		return false; 
		}
		}
</script>

	<div id="sadrzaj3">
    <div id="kontakt">
<?php
if (isset($_GET['a'])) {
  $pol = $_POST['pol'];
  $korisnicko_ime = $_POST['korisnicko_ime'];
  $email = $_POST['email'];
  $adresa = $_POST['adresa'];
  $tel = $_POST['tel'];
  $pitanje = $_POST['pitanje'];

  $headers = "From: $email";
  mail("stefanciric@gmail.com", "Kontakt sa sajta Automobili", "$pitanje", "$headers");
}

?>
<form action="kontakt.php?a=posalji" method="post">
          <strong> Kontaktirajte nas:<br></br></strong>
          <div id="input">
          Odaberite pol:<br></br>
          <input type="radio" name="pol" required value="Musko">  Musko <br>
          <input type="radio" name="pol" required value="Zensko">  Zensko <br>
          <p></p>
            
<table border="0">
<tr>
  <td>Ime:</td>
  <td align="left"><input type="text" name="korisnicko_ime" size="20" maxlength="20" required type="text" onkeypress="return alphaOnly(event);"/></td>
</tr>
<tr>
  <td>E-mail:</td>
  <td align="left"><input type="text" name="email" size="20" maxlength="20" required type="email"/></td>
</tr>
<tr>
  <td>Adresa:</td>
  <td align="left"><input type="text" name="adresa" size="20" maxlength="20"/></td>
</tr>
<tr>
  <td>Telefon:</td>
  <td align="center"><input type="text" name="tel" size="20" maxlength="20" onkeypress="return numberOnly(event);"/></td>
</tr>
</table>
  <br>
<b>Pitanje:</b><br><label id="pitanje-label" for="pitanje"></label>
<textarea class="pitanje" name="pitanje" required rows="6" cols="40"></textarea><br>
<input type="submit" value="Posalji" >
<input type="reset" value="Resetuj" >
        </form>
      </div>
</div>
			
			
			
		</div>
	</div>
 
<?php
	include('footer.php');
?>