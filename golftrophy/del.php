<html>
<head>
<title>ADMIN - Intermec - Golf Trophy</title>
</head>
<body>
<a href="index.html"><img src="trophy_top.gif" width="100" alt="Uwe Seeler Stiftung" border="0"></a>
<hr>
<h2><a href="admin.html">Admin - Golf Trophy</a></h2>
<h3>Datensatz l�schen</h3>
<html>
<body>
<?php
$auswahl=$_GET['ID'];
	if ($auswahl)
	{
	   $db = mysql_connect();
	   $sqlab = "delete from golfer where";
	   $sqlab .= " ID = '$auswahl'";

	   mysql_db_query("golfertrophy", $sqlab);

	   $num = mysql_affected_rows();
	   if ($num>0)
		  echo "Der Datensatz $auswahl wurde gel�scht<p>";
	   else
		  echo "Der Datensatz wurde nicht gel�scht<p>";

	   mysql_close($db);
	}
	else
	   echo "Es wurde kein Datensatz ausgew�hlt<p>";
?>
Zur�ck zur <a href="editdata.php">Auswahl</a>

</body>
</html>


