<html>
<head>
<meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
<title>ADMIN - Daten ändern</title>
</head>
<body>
<?php
echo "<table><tr><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<h2><a href="admin.html">Admin - Golf Trophy</a></h2>
<h3>Daten ändern</h3>
Wählen Sie hinter einem Datensatz das Edit oder Löschen-Symbol.
Oder wählen Sie <strong><a href='newentry.php'>Datensatz hinzufügen</a></strong>
<?php
   $db = mysql_connect();
   $res = mysql_db_query("golfertrophy",
      "select * from golfer order by flight, geschlecht, name");
   $num = mysql_num_rows($res);

   // Tabellenbeginn
   echo "<table border>";

   // Überschrift
   // echo "<tr><td>id</td>";
   echo "<td>Flight</td>";
   echo "<td>Tee</td>";
   echo "<td>Startzeit</td>";
   echo "<td>Name</td>";
   echo "<td>Ge</td>";
   echo "<td>DGV-Stv</td>";
   echo "<td>Tu-Spv</td>";
   echo "<td>Nearest</td>";
   echo "<td>Longest</td>";
   echo "<td>edit</td>";
   echo "<td>del</td></tr>";

   for ($i=0; $i<$num; $i++)
   {
      $id = mysql_result($res, $i, "id");
      $fl = mysql_result($res, $i, "flight");
      $te = mysql_result($res, $i, "tee");
      $st = mysql_result($res, $i, "Startzeit");
      $na = mysql_result($res, $i, "name");
      $ge = mysql_result($res, $i, "geschlecht");
      $dg = mysql_result($res, $i, "dgv");
      $tu = mysql_result($res, $i, "tu");
      $ne = mysql_result($res, $i, "nearest");
      $lo = mysql_result($res, $i, "longest");

      // Tabellenzeile mit -zellen
      echo "<tr><td>$fl</td>";
      echo "<td>$te</td>";
      echo "<td>$st</td>";
      echo "<td>$na</td>";
      echo "<td align=center>$ge</td>";
      echo "<td align=center>$dg </td>";
      echo "<td align=center>$tu </td>";
      echo "<td align=center>$ne</td>";
      echo "<td align=center>$lo</td>  ";
      echo "<td align=center><a href='edit.php?ID=$id'><img src='button_edit.png' alt='EDIT' border=0></a></td>";
      echo "<td align=center><a href='confirm_delete.php?ID=$id'><img src='button_del.png' alt='DEL' border=0></a></td>";
      echo " </tr>";
   }

   // Tabellenende
   echo "</table>";

   mysql_close($db);
?>
</form>
</body>
</html>