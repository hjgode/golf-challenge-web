<html>
<body>
<head>
<meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
<META name="HandheldFriendly" content="True">
<title>Golf Trophy - Suchen</title>
</head>
<body>
<?php
echo "<table align='center'><tr><a href='index.html'><img src='trophy_top.gif' border='0' alt='Golf Trophy'></a></tr>";
echo "</table>";
?>
<h4><center>Golf Trophy - Suchen</h4>
Sie können bei der Suche nur den Anfang des gesuchten Namens eingeben. 
Die Suche unterstützt auch Platzhalter: <br>% = beliebige Zeichenfolge<br>
_ = einzelnes, beliebiges Zeichen.
<hr>
<table>
<tr>
<td>
<form action = "print.php" method = "post">
    Name: <input name = "name" size='10'>
</td>
<td>    <input type="submit" value="Suchen">
    <input type="reset">
</td>
</tr></table></form>
<?php

?>
<hr>
<img src="intermec-logo.gif" width="300" alt="Intermec Expect More!" border="0">
</center>
</body>
</html>