<html>
<head>
<title> ADMIN - Golf Trophy </title>
</head>
<body>
<img src="trophy_top.gif" width="100" alt="Uwe Seeler Stiftung" border="0">
<center><h2><a href="admin.html">Golf Trophy</a></h2>
<h2>Teilnehmerliste</h2></center>
<?php
   $db = mysql_connect();

   $res = mysql_db_query("golfertrophy",
          "select * from golfer order by Name");
   $num = mysql_num_rows($res);
   // Tabellenbeginn
	echo "<table border='1' rules='cols' align='center'>";
   // Überschrift
	//echo "<CAPTION><strong>Golf Trophy Teilnehmerliste</strong></CAPTION>";
	echo "<THEAD>";
   echo "<tr>";
   echo "<th width='30' align='center'><strong>id</strong></th>";
   echo "<th width='150'><strong>Name</strong></th>";
   echo "<th width='30' align='center'><strong>Ge</strong></th>";
   echo "<th width='30' align='center'><strong>Flight</strong></th>";
   echo "<th width='30' align='center'><strong>Tee</strong></th>";
   echo "<th width='50' align='center'><strong>Tu</strong></th>";
   echo "<th width='50' align='center'><strong>DGV</strong></th>";
   echo "<th width='30' align='center'><strong>Nearest</strong></th>";
   echo "<th width='30' align='center'><strong>Longest</strong></th>";
   echo "</tr>";
	echo "</THEAD>";

   for ($i=0; $i<$num; $i++)
   {
      $id = mysql_result($res, $i, "id");
      $na = mysql_result($res, $i, "Name");
      $ge = mysql_result($res, $i, "Geschlecht");
      $fl = mysql_result($res, $i, "Flight");
	  $te = mysql_result($res, $i, "tee");
	  $tu = mysql_result($res, $i, "tu");
	  $dg = mysql_result($res, $i, "DGV");
      $ne = mysql_result($res, $i, "Nearest");
      $gt = mysql_result($res, $i, "Longest");
      /*echo "$nn, $vn, $pn, $ge, $gt <br>";*/

      // Tabellenzeile mit -zellen, wechselweise Grau hinterlegen
         if (($i % 2) !=1)
             {
             echo "<tr BGCOLOR='eeeeee'>";
             }
             else
             {
             echo "<tr>";
             }
	  
	  echo "<td align='center'>$id</td>";
	  echo "<td>$na</td>";
	  echo "<td align='center'>$ge</td>";
      echo "<td align='center'>$fl</td>";
	  echo "<td align='center'>$te</td>";
	  echo "<td align='center'>$tu</td>";
	  echo "<td align='center'>$dg</td>";
	  echo "<td align='center'>$ne</td>";
	  echo "<td align='center'>$gt</td>";
	  echo "</tr>";
   }

   // Tabellenende
   echo "</table>";

   mysql_close($db);
   echo "$num Datensätze gefunden<br>";
?>
</body>
</html>

