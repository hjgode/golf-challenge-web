<html>
<body>
<head>
<meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
<META name="HandheldFriendly" content="True">
<?php
if ($fli=="")
    { $fli=$_POST['flight']; }
if ($fli=="")
    { $fli=$_GET['flight']; }

if ($fli=="")
    { $fli=1; }
echo "<title> Golf Trophy - Suchergebnis</title>";
echo "</head>";
echo "<body>";
echo "<table align='center'><tr><td><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a>";
echo "</td><td>";
//$name=$_POST['name'];

   $db = mysql_connect();
   $res = mysql_db_query("golfertrophy","select * from golfer where Name LIKE '$name%'");
   $num = mysql_num_rows($res);
   echo "<tr><td><strong>Suchergebnis zu '$name'</strong></td></tr>";
echo "</td></tr>";
echo "</table>";
   if ($num != 0)
   {
       echo "<table align='center' border=1><tr>"; //Tabellenanfang
       echo "<td>Flight</td>";
       echo "<td>Tee</td>";
       echo "<td>Name</td>";
       echo "<td>Startzeit</td>";
       echo "</tr>";
       for ($i=0; $i<$num; $i++)
       {
            $id = mysql_result($res, $i, "id");
            $fl = mysql_result($res, $i, "Flight");
            $te = mysql_result($res, $i, "Tee");
            if ($te=="")
               $te="x";
            $na = mysql_result($res, $i, "Name");
            $st = mysql_result($res, $i, "Startzeit");
            $ge = mysql_result($res, $i, "Geschlecht");
            $ne = mysql_result($res, $i, "Nearest");
            $lo = mysql_result($res, $i, "Longest");
            echo "<tr>";
            echo "<td align=center>$fl</td>";
            echo "<td align=center>$te</td>";
            echo "<td align=left> <a href='printit.php?FLI=$fl'>$na</a></td>";
            echo "<td align=left>$st</td>";
            echo "</tr>";
        }
        echo "</table>";
   }
   else
       echo "<center><strong>Keine Daten ähnlich zu Name='$name' gefunden!</strong></center>";

   echo "<p><center><a href='search.php'>Zurück zur Suchseite</a></center>";
?>
<hr>
<center>
<img src="intermec-logo.gif" width="300" alt="Intermec Expect More!" border="0">
</center>
</body>
</html>