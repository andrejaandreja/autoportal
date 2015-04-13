<?php

if (isset($_GET['a'])) {
    $ime=$_POST['ime'];
$komentar=$_POST['komentar'];
$submit=$_POST['submit'];
    if($submit)
    {
        if($ime&&$komentar)
        {
        $query=mysql_query("INSERT INTO komentar (id,ime,komentar,vozilo) VALUES ('','$ime','$komentar','$id')");
        }
        else
        {
            echo "Popunite sva polja!";
        }
    }
}
$idauta = $_GET['id'];
?>
<div id="komentar">
<form action="vozilo.php?id=<?=$idauta?>&a=komentar#komentar" method="POST">
    <label>Ime:  </label><br /><input type="text" name="ime" value="" /><br /><br />
    <label>Komentar:  </label><br /><textarea name="komentar" cols="25" rows="7"></textarea><br /><br /><br />
<input type="submit" name="submit" value="Postavi komentar" /><br />

</form>
<hr width="500px" size="5px" />

<?php
 include('db.php');
$koment=mysql_query("SELECT * FROM komentar WHERE vozilo='$id'");
while($rows=mysql_fetch_assoc($koment))
{
     $id=$rows['id'];
     $dime=$rows['ime'];
     $dkomentar=$rows['komentar'];
     
     echo '<font color="red">Ime:</font>  ' . $dime . '<br />' . '<br />' . '<font color="red">Komentar:</font>  ' . '<br />' . $dkomentar . '&nbsp' . '&nbsp' .
      '&nbsp' . '&nbsp' . '<br />' . '<br />' . 
     '<hr size="5px" width="500px" color="blue" />'  ;    
}
?>
</div>