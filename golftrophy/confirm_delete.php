<html>
<head>
<title>ADMIN - Intermec - Golf Trophy</title>
</head>
<body>
<a href="index.html"><img src="trophy_top.gif" width="100" alt="Uwe Seeler Stiftung" border="0"></a>
<hr>
<h2><a href="admin.html">Admin - Golf Trophy</a></h2>
<h3>Daten löschen</h3>
<html>
<body>
Wenn Sie den Datensatz wirklich löschen wollen, klicken Sie nochmals die Mülltonne an.
<?php
$auswahl=$_GET['ID'];
$id=$auswahl;
	if ($auswahl)
	{
	   $db = mysql_connect();
	   $res = mysql_db_query("golfertrophy", "select * from golfer where ID=$auswahl");
	   $num = mysql_num_rows($res);
	   if ($num>0)
		{
		   // Tabellenbeginn
		   echo "<hr>";
		   echo "<table border>";

		   // Überschrift
		   // echo "<tr><td>id</td>";
		   echo "<td>Flight</td>";
		   echo "<td>Name</td>";
		   echo "<td>Ge</td>";
		   echo "<td>Nearest</td>";
		   echo "<td>Longest</td>";
		   echo "<td>DELETE</td></tr>";

		   for ($i=0; $i<$num; $i++)
		   {
			  $id = mysql_result($res, $i, "id");
			  $fl = mysql_result($res, $i, "flight");
			  $na = mysql_result($res, $i, "name");
			  $ge = mysql_result($res, $i, "geschlecht");
			  $ne = mysql_result($res, $i, "nearest");
			  $lo = mysql_result($res, $i, "longest");

			  // Tabellenzeile mit -zellen
			  echo "<tr><td>$fl</td>";
			  echo "<td>$na</td>";
			  echo "<td align=center>$ge</td>";
			  echo "<td align=center>$ne</td>";
			  echo "<td align=center>$lo</td>  ";
			  echo "<td align=center><a href='del.php?ID=$id'><img src='button_del.png' alt='DEL' border=0></a></td>";
			  echo " </tr>";
		   }

		   // Tabellenende
		   echo "</table>";
		   echo "<hr>";
	    }
	    else
		{
		   echo "<hr>";
		   echo "Uuups, der Datensatz Nr <strong>$id</strong> existiert nicht!";
		   echo "<hr>";
		}
	}
?>
Zurück zur <a href="editdata.php">Auswahl</a>

</body>
</html>
