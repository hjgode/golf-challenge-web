<html>
<body>
<head>
<META name="HandheldFriendly" content="True">
<title>Golf Trophy - Daten drucken
</title>
</head>
<body>
<?php
echo "<table align='center'><tr><td><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></td>";
echo "<td><h4>Golf Trophy - Daten drucken</h4></td>";
echo "</tr></table>";
$fli=$_GET['FLI'];
$action=$_GET['ACTION'];
function drucken($fli)
{
    $handle = @printer_open('golftrophy');
	if ($handle == FALSE)
		{
		echo "<strong>Druckerfreigabe 'golftrophy' nicht verfügbar! Drucken nicht möglich.</strong>";
		return 1;
		}
    printer_start_doc($handle, "Golf Trophy");
	printer_start_page($handle);

    //$db = mysql_connect();
    $res = mysql_db_query("golfertrophy","select * from golfer where flight=$fli");
    $num = mysql_num_rows($res);

    $offsetX=200;
	$offsetY=200;

    //Titel
    $text = "Uwe Seeler Stiftung";
    $font = printer_create_font("Arial", 144, 96, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
	printer_draw_text($handle, $text, $offsetY, $offsetX);
	printer_delete_font($font);

	//Titel 2
    $offsetX=$offsetX+200;
    //Überschrift
    $text = "Golf Trophy";
    $font = printer_create_font("Arial", 108, 72, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
	printer_draw_text($handle, $text, $offsetY, $offsetX);
	printer_delete_font($font);

    $offsetX=$offsetX+200;
    //Überschrift
    $text = "Startliste für Flight $fli";
    $font = printer_create_font("Arial", 90, 60, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
	printer_draw_text($handle, $text, $offsetY, $offsetX);
	printer_delete_font($font);

    $offsetX=$offsetX+200;
    //Tabellenüberschrift
	$text = "Tee";
    $font = printer_create_font("Courier", 72, 48, PRINTER_FW_BOLD, false, true, false, 0);
    printer_select_font($handle, $font);
	printer_draw_text($handle, $text, $offsetY, $offsetX);
	$text = "Startzeit";
	printer_draw_text($handle, $text, $offsetY+300, $offsetX);
	$text = "Name";
	printer_draw_text($handle, $text, $offsetY+900, $offsetX);
	$text = "DGV-Stv";
	printer_draw_text($handle, $text, $offsetY+2300, $offsetX);
	$text = "Tu-Spv";
	printer_draw_text($handle, $text, $offsetY+2800, $offsetX);

	printer_delete_font($font);


	//Daten
	$offsetX=$offsetX+100;
    $font = printer_create_font("Courier", 72, 48, PRINTER_FW_NORMAL, false, false, false, 0);
    printer_select_font($handle, $font);

	for ($i=0; $i<$num; $i++)
		{
        $fl = mysql_result($res, $i, "Flight");
		$te = mysql_result($res, $i, "Tee");
		$st = substr (mysql_result($res, $i, "Startzeit"), 0, 5);
        $na = mysql_result($res, $i, "Name");
        $dgv = mysql_result($res, $i, "DGV");
        $tu = mysql_result($res, $i, "TU");
		$text = $te;
        printer_draw_text($handle, $text, $offsetY, $offsetX+100*$i);
		$text = $st;
        printer_draw_text($handle, $text, $offsetY+300, $offsetX+100*$i);
		$text = $na;
        printer_draw_text($handle, $text, $offsetY+900, $offsetX+100*$i);
        $text = $dgv;
        printer_draw_text($handle, $text, $offsetY+2300, $offsetX+100*$i);
        $text = $tu;
        printer_draw_text($handle, $text, $offsetY+2800, $offsetX+100*$i);

		}
    printer_delete_font($font);

	printer_draw_bmp($handle, "C:\\minixampp\\htdocs\\golftrophy\\intermec-logo.bmp", $offsetY, $offsetX+100*$i);

    printer_end_page($handle);
    printer_end_doc($handle);
    printer_close($handle);
}


//echo "ACTION ist '$action'";
   $db = mysql_connect();
   $res = mysql_db_query("golfertrophy","select * from golfer where flight=$fli");
   $num = mysql_num_rows($res);
   echo "<strong><center>Teilnehmer in Flight '$fli'</center></strong>";
   if ($num != 0)
   {
       echo "<table align='center' border=1>"; //Tabellenanfang
       echo "<tr>";
	   echo "<td>Tee</td>";
	   echo "<td>Starzeit</td>";
       echo "<td>Name</td>";
       echo "<td>DGV-Stv</td>";
       echo "<td>Tu-Spv</td>";
       echo "</tr>";
       for ($i=0; $i<$num; $i++)
       {
            $id = mysql_result($res, $i, "id");
            $fl = mysql_result($res, $i, "Flight");
		$te = mysql_result($res, $i, "Tee");
		$st = mysql_result($res, $i, "Startzeit");
		$na = mysql_result($res, $i, "Name");
            $ge = mysql_result($res, $i, "Geschlecht");
            $ne = mysql_result($res, $i, "Nearest");
            $lo = mysql_result($res, $i, "Longest");
        $dgv = mysql_result($res, $i, "DGV");
        $tu = mysql_result($res, $i, "TU");
            echo "<tr>";
            echo "<td align=left>$te</td>";
            echo "<td align=left>$st</td>";
            echo "<td align=left>$na</td>";
            echo "<td align=center>$dgv</td>";
            echo "<td align=center>$tu</td>";
            echo "</tr>";
        }
        echo "</table>";
   }
   else
       echo "<center><strong>Keine Daten ähnlich zu Name='$name' gefunden!</strong></center>";

    //To find back to the flight
    echo "<br>";
	echo "<table border=0 align='center'><td bgcolor='#FFFF00'><a href='printit.php?FLI=$fli&ACTION=1'>DRUCKEN</a></td><td>...........</td><td><a href='search.php'>Zurück zur Suchseite</a></td></table>";

	if ($action==1)
	{
    	$res = drucken($fli);
    	if ($res == 0)
			echo "<center>Flight wurde gedruckt</center>";
    	$action=0;
    }

?>
<hr>
<center>
<img src="intermec-logo.gif" width="300" alt="Intermec Expect More!" border="0">
</center></body>
</html>