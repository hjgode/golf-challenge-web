<html>
<head>
<title>Golf Trophy - Daten �ndern
</title>
</head>
<body>
<?php
echo "<table align='center'><tr><td><a href='index_n.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'>";
echo "</a></td></tr>";
echo "<tr><td><h4>Golf Trophy - Daten �ndern</h4></td>";
echo "</tr></table>";
$recordID=$_GET['ID'];
	//To find back to the flight
	$db = mysql_connect();
	$res = mysql_db_query("golfertrophy","select * from golfer where ID=$recordID");
	$num = mysql_num_rows($res);
	if (!num)
		{
		echo "<center>Uuups, something strange. Could not find record for ID=$recordID</center>";
		}
	else
		{
		$fli = mysql_result($res, $i, "Flight");
		//echo "Flight=$fli";
		}
if ($recordID)
{
   $db = mysql_connect();
   $sqlab = "select * from golfer where";
   $sqlab .= " id = $recordID";
   $res = mysql_db_query("golfertrophy", $sqlab);

   $altfl = mysql_result($res, 0, "flight");
   $altna = mysql_result($res, 0, "name");
   $altge = mysql_result($res, 0, "geschlecht");
   $altne = mysql_result($res, 0, "nearest");
   $altlo = mysql_result($res, 0, "longest");
   $oriid = mysql_result($res, 0, "id");

   echo "<center>F�hren Sie die �nderung f�r '<strong>$altna</strong>', Flight $altfl durch, ";
   echo "speichern Sie anschlie�end.</center><p>";

   echo "<form action = 'transmit_nearest.php' ";
   echo " method = 'post'>";

echo "<table border=0 align='center'><tr>";
echo "<td>";
   echo "Nearest:";
echo "</td>";
echo "<td>";
   echo "<input name='neune' value='$altne' size=15>";
echo "</td>";
echo "</tr>";
   echo "<input type='hidden' name='recordID' value='$recordID'>";

echo "<tr><td>";
   echo "<input type='reset' value='  Reset  '>";
echo "</td><td>";
   echo "<input type='submit' value='Speichern'> ";
echo "<font size=+3>&nbsp;<a href='flight_n.php?flight=$fli'>Zur�ck</a></font>";
echo "</td></tr>";
   echo "</table>";
   echo "</form>";

   mysql_close($db);
}

else
	{
   	echo "<h3><center>Es wurde kein Datensatz ausgew�hlt</center></h3><p>";
   	}
?>
<hr>
<center><img src="intermec-logo.gif" width="300" alt="Intermec Expect More!" border="0"></center>
</body>
</html>

