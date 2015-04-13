<html>
<head>
<?php
echo "<title> Golf Trophy - Flight - $fli</title>";
echo "</head>";
echo "<body>";
echo "<body>";
echo "<table><tr><img src='trophy_top.gif' width='400' border='0'></tr>";
echo "<tr><font size='+4'><strong><a href='index.html'>Golf Trophy</a></strong></font></tr></table>";
if ($fli=="")
	{
	$fli=$_GET['FLIGHT'];
	}
//	$fli=$_GET['FLIGHT'];
   $db = mysql_connect();

   $res = mysql_db_query("golfertrophy",
          "select * from golfer where Flight=$fli order by Name");
   $num = mysql_num_rows($res);

   // Tabellenbeginn
   echo "<a href='selectflight.html' <h2>Flight $fli</h2></a>";
   echo "<table border=1 align=center>";

   // Überschrift
   echo "<tr>";
   //echo "<td>id</td>";
   //echo "<td>Flight</td>";
   echo "<td>Name</td>";
   echo "<td>Ge</td>";
   echo "<td>Nearest</td>";
   echo "<td>Longest</td> </tr>";

   for ($i=0; $i<$num; $i++)
   {
		$id = mysql_result($res, $i, "id");
		$fl = mysql_result($res, $i, "Flight");
		$na = mysql_result($res, $i, "Name");
		$ge = mysql_result($res, $i, "Geschlecht");
		$ne = mysql_result($res, $i, "Nearest");
		$lo = mysql_result($res, $i, "Longest");
		/*echo "$nn, $vn, $pn, $ge, $gt <br>";*/

		// Tabellenzeile mit -zellen
		echo "<tr>";
		//echo "<td>$id</td>";
		//echo "<td>$fl</td>";
		echo "<td>$na</td>";
		echo "<td>$ge</td>";
		echo "<td align=center><a href='edit_nearest.php?ID=$id' border=0>$ne</a></td>";
		echo "<td align=center><a href='edit_nearest.php?ID=$id' border=0>$lo</a></td> </tr>";
	}

	// Tabellenende
	echo "</table>";
	if ($num == 0)
		{
		echo "<h4>Keine Daten zu Flight $fli gefunden!</h4>";
		}
	mysql_close($db);
?>
<hr>
<img src="intermec-logo.gif" width="338" height="60" alt="Intermec Expect More!" border="0">
</body>
</html>

