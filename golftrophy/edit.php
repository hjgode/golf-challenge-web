<html>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
</head>
<body>
<h2><a href="index.html">Golf Trophy</a></h2>
<h3>Daten ändern</h3>
<?php
/*
echo "Auswahl='$auswahl'";
echo "id='$id'";
*/
$recordID=$_GET['ID'];
if ($recordID)
{
   $db = mysql_connect();
   $sqlab = "select * from golfer where";
   $sqlab .= " id = $recordID";
   $res = mysql_db_query("golfertrophy", $sqlab);

   $altfl = mysql_result($res, 0, "flight");
   $altte = mysql_result($res, 0, "tee");
   $altst = mysql_result($res, 0, "Startzeit");
   $altna = mysql_result($res, 0, "name");
   $altge = mysql_result($res, 0, "geschlecht");
   $altdg = mysql_result($res, 0, "dgv");
   $alttu = mysql_result($res, 0, "tu");
   $altne = mysql_result($res, 0, "nearest");
   $altlo = mysql_result($res, 0, "longest");
   $oriid = mysql_result($res, 0, "id");

   echo "Führen Sie die Änderungen durch, ";
   echo "speichern Sie anschließend.<p>";

   echo "<form action = 'transmitdata.php' ";
   echo " method = 'post'>";
//Flight
    echo "<table border=0><tr>";
    echo "<td>";
    echo "Flight:";
    echo "</td>";
    echo "<td>";
    echo "<select name='neufl'>";
    for ($i=1; $i<=26; $i++)
        {
        if ($i<10)
            {
            $si='0' . $i;
            }
            else
            {
            $si=' ' . $i;
            }
            echo "<option ";
            if ($altfl == $si)
                {
                echo "selected ";
                }
            echo "value='$si'>$si</option>";
        }
    echo "</select>";
    echo "</td>";
    echo "</tr>";

//Tee
    echo "<tr><td>Tee ($altte)</td><td>";
    echo "<select name='neute'>";
        echo "<option value='01'";
        if ($altte=="01")
           echo " selected>01</option>";
        else
           echo " >01</option>";
        echo "<option value='10'";
        if ($altte=="10") 
           echo " selected>10</option>";
        else 
             echo ">10</option>";
//        echo "<option value='10'>10</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";
//Startzeit
    echo "<tr><td>";
    echo "Starzeit:";
    echo "</td><td>";
    echo "<input name='neust' value='$altst' size=15><small>(Eingabe: HH:MM:SS)</small>";
    echo "</td></tr>";

//Name
    echo "<tr><td>";
       echo "Name:";
       echo "</td>";
       echo "<td><input name='neuna' value='$altna' size=40>";
    echo "</td>";
    echo "</tr>";
//Geschlecht
    echo "<tr><td>";
    echo "Geschlecht: ";
    echo "</td>";
    echo "<td>";
    echo "<select name='neuge'>";
    echo "<option value='M' ";
    if ($altge=="M") { echo " selected>M</option>";}
        else { echo ">M</option>";}
    echo "<option value='W' ";
    if ($altge=="W") { echo " selected>W</option>";}
        else { echo ">W</option>";}
    echo "</select>";
    echo "</td>";
    echo "</tr>";
//DGV-Stv
    echo "<tr><td>";
    echo "DGV-Stv:";
    echo "</td><td>";
    echo "<input name='neudg' value='$altdg' size=15>";
    echo "</td></tr>";

//Tu-Spv
    echo "<tr><td>";
    echo "Tu-Spv:";
    echo "</td><td>";
    echo "<input name='neutu' value='$alttu' size=15>";
    echo "</td></tr>";

//Nearest
    echo "<tr><td>";
    echo "Nearest:";
    echo "</td>";
    echo "<td>";
       echo "<input name='neune' value='$altne' type='hidden'>$altne";
    echo "</td>";
    echo "</tr>";
//Longest
    echo "<tr><td>";
    echo "Longest:";
    echo "</td><td>";
    echo "<input name='neulo' value='$altlo' type='hidden'>$altlo";
    echo "<input type='hidden' name='recordID' value='$recordID'>";
    echo "</td>";
    echo "</tr>";

echo "<tr><td>";
   echo "<input type='reset' value='  Reset  '>";
echo "</td><td>";
   echo "<input type='submit' value='Speichern'> ";
echo "</td></tr>";
   echo "</table>";
   echo "</form>";

   mysql_close($db);
}

else
   echo "<h3>Es wurde kein Datensatz ausgewählt</h3><p>";
   echo "Zurück zur <a href='editdata.php'>Auswahl</a>";
?>
<hr>
<img src="intermec-logo.gif" width="338" height="60" alt="Intermec Expect More!" border="0">
</body>
</html>
