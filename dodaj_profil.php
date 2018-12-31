<?php
$nazwa_profilu = $_GET['imie_profilu'].'_'.$_GET['nazwisko_profilu'].'_Pakowanie.php';
$nazwa_tabeli = $_GET['imie_profilu'].'_'.$_GET['nazwisko_profilu'].'_Pakowanie';
$template = 'template.php';

if (!copy($template, $nazwa_profilu)) {
    echo "nie można skopiować\n";
}
require_once("database.inc.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
$sql = "CREATE TABLE $nazwa_tabeli LIKE Jakub_Prokop_Pakowanie";
if ($conn->query($sql) === TRUE) {
    echo "Dodano profil!";
  header( "refresh:2;url=$nazwa_tabeli.php");
} else {
    echo "Błąd! : " . $conn->error;
  echo '<button onclick="window.location.href=`'.$nazwa_tabeli.'">'.'Kontynuuj'.'</button>';

}

$conn->close();

 

?>