<html>
<head>
<meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
<title> Golf Trophy </title>
</head>
<body>
<h2><a href="index.html">Golf Trophy</a></h2>
<h3>Übersicht</h3>
<?php
   $db = mysql_connect();

   $res = mysql_db_query("golfertrophy",
          "select * from golfer order by Flight, Name");
   $num = mysql_num_rows($res);
   echo "$num Datensätze gefunden<br>";
   // Tabellenbeginn
   echo "<table border>";

   // Überschrift
   echo "<tr> <td>id</td> <td>Flight</td>";
   echo "<td>Name</td> <td>Ge</td>";
   echo "<td>Nearest</td> <td>Longest</td> </tr>";

   for ($i=0; $i<$num; $i++)
   {
      $id = mysql_result($res, $i, "id");
      $nn = mysql_result($res, $i, "Flight");
      $vn = mysql_result($res, $i, "Name");
      $pn = mysql_result($res, $i, "Geschlecht");
      $ge = mysql_result($res, $i, "Nearest");
      $gt = mysql_result($res, $i, "Longest");
      /*echo "$nn, $vn, $pn, $ge, $gt <br>";*/

      // Tabellenzeile mit -zellen
      echo "<tr> <td>$id</td> <td>$nn</td> <td>$vn</td>";
      echo "<td>$pn</td> <td>$ge</td> <td>$gt</td> </tr>";
   }

   // Tabellenende
   echo "</table>";

   mysql_close($db);
?>
</body>
</html>

