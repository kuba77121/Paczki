<?php
$sqlGLS = "SELECT przewoznik, asortyment, numer, cast(data_skanowania as date) FROM `$pakowacz` where przewoznik = 'GLS' and cast(data_skanowania as date) between '$_GET[data_od]' and '$_GET[data_do]'  ";
if ($statGLS=mysqli_query($mysqli,$sqlGLS))
  {
  $rowcount2=mysqli_num_rows($statGLS);
  mysqli_free_result($statGLS);
  }
else{
  echo $mysqli->error.'<br />';
}
$sqlPoczta = "SELECT przewoznik, asortyment, numer, cast(data_skanowania as date) FROM `$pakowacz` where przewoznik = 'Poczta' and cast(data_skanowania as date) between '$_GET[data_od]' and '$_GET[data_do]'  ";
if ($statPoczta=mysqli_query($mysqli,$sqlPoczta))
  {
  $rowcount3=mysqli_num_rows($statPoczta);
  mysqli_free_result($statPoczta);
  }
else{
  echo $mysqli->error.'<br />';
}
$sqlDPD = "SELECT przewoznik, asortyment, numer, cast(data_skanowania as date) FROM `$pakowacz` where przewoznik = 'DPD' and cast(data_skanowania as date) between '$_GET[data_od]' and '$_GET[data_do]'  ";
if ($statDPD=mysqli_query($mysqli,$sqlDPD))
  {
  $rowcount4=mysqli_num_rows($statDPD);
  mysqli_free_result($statDPD);
  }
else{
  echo $mysqli->error.'<br />';
}
$sqlInPost = "SELECT przewoznik, asortyment, numer, cast(data_skanowania as date) FROM `$pakowacz` where przewoznik = 'InPost' and cast(data_skanowania as date) between '$_GET[data_od]' and '$_GET[data_do]'  ";
if ($statInPost=mysqli_query($mysqli,$sqlInPost))
  {
  $rowcount5=mysqli_num_rows($statInPost);
  mysqli_free_result($statInPost);
  }
else{
  echo $mysqli->error.'<br />';
}
?>