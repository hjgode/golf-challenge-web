<html>
<head>
<meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
</head>
<body>
<h2><a href="index.html">Golf Trophy</a></h2>
<h3>Datenänderung</h3>
<?php
//echo "recordID=$recordID";
    $error=0;
    if ($neuna=="")
        { echo "Fehler: Leerer Name!<p>";
        $error=1;
        }
    if ($neulo=="" || $neune=="")
        { echo "Fehler: Longest oder Nearest ist leer!<p>";
        $error=1;
        }
   $db = mysql_connect();
   $res = mysql_db_query("golfertrophy","select * from golfer WHERE Flight='$neufl' AND name='$neuna' AND id<>$recordID");
   $num = mysql_num_rows($res);
    if ($num>0)
        { echo "Name ist im Flight $neufl schon vorhanden!<p>";
        $error=1;
        }

    if (!$error==1)
        {
        $db = mysql_connect();

        $sqlab = "update golfer set flight='$neufl', ";
        $sqlab .= "Tee='$neute', Startzeit='$neust', ";
        $sqlab .= "name='$neuna', ";
        $sqlab .= "geschlecht='$neuge', ";
        $sqlab .= "DGV='$neudg', TU='$neutu', ";
        $sqlab .= "nearest=$neune, ";
        $sqlab .= "longest=$neulo ";
        $sqlab .= "where id=$recordID";

        mysql_db_query("golfertrophy", $sqlab);

        $num = mysql_affected_rows();
        if ($num>0)
            echo "Der Datensatz wurde geändert<p>";
        else
            {
            echo "'$sqlab'<p>";
            echo "<b>Der Datensatz wurde nicht geändert!</b><p>";
            echo mysql_error() . "<p>";
            echo "<a href='edit.php?ID=$recordID'>Zurück zur Eingabe-Seite</a>";
            }
        mysql_close($db);
        }
        else
            echo "Es wurden keine Daten geändert!<p>";
?>
<p>Zurück zur <a href="editdata.php">Auswahl</a>

</body>
</html>
