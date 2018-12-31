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
$sql = "SELECT asortyment, numer, cast(data_skanowania as date) FROM $pakowacz where DATE(data_skanowania) between '$_GET[data_od]' and '$_GET[data_do]' ";
$sql2 = "SELECT DATE(data_skanowania) AS Data, COUNT(*) AS Ilosc FROM $pakowacz where DATE(data_skanowania) between '$_GET[data_od]' and '$_GET[data_do]' GROUP BY DATE(data_skanowania) ORDER BY Data ";
if ($result2=mysqli_query($mysqli,$sql2))
  {
  mysqli_free_result($result2);
  }
else{
  echo $mysqli->error.'<br />';
}
  if ($result3=mysqli_query($mysqli,$sql))
  {
  $rowcount=mysqli_num_rows($result3);
  mysqli_free_result($result3);
  }
else{
  echo $mysqli->error.'<br />';
}
$data = date("Y/m/d");
echo 'Raport pakowacza: '.$_GET['pakowacz']."<br />";  
echo 'Raport od dnia: '.$_GET['data_od']."<br />";
echo 'Raport do dnia: '.$_GET['data_do'].'<br />';
echo 'Liczba spakowanych paczek z zakresu: '.$rowcount;
echo '<table class="sortable"><tr><td width="25">DATA</td><td width="110">Ilosc</td><td width="110">Premia</td></tr>';
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
$premiacalosc = 0;
  $i=1;
    while($row = $result->fetch_assoc()) {
      $ilosc=$row["Ilosc"];
      if($ilosc <30){
        $premia='0';
      }else if(($ilosc > 30 && $ilosc <= 40)){
        $premia=$ilosc*0.3;
      }else if($ilosc>40){
        $premia=12+(($ilosc-40)*0.5);
      }
$premiacalosc += $premia; 
      
        echo  '<tr>'.'<td width="110">'.$row["Data"].'</td>'.'<td width="110">'.$row["Ilosc"].'</td>'.'<td width="110">'.$premia.'</td>'.'</tr>';
      
    }
} else {
    echo $mysqli->error;
}
echo "</table>";
  echo 'Calosc premii od '.$_GET['data_od'].' do '.$_GET['data_do']." :".$premiacalosc.'zł';
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
$procentGLS = round(($rowcount2 / $rowcount * 100),2);
$procentPoczta = round(($rowcount3 / $rowcount * 100),2);
$procentDPD = round(($rowcount4 / $rowcount * 100),2);
$procentInPost = round(($rowcount5 / $rowcount * 100),2);  
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
