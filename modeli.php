<?php
	include('header.php');
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

include "backend/connect_to_mysql.php"; 
	$dynamicList="";
	$id = $_GET['id'];

if (!is_numeric($id)) die("error");
	$sql= mysql_query("SELECT * FROM modeli WHERE proizvodjac = '$id'"); 
	$productCount=mysql_num_rows($sql);
	if($productCount>0){
		while ($row=mysql_fetch_array($sql)) {
			$id=$row["id"];
			$proizvodjac=$row["proizvodjac"];
			$model=$row["model"];
			$serija=$row["serija"];
			$date_added= strftime("%b %d, %Y", strtotime($row['date_added']));
			 $dynamicList .= '<table width="20%" align="left" cellspacing="20" cellpadding="0">
        <tr><td align="center"><a href="serije_modela.php?id=' . $id . '"><img style="border:#666 1px solid;" src="slike_vozila/' . $id . '.jpg" alt="' . $model . '" width="200" height="200" border="1" /></a></td></tr>
        <tr><td align="center">' . '<br /><a href="serija_modela.php?id=' . $id . '">' . $model . " " . $serija . '</a></td></tr>
        </tr>
      </table>';
    } 
} else {
	$dynamicList = "Nemate dodeljen model";
}
mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modeli</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
	<div id="sadrzaj2">
					<p><?php echo $dynamicList; ?><br />
	</div>
        
</body>
</html>

<?php
	include('footer.php');
?>