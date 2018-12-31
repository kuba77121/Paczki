 <head>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8">
<title>Pakowanie</title>
<link rel="stylesheet" href="style.css">
</head><font size="12">

<script type="text/javascript"> 
function stopRKey(evt) { 
    var evt = (evt) ? evt : ((event) ? event : null); 
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
     if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
     } 

 
 function ModifyEnterKeyPressAsTab() {
     if (window.event && window.event.keyCode == 13) {
    	     window.event.keyCode = 9;
             document.getElementById("nextfield").focus();
     }
 }

 function ModifyEnterKeyPressAsTab2() {
     if (window.event && window.event.keyCode == 13) {
	     window.event.keyCode = 9;
             document.getElementById("nextfield2").focus();
     }
 }

 function zamknij_dokument() {
     if (window.event && window.event.keyCode == 13) {
	document.getElementById('formID').submit();
     }
 }

//`window.event.keyCode` nie działa z firefox
 document.onkeypress = stopRKey;  
</script>
<button onclick="window.location.href='index.php'">Zmień profil</button> 
<form method="post" action="dodaj.php" autocomplete="off" id="formID">
  <?php
   $tabela = basename(__FILE__, '.php');

echo 'Zalogowany jako: <input size="30" type="text" name="pakowacz" value="'.$tabela.'" ><br>';
   
   ?>
Numer przesyłki : <input type="text" name="numer" size="35" autofocus onkeydown="ModifyEnterKeyPressAsTab()"><br>
Pakowany asortyment : <input type="text" name="asortyment" id="nextfield" onkeydown="ModifyEnterKeyPressAsTab2()"><br>
  Data etykiety :   <input type="text" name="data_etykiety" id="nextfield2" onkeydown="zamknij_dokument()"></font>

<button onclick="document.getElementById('formID').submit();">Zapisz</button>
</form>

 <button onclick="window.location.href='raporty.php'">Pobierz raport</button><br />
Dziś spakowane: 
   <?php
$data = date("Y/m/d");
$tabela = basename(__FILE__, '.php');

require_once("database.inc.php");
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

   $sql = "SELECT ID, data_etykiety, asortyment, numer, cast(data_skanowania as date) FROM `$tabela` where cast(data_skanowania as date) = '$data' ORDER BY ID desc";
$result = $mysqli->query($sql);
 if ($result2=mysqli_query($mysqli,$sql))
  {
  $rowcount=mysqli_num_rows($result2);
  mysqli_free_result($result2);
  }
else{
  echo $mysqli->error.'<br />';
} 
   
echo $rowcount;
echo '<table class="sortable"><tr><td width="25">L.P</td><td width="100">Data etykiety</td><td width="195">Numer przesyłki</td><td width="195">Asortyment</td><td width="30">Akcja</td></tr>';

if ($result->num_rows > 0) {

  $i=$rowcount;
  
    while($row = $result->fetch_assoc()) {
        echo  '<tr>'.
          '<td width="25">'.$i-- .'</td>'.
          '<td width="100">'.$row["data_etykiety"].'</td>'.
          '<td width="195">'.$row['numer'].'</td>'.
          '<td width="195">'.$row['asortyment'].'</td>'.
          '<form action="delete.php" method="get">
          <input type="hidden" id="numer" name="numer" value="'.$row["numer"].'"> 
          <input size="30" type="hidden" name="pakowacz" value="'.$tabela.'" >
          <td width="10"><button value="USUN">USUŃ</button></form></td>'.'</tr>';
    }
} else {
    echo $mysqli->error;
}
echo "</table>";

$result->free();
$mysqli->close();
?>
