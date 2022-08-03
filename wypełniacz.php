<?php
include('dbconfig.php');
$string = file_get_contents("wojewodztwa.json");
$dane = json_decode($string, true);
$i=1;
foreach($dane["wojewodztwa"] as $woj)
{
foreach($woj["powiaty"] as $pow)
{
foreach($pow["gminy"] as $gmina)
{
$sql="INSERT INTO `aktywnosci` (`ID_Organizatora`, `wojewodztwo`, `okreg`, `powiat`, `gmina`, `nazwa`, `rodzaj`, `data`, `godzina`, `uczestnicy`, `potwierdzenie`, `notatka`, `data_dodania`, `ocena`, `ID_Parent`, `uwagi`) VALUES ('2', '".$woj["wojewodztwo"]."', '".$pow["okreg"]."', '".$pow["powiat"]."', '".$gmina."', 'Test mapy', 'WIP', '2022-08-05', '20:00:00', '5', 'https://kwejk.com.pl', 'XDDD', '2022-08-01 15:00:45', '0', '0', '---');";
//echo $i." ".$woj["wojewodztwo"]." ".$pow["powiat"]." ".$gmina;
echo $sql;
echo "<br>";
$i++;
//$conn->query($sql);
}
}
}
?>