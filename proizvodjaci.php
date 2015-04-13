<?php
	include('header.php');
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

include "backend/connect_to_mysql.php"; 
	$dynamicList="";
	$sql= mysql_query("SELECT * FROM proizvodjaci ORDER BY naziv"); 
	$productCount=mysql_num_rows($sql);
	if($productCount>0){
		while ($row=mysql_fetch_array($sql)) {
			$id=$row["id"];
			$naziv=$row["naziv"];
			$date_added= strftime("%b %d, %Y", strtotime($row['date_added']));
			 $dynamicList .= '<table width="20%" align="left" cellspacing="20" cellpadding="0">
        <tr><td align="center"><a href="modeli.php?id=' . $id . '"><img style="border:#666 1px solid;" src="pictureG/' . $id . '.jpg" alt="' . $naziv . '" width="120" height="120" border="1" /></a></td></tr>
        <tr><td align="center">' . '<br /><a href="modeli.php?id=' . $id . '">' . $naziv .'</a></td></tr>
        </tr>
      </table>';
    } 
} else {
	$dynamicList = "Nemate proizvodja";
}
mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proizvodjaci</title>
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