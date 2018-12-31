 <head>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8">
<title>Wynik</title>
</head> 
<?php

$GLS = 12;
$Poczta = 20;
$DPD = 28;
$InPost = 24;
$str = strlen($_POST['numer']);
   function DodajPaczke() {
     $GLS = 12;
$Poczta = 20;
$DPD = 28;
$InPost = 24;
$str = strlen($_POST['numer']);
     if ($str == $GLS) {
  $przewoznik="GLS";
} elseif ($str == $Poczta) {
    $przewoznik="Poczta";
} elseif ($str == $DPD) {
    $przewoznik="DPD";
}elseif ($str == $InPost) {
    $przewoznik="InPost";
}else {
    echo "Nieprawidłowy format numeru przesyłki";
}
// Create connection
require_once("database.inc.php");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
     $pakowacz=$_POST['pakowacz'];
       echo '<button onclick="window.location.href=`'.$pakowacz.".php`".'">'.'Kontynuuj'.'</button>';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
    if ( $_POST['data_etykiety'] == "DZISIAJ" ) { $_POST['data_etykiety'] = date("Y-m-d");  } 
    if ( $_POST['data_etykiety'] == "WCZORAJ" ) { $date1 = new DateTime(); $date1->modify("-1 day"); $_POST['data_etykiety'] = $date1->format("Y-m-d");  } 
    if ( $_POST['data_etykiety'] == "PRZEDWCZORAJ" ) { $date2 = new DateTime(); $date2->modify("-2 day"); $_POST['data_etykiety'] = $date2->format("Y-m-d");  } 
    $sql = "INSERT INTO $pakowacz (numer, asortyment, przewoznik, data_etykiety)
VALUES
    ('$_POST[numer]','$_POST[asortyment]','$przewoznik','$_POST[data_etykiety]')";
    $sql2 = "INSERT INTO Sprawdz_kto_pakowal (numer, asortyment, przewoznik, data_etykiety, kto_pakowal)
VALUES
    ('$_POST[numer]','$_POST[asortyment]','$przewoznik','$_POST[data_etykiety]','$pakowacz')";
if ($conn->query($sql2) === TRUE && $conn->query($sql) === TRUE) {
    echo "Dodano paczke!";

  $conn->close();
} else {
    echo "Zduplikowany numer przesyłki";
}
         }
if ($str == $GLS || $str == $Poczta || $str == $DPD || $str == $InPost) {
DodajPaczke();
    $pakowacz=$_POST['pakowacz'];
header( "refresh:2;url=$pakowacz.php");
} else {
    echo "Nieprawidłowy format numeru przesyłki";
      echo '<button onclick="window.location.href=`'.$pakowacz.".php`".'">'.'Kontynuuj'.'</button>';

}


?> 