<?php
require_once ('database.inc.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
  ?>
<form method="GET" action="kto_pakowal.php" autocomplete="off">
Podaj numer paczki <input type="text" name="numer" size="60" autofocus><br />
<button type="submit" value="Submit" >Sprawdź</button><br /><br />

</form>
  <button onclick="window.location.href='index.php'">Powrót</button> 

