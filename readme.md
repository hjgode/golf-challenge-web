a web based golf trophy scoring app

used on "ApacheFriends XAMPP Mini for windows Version 1.3 (09.02.2004)"

added <meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
to all pages (except results, which are intended to run a large screen) to make it mobile friendly for
screens with more than 240x320 screen.

german installation description

Installationsanleitung f�r "Golf Event 2005"(GE2)

_______________Komplett-Install:___________________
Das Zip Golf2005-minixampp.zip enth�lt alle erforderlichen Dateien und sollte MIT Verzeichnissen nach C:\ entpackt werden. Danach hat man ein lauff�higes System unterhalb von c:\minixampp.

_______________Manuelle Installation_______________
Als erstes muss auf einem Windows-Rechner minixampp installiert werden. W�hrend der Entwicklung wurde die Version "minixampp-win32-1.3.zip" verwendet.

Nach der Installation des Apache Webservers mit MySql und PHP muss die Batchdatei "setup_xampp.bat" im Installationsverzeichnis (normalerweise "C:\minixampp") einmal ausgef�hrt werden.

Die Dateien von GE2 sollten alle in das Verzeichnis "C:\minixampp\htdocs\golf2005" kopiert werden.
Nun m�ssen die php.ini und die httpd.conf angepasst werden. 

httpd.conf
�ffnen Sie als erstes die Datei httpd.conf im Verzeichnis "C:\minixampp\apache\conf" mit einem Texteditor. Suchen Sie nach der Zeile "DocumentRoot..." und �ndern Sie sie so, dass sie wie folgt lautet und auf das Home-Verzeichnis von GE2 zeigt:
DocumentRoot "C:/minixampp/htdocs/golf2005"
�ndern Sie auch die Zeile "<Directory... wie nachfolgend
<Directory "C:/minixampp/htdocs/golf2005">

Durch dies �nderungen wird die index-Seite von GE2 zur Standardseite beim Zugriff auf den Webserver auf dem Windows PC.

php.ini
Achtung es exisitieren zwei Dateien php.ini. �ffnen und �ndern Sie die php.ini im Verzeichnis "C:\minixampp\apache\bin". Suchen Sie nach der Zeile mit "extension=php_printer.dll" und entfernen Sie ein eventuell am Anfang stehendes ";", damit die Zeile aktiv wird. Die Erweiterung php_printer.dll wird zum Drucken ben�tigt.

___________________ Drucken _______________________
Die Druckfunktion in GE2 basiert auf einem beliebigen auf dem Windows PC unter dem Freigabenamen "golf2004" freigegebenen Drucker. Alle Druckauftr�ge aus GE2 verwenden den Freigabenamen "golf2004". Wenn diese Druckerfreigabe nicht existiert, ist kein Ausdruck m�glich.

___________________ Start der Server ______________
Starten der Anwendung
Zum Starten klicken Sie im Verzeichnis "C:\minixampp" zuerst doppelt auf "apache_start.bat" und dann auf "mysql_start.bat". Zum Beenden k�nnen Sie erst auf "mysql_stop.bat" doppelt klicken und dann das Kommando-Fenster von apache_start schliessen.

___________________ Administration ________________
Wenn der Windows PC die IP-Adresse 192.168.0.1 hat, kann man im Internet Explorer oder einem anderen Webbrowser �ber die URL http://192.168.0.1 auf die Webseiten von GE2 zugreifen.

___________________ PHP Druck Modul aktivieren ________________
Achtung: In der php.ini im Verzeichnis 

C:\minixampp\apache\bin 

eine Zeile freigeben:

statt: ";extension=php_printer.dll"
muss : "extension=php_printer.dll"
