# a web based golf trophy scoring app

used on "ApacheFriends XAMPP Mini for windows Version 1.3 (09.02.2004)"

added <meta name="viewport" content="width=240, initial-scale=2, maximum-scale=2, minimum-scale=2">
to all pages (except results, which are intended to run a large screen) to make it mobile friendly for
screens with more than 240x320 screen.

# Installation
This web application was written for minixampp 1.3 on windows

It enables you you track longest and shortest flights on a golf track.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/start-page.gif) 

You may import and use some testdata, see file testdaten.dat.

After you point your mobile browser to the main web page, you can select a flight and edit the nearest and shortest flight.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/select-flight.gif) 

Just click on the numbers to change the distance.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/change-both.gif) 

There is a search option to find a player, just click on "Suchen" in the main page

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/suchen.gif) 

If you do not enter any pattern and just click [Suchen] you get a list with all players.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/suchen-all.gif) 

If you click a name of a player, the list with the team players is shown:

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/team.gif) 

Now you print the score card for the team by clicking the "Drucken" link.

The print function uses a windows shared printer named "golftrophy" on the windows PC. This must be pre-created manually to be able to use the print function.

The system was used with mobile devices taken by a team connected to the server via wireless LAN.

On the other side the actual results where displayed in the club house automatically for all male and female players.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/results.gif) 

There is also an integrated admin page to enter the names of the players in the teams.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/admin1.gif) 

There is an option to show all data only (Daten anzeigen) or to edit the data. These pages are best to be used from a larger desktop web browser.

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/admin-showdata.gif) 

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/admin-editdata.gif) 

In "Daten ändern" you can edit, delete and insert data.

The edit window:

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/admin-data-edit.gif) 

The delete function will show another delete window to let you confirm the delete:

![](https://github.com/hjgode/golf-challenge-web/raw/master/doc/admin-data-del1.gif) 

The last option of the admin main page ("Die Ergebnisse") is to show the actual results, separate for male and female players. The display will refresh periodically and toggles between the male and female results page.

The results are sorted by nearest low and longest high values.

#Installation

## Full

there is a full install including minixampp inside GolfTrophy(2006).zip. Just unpack the zip to "c:\minixampp" and then start apache_start.bat and mysql_start.bat in separate cmd windows.

## Manual

- download minixampp for 
windows or linux
- setup minixampp by starting setup_xampp.bat
- copy all ./golftrophy files to the htdocs dir into a new golftrophy directory.
- edit httpd.conf in apache\conf of your minixampp dir: The DocumentRoot dir needs to be changed to the golftrophy dir. Change the Directory entry to point to c:/minixampp/htdocs/golftrophy too.
- edit "C:\minixampp\apache\bin\php.ini" and enable php_printer by removing a leading ";". There should be a copy of php_printer.dll in php/extensions folder.
- create a windows printer share named "golftrophy" on the Windows PC.

### Start the web server

Double click apache_start.bat and mysql_start.bat in your minixampp installation.

