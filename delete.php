<?php
$numer = $_GET["numer"];
require_once("database.inc.php");
$conn = new mysqli($servername, $username, $password, $dbname);
     $pakowacz=$_GET['pakowacz'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
$sql = "DELETE from `$pakowacz` where numer = '$numer'";
$sql2 = "DELETE from Sprawdz_kto_pakowal where numer = '$numer'";

if ($conn->query($sql) === TRUE &&  $conn->query($sql2) === TRUE) {
    echo "Usunięto rekord!";
  header( "refresh:2;url=$pakowacz.php");
} else {
    echo "Błąd! : " . $conn->error;
echo '<button onclick="window.location.href=`'.$pakowacz.".php`".'">'.'Kontynuuj'.'</button>';
}

$conn->close();
?>