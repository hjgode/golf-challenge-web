<html>
<head>
<title>Golf Trophy - Datenänderung
</title>
</head>
<body>
<?php
echo "<table align='center'><tr><a href='index_n.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<h3><center>Datenänderung</h3>
<?php
//echo "<center>recordID=$recordID";
	//To find back to the flight
	$db = mysql_connect();
	$res = mysql_db_query("golfertrophy","select * from golfer where ID=$recordID");
	$num = mysql_num_rows($res);
	$altfl = mysql_result($res, 0, "flight");
	$altna = mysql_result($res, 0, "name");

	if (!num)
		{
		echo "Uuups, something strange. Could not find record for ID=$recordID";
		}
	else
		{
		$fli = mysql_result($res, $i, "Flight");
		//echo "Flight=$fli";
		}
	$error=0;
	if ($neune=="")
		{ echo "Fehler: Nearest ist leer!<p>";
		$error=1;
		}
	if (!is_numeric($neune))
		{
		echo "$neune: Nearest ist keine korrekte Zahl!<p>";
		$error=1;
		}
	if (!$error==1)
		{
		$db = mysql_connect();

		$sqlab = "update golfer set ";
		$sqlab .= "nearest=$neune ";
		$sqlab .= "where id=$recordID";

		mysql_db_query("golfertrophy", $sqlab);

		$num = mysql_affected_rows();
		if ($num>0)
			{
			//echo "Fli=$fli";
			echo "Der Datensatz für '<strong>$altna</strong>', Flight $altfl wurde erfolgreich geändert<p>";
			}
		else
			{
			echo "'$sqlab'<p>";
			echo "<b>Der Datensatz wurde nicht geändert!</b><p>";
			echo mysql_error() . "<p>";
			}
		mysql_close($db);
		}
		else
			echo "Es wurden keine Daten geändert!<p>";
echo "<h3><a href='flight.php?flight=$fli'>Zurück</a></h3></center>";
?>

</body>
</html>

