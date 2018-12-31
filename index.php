
<head>
 	<link rel="Stylesheet" type="text/css" href="style.css" />
  <title>Profile</title>
  
</head>
Wybierz swój profil:<br />
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
<?php
  $ile_tabel ;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<button onclick="window.location.href=`'.$row["Tables_in_pakowanie"].".php`".'">'.$row["Tables_in_pakowanie"].'</button><br /><br style="line-height: 8px" />';
    }
} else {
    echo "brak tabel w bazie". $mysqli->error;
}
  ?>
<button onclick="window.location.href='nowy_profil.php'">Dodaj nowy profil</button>