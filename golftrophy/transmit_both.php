<html>
<head>
<title>Golf Trophy - Datenänderung
</title>
</head>
<body>
<?php
echo "<table align='center'><tr><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<h3><center>Datenänderung</center></h3>
<?php
//echo "recordID=$recordID";
	//To find back to the flight
	$db = mysql_connect();
	$res = mysql_db_query("golfertrophy","select * from golfer where ID=$recordID");
	$num = mysql_num_rows($res);
	$altfl = mysql_result($res, 0, "flight");
	$altna = mysql_result($res, 0, "name");

	if (!num)
		{
		echo "<center>Uuups, something strange. Could not find record for ID=$recordID</center>";
		}
	else
		{
		$fli = mysql_result($res, $i, "Flight");
		//echo "Flight=$fli";
		}
	$error=0;
	if ($neune=="")
		{ echo "<center>Fehler: Nearest ist leer!</center><p>";
		$error=1;
		}
	if ($neulo=="")
		{ echo "<center>Fehler: Longest ist leer!</center><p>";
		$error=1;
		}
	if (!is_numeric($neune))
		{
		echo "<center>$neune: Nearest ist keine korrekte Zahl!</center><p>";
		$error=1;
		}
	if (!is_numeric($neulo))
		{
		echo "<center>$neulo: Longest ist keine korrekte Zahl!</center><p>";
		$error=1;
		}
	if (!$error==1)
		{
		$db = mysql_connect();

		$sqlab = "update golfer set ";
		$sqlab .= "nearest=$neune, ";
		$sqlab .= "longest=$neulo ";
		$sqlab .= "where id=$recordID";

		mysql_db_query("golfertrophy", $sqlab);

		$num = mysql_affected_rows();
		if ($num>0)
			{
			//echo "Fli=$fli";
			echo "<center>Der Datensatz für <strong>$altna</strong>, Flight $altfl wurde erfolgreich geändert</center><p>";
			}
		else
			{
			echo "<center>'$sqlab'</center><p>";
			echo "<center><b>Der Datensatz wurde nicht geändert!</b></center><p>";
			echo mysql_error() . "<p>";
			}
		mysql_close($db);
		}
		else
			echo "<center>Es wurden keine Daten geändert!</center><p>";
echo "<h3><center><a href='flight.php?flight=$fli'>Zurück</a></center></h3>";
?>

</body>
</html>

