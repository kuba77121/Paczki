<head>
  <link rel="stylesheet" href="style.css">

</head>

<?php
$numer = $_GET['numer'];
echo 'Informacje na temat przesyłki o numerze :<b>'.$numer.'</b><br />';
require_once ('database.inc.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$sql= "SELECT numer, przewoznik, asortyment, data_etykiety, data_skanowania, kto_pakowal from Sprawdz_kto_pakowal where numer='$numer'";
$result = $mysqli->query($sql);
 if ($result=mysqli_query($mysqli,$sql))
  {
   $row = $result->fetch_assoc();
 echo '<table class="sortable"><tr><td width="25">Numer przesyłki</td><td width="100">Data etykiety</td><td width="195">Data i godzina spakowania</td><td width="195">Asortyment</td><td width="195">Kto spakował</td></tr>';

   echo  '<tr>'.
          '<td width="195">'.$row['numer'].'</td>'.
          '<td width="100">'.$row["data_etykiety"].'</td>'.
               '<td width="100">'.$row["data_skanowania"].'</td>'.
          '<td width="195">'.$row['asortyment'].'</td>'.
          '<td width="195">'.$row['kto_pakowal'].'</td><br />';    
  }
else{
  echo $mysqli->error.'<br />';
} 


$result->free();
$mysqli->close();

  ?>
  <button onclick="window.location.href='index.php'">Powrót</button>   
<button onclick="window.location.href='Sprawdz_kto_pakowal.php'">Kolejna paczka</button> 

