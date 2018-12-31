<head>
<title>Wynik</title>
<link rel="Stylesheet" type="text/css" href="style.css" />  
</head>
<body>
<div class="wyniki">
  

<?php
require_once("database.inc.php");
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$pakowacz = $_GET['pakowacz'];
$sql = "SELECT asortyment, numer, cast(data_skanowania as date) FROM $pakowacz where cast(data_skanowania as date) between '$_GET[data_od]' and '$_GET[data_do]' ";
if ($result2=mysqli_query($mysqli,$sql))
  {
  $rowcount=mysqli_num_rows($result2);
  mysqli_free_result($result2);
  }
else{
  echo $mysqli->error.'<br />';
}
$data = date("Y/m/d");
echo 'Raport pakowacza: '.$_GET['pakowacz']."<br />";  
echo 'Raport od dnia: '.$_GET['data_od']."<br />";
echo 'Raport do dnia: '.$_GET['data_do'].'<br />';
echo 'Liczba spakowanych paczek z zakresu: '.$rowcount;
echo '<table class="sortable"><tr><td width="25">L.P</td><td width="110">Data skanowania</td><td width="195">Numer przesyłki</td><td width="195">asortyment</td></tr>';
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {

  $i=1;
    while($row = $result->fetch_assoc()) {
        echo  '<tr>'.'<td width="25">'.$i++ .'</td>'.'<td width="110">'.$row["cast(data_skanowania as date)"].'</td>'.'<td width="195">'.$row['numer'].'</td>'.'<td width="195">'.$row['asortyment'].'</td>'. '</tr>';
    }
} else {
    echo $mysqli->error;
}
echo "</table>";
$result->free();
require_once('statystyki.php');
$mysqli->close();
?>
<button onclick="window.location.href='raporty.php'">Kontynuuj</button>
</div>

<div class="przewoznicy">
  Statystyki przewoźników<br />
<?php
require_once('statystyki.php');
  if ($rowcount != 0 || $rowcount2 != 0 || $rowcount3 != 0 || $rowcount4 != 0 || $rowcount5 != 0) {
$procentGLS = $rowcount2 / $rowcount * 100;
$procentPoczta = $rowcount3 / $rowcount * 100;
$procentDPD = $rowcount4 / $rowcount * 100;
$procentInPost = $rowcount5 / $rowcount * 100;  
echo 'Paczki wysłane GLS: '.$rowcount2.'  Procent paczek z zakresu: '.$procentGLS.'%<br />';
echo 'Paczki wysłane Pocztą: '.$rowcount3.'  Procent paczek z zakresu: '.$procentPoczta.'%<br />';  
echo 'Paczki wysłane DPD: '.$rowcount4.'  Procent paczek z zakresu: '.$procentDPD.'%<br />';
echo 'Paczki wysłane Inpost: '.$rowcount5.'  Procent paczek z zakresu: '.$procentInPost.'%';  
} else {
    echo "brak danych";
}

  
  
?>
  </div>
  </body>
