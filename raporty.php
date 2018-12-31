<head>
 	<link rel="Stylesheet" type="text/css" href="style.css" />
  <title>Raporty</title>
</head>
Drukowanie raportu<br />
<?php
require_once ('database.inc.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

  $sql = 'SHOW TABLES';
$result = $mysqli->query($sql);
?>
Wybierz pakowacza i zakres <br />
<form method="get" action="pobierz.php">
<?php 
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<input type="radio" checked name="pakowacz" value="'.$row["Tables_in_Pakowanie"].'"><label for"'.$row["Tables_in_Pakowanie"].'">'.$row["Tables_in_Pakowanie"].'</label><br>';
    }
} else {
    echo "brak tabel w bazie". $mysqli->error;
}
  
  ?>
Data od : <input type="date" name="data_od" size="35"><br>
Do: <input type="date" name="data_do" size="35"><br><br>
  <input type="submit" value="Pobierz">
</form>

<button onclick="window.location.href='index.php'">Powrót do pakowania</button>