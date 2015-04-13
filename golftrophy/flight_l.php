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
echo "<title> Golf Trophy - Flight - $fli</title>";
echo "</head>";
echo "<body>";
echo "<body>";
echo "<table align='center'><tr><a href='index_l.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<?php
//$fli=$_POST['flight'];

   $db = mysql_connect();

   $res = mysql_db_query("golfertrophy",
          "select * from golfer where Flight=$fli order by Name");
   $num = mysql_num_rows($res);

   //echo "";
?>
<table align='center' >
<tr>
<td>
<form name="fli_auswahl" action="flight_l.php" method="POST" OnSubmit>
    <center><font size=+3>Flight <? echo "$fli - " ;?></font>
        <select name="flight" size="1" onchange="this.document.fli_auswahl.submit()">
        <?
        $db=mysql_connect();;
        $query=mysql_db_query("golfertrophy","SELECT DISTINCT flight from golfer order by flight");
        while ($anz=mysql_fetch_array($query))
        {
        echo "<option value='$anz[flight]' ";
        if ($fli==$anz[flight])
            { echo "selected>"; }
            else
            { echo ">";}
        echo "$anz[flight]</option>";
        }
        ?>
    </select>
    <INPUT TYPE=button NAME="4" VALUE="Wählen" onClick="document.fli_auswahl.submit()"></center>
</form>
</td>
</tr>
</table>
<?php
   // Tabellenbeginn
   echo "<table border=1 align='center'>";

   // Überschrift
   echo "<tr>";
   //echo "<td>id</td>";
   //echo "<td>Flight</td>";
   echo "<td>Name</td>";
   echo "<td>Ge</td>";
   echo "<td>Nearest</td>";
   echo "<td><strong>Longest</strong></td> </tr>";

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
        //echo "<tr>";

          // Tabellenzeile mit -zellen, wechselweise Grau hinterlegen
          if (($i % 2) !=1)
            {
            echo "<tr BGCOLOR='EEEEEE'>";
            $fc = "<font color='0000ff'>";
            }
            else
            {
            echo "<tr>";
            $fc = "";
            }

        //echo "<td>$id</td>";
        //echo "<td>$fl</td>";
        echo "<td>$fc$na</td>";
        echo "<td>$fc$ge</td>";
        echo "<td align=center>$fc$ne</a></td>";
        echo "<td align=center>$fc<a href='edit_longest.php?ID=$id' border=0>$lo</a></td>";
          // Tabellenzeile mit -zellen, wechselweise Grau hinterlegen
          if (($i % 2) !=1)
            {
            echo "</font>";
            }
        echo "</tr>";
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
<table  align='center' ><img src="intermec-logo.gif" width="300" alt="Intermec Expect More!" border="0"></table>
</body>
</html>