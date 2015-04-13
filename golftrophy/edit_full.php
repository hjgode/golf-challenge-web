<html>
<body>
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
   $altna = mysql_result($res, 0, "name");
   $altge = mysql_result($res, 0, "geschlecht");
   $altne = mysql_result($res, 0, "nearest");
   $altlo = mysql_result($res, 0, "longest");

   echo "Führen Sie die Änderungen durch, ";
   echo "betätigen Sie anschließend den Button<p>";

   echo "<form action = 'transmitdata.php' ";
   echo " method = 'post'>";

echo "Flight: ";
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
echo "</select><p>";

   echo "Name: <input name='neuna' value='$altna'>";
   echo "<p>";

echo "Geschlecht: ";
echo "<select name='neuge'>";
echo "<option value='M' ";
if ($altge=="M") { echo " selected>M</option>";}
    else { echo ">M</option>";}

echo "<option value='W' ";
if ($altge=="W") { echo " selected>W</option>";}
    else { echo ">W/option>";}
echo "</select><p>";

   echo "Nearest: <input name='neune' value='$altne'>";
   echo " <p>";
   echo "Longest: <input name='neulo' value='$altlo'>";
   echo " <p>";
   echo "<input type='hidden' name='oriid' ";
   echo " value='$auswahl'>";

   echo "<input type='submit' ";
   echo " value='Speichern'><p>";
   echo "<input type='reset'>";
   echo "</form>";

   mysql_close($db);
}

else
   echo "<h3>Es wurde kein Datensatz ausgewählt</h3><p>";
   echo "Zurück zur <a href='editdata.php'>Auswahl</a>";
?>
</body>
</html>
