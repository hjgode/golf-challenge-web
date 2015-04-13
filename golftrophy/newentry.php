<html>
<head>
<title>ADMIN - Daten hinzufügen</title>
<?php
   if ($gesendet=="Hinzufügen")
   {
       if (!$na=="")
        {
        $db = mysql_connect();
        /* Datenprüfung*/
           $res = mysql_db_query("golfertrophy",
            "select * from golfer where flight='$fli' AND name='$na'");
        $num = mysql_num_rows($res);
        if ($num>0)
            {
            echo "Der Name <strong>$na</strong> existiert schon im Flight <strong>$fli</strong>!<p>";
            $error=1;
            }
           $res = mysql_db_query("golfertrophy",
        "select * from golfer where flight='$fli'");
        $num = mysql_num_rows($res);
        if ($num>=4)
            {
            echo "Es sind schon <strong>4</strong> Personen im Flight <strong>$fli</strong>!<p>";
            $error=1;
            }
        if ($error==0)
        {

            $sqlab = "insert golfer";
            $sqlab .= "(flight, name, geschlecht";
            $sqlab .= ", Tee, Startzeit, DGV, TU";
            $sqlab .= " ) values ";
            $sqlab .= "('$fli', '$na', '$ge', ";
            $sqlab .= "'$te', '$st', '$dg', '$tu')";

            mysql_db_query("golfertrophy", $sqlab);

            $num = mysql_affected_rows();
            if ($num>0)
             echo "Es wurde 1 Datensatz hinzugefügt<p>";
            else
            {
             echo "Es ist ein Fehler aufgetreten, ";
             echo "es wurde kein Datensatz hinzugefügt<p>";
            }
        }
        mysql_close($db);
        $gesendet="";
        }
        else
        {
        echo "<h3>Bitte geben Sie einen Namen ein!</h3>";
        $gesendet="";
        }
   }
?>
</head>
<?php
echo "<table><tr><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<body>
<h2><a href="admin.html">Admin - Golf Trophy</a></h2>
Geben Sie einen Namen ein und wählen Sie Geschlecht und Flight und klicken Sie dann auf <strong>Hinzufügen</strong>:
<form action = "newentry.php" method = "post">
<table>
<tr>
<td>
    Flight:
</td>
<td>
    <select name="fli">
<?php
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
        echo "value='$si'>$si</option>";
    }
echo "</select><p>";
?>
</td>
</tr>
<tr>
<td>
    Tee:
</td>
<td>
    <select name="te">
    <option value="01">01</option>
    <option value="10">10</option>
    </select>
</td>
</tr>
<tr>
<td>
    Startzeit:
</td>
<td>
    <input name="st" value="13:00:00">
</td>
</tr>
<tr>
<td>
    Name:
</td>
<td>
    <input name="na">
</td>
</tr>
<tr>
<td>
    Geschlecht:
</td>
<td>
    <select name="ge">
    <option value="M" selected>M</option>
    <option value="W">W</option>
    </select>
</tr>
<tr>
<td>
    DGV-Stv:
</td>
<td>
    <input name="dg">
</td>
</tr>
<tr>
<td>
    Tu-Spv:
</td>
<td>
    <input name="tu">
</td></tr>
</table>
    <p>
    <input type="submit" name="gesendet" value="Hinzufügen">
    <input type="reset" value="Zurücksetzen">
</form>

<a href="editdata.php">ZURÜCK</a>
</body>
</html>
