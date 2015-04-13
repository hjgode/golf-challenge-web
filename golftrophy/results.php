<html>
<head>
    <script language=javascript>
     var TickerTime = 30000;
        function tickern()
   {
       location.href="results_m.php" ;
   }
      setTimeout( "tickern()", TickerTime );
    </script>
<?php
session_cache_limiter('nocache');
session_start();
header("Cache-control: no-cache, must revalidate"); // IE 6 Fix.
header("Pragma: no-cache");?>
<title> Golf Trophy - Ergebnis Damen</title>
</head>
<body>
<table><tr>
<td width='50%'>
<a href="index.html"><img src="trophy_top.gif" height="100" alt="Uwe Seeler Stiftung" border="0"></a>
</td>
<td align="right" width='350'>
<h3>Ergebnisse - Damen</h3>
</td>
</tr>
</table>
<hr>
<?php
   $db = mysql_connect();

//block 1
   $res = mysql_db_query("golfertrophy", "select * from golfer where Geschlecht='W' AND Nearest+0>0 order by Nearest");
   $num = mysql_num_rows($res);

//block 2
   $res1 = mysql_db_query("golfertrophy","select * from golfer where Geschlecht='W' and longest+0>0 order by Longest DESC");
   $num1 = mysql_num_rows($res1);

   if ($num < $num1)
       {
       $max = $num;
       }
       else
       {
       $max = $num1;
       }
   if ($max > 40)
       {
       $max=15;
       }

   
   //echo "<h3>Damen, Nearest to Pin <small>$num Datensätze gefunden - </small>";
   //echo "Longest Drive <small>$num1 Datensätze gefunden - </small></h3><p>";


// Tabellenbeginn
   echo "<table border='0' width=750>";
// Überschriftzeile block 1
   echo "<tr>";
   echo "<td COLSPAN=3>";
   echo "<strong><font size='+2'>Damen, Nearest to Pin </strong></font>";
   echo "</td><td></td>";
   echo "<td COLSPAN=3>";
   echo "<strong><font size='+2'>Damen, Longest Drive </strong></font>";
   echo "</td>";
   echo "</tr>";
   echo "</tr>";
   //echo "<td>id</td>";
   echo "<td>Flight</td>";
   echo "<td>Name</td>";
   //echo "<td>Ge</td>";
   echo "<td>Nearest</td>";
   //echo "<td>Longest</td>";
//block 2
    echo "<td WIDTH=1% BGCOLOR='ffffff'></td>"; //trennspalte

   //echo "<td>id</td>";
   echo "<td>Flight</td>";
   echo "<td>Name</td>";
   //echo "<td>Ge</td>";
   //echo "<td>Nearest</td>";
   echo "<td>Longest</td>";
   echo "</tr>";

   for ($i=0; $i<=$max; $i++)
   {
//block links Longest ($num)
	if($num != 0)
	{
      $id = mysql_result($res, $i, "id");
      $fl = mysql_result($res, $i, "Flight");
      $na = mysql_result($res, $i, "Name");
      $ge = mysql_result($res, $i, "Geschlecht");
      $ne = mysql_result($res, $i, "Nearest");
      $ne = number_format($ne, 2, ',', ' ');
      $lo = mysql_result($res, $i, "Longest");
      /*echo "$nn, $vn, $pn, $ge, $gt <br>";*/
    }
	else
	{
      $id = "";
      $fl = "";
      $na = "";
      $ge = "";
      $ne = "";
      $lo = "";
	}
//block rechts Nearest ($num1)
	if($num1 != 0)
	{
      $id1 = mysql_result($res1, $i, "id");
      $fl1 = mysql_result($res1, $i, "Flight");
      $na1 = mysql_result($res1, $i, "Name");
      $ge1 = mysql_result($res1, $i, "Geschlecht");
      $ne1 = mysql_result($res1, $i, "Nearest");
      $lo1 = mysql_result($res1, $i, "Longest");
      $lo1 = number_format($lo1, 2, ',', ' ');
      //echo "$id1, $fl1, $na1, $ge1, $ne1, $lo1 <br>";
	}
	else
	{
      $id1 = "";
      $fl1 = "";
      $na1 = "";
      $ge1 = "";
      $ne1 = "";
      $lo1 = "";
	}

      // Tabellenzeile mit -zellen, wechselweise Grau hinterlegen
         if (($i % 2) !=1)
             {
             echo "<tr BGCOLOR='eeeeee'>";
             }
             else
             {
             echo "<tr>";
             }
//block links
      //echo "<td>$id</td>";
      echo "<td>$fl</td>";
      echo "<td>$na</td>";
      //echo "<td>$ge</td>";
      echo "<td ALIGN=CENTER>$ne</td>";
      //echo "<td>$lo</td>";
      //echo "</tr>";

    echo "<td WIDTH=1% BGCOLOR='ffffff'></td>"; //trennspalte
//block rechts
      //echo "<td>$id1</td>";
      echo "<td>$fl1</td>";
      echo "<td>$na1</td>";
      //echo "<td>$ge1</td>";
      echo "<td ALIGN=CENTER>$lo1</td>";
      //echo "<td>$lo1</td>";
      echo "</tr>";

    }

   // Tabellenende
   echo "</table>";

   mysql_close($db);
?>
<hr>
<img src="intermec-logo.gif" width="338" height="60" alt="Intermec Expect More!" border="0">
</body>
</html>
