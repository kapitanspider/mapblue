<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST["begin"]))
{
$begin=$_POST["begin"];
$end=$_POST["end"];
}
else
{
$begin=date_format(date_create(),"Y-m-d");
$end=date("Y-m-d",mktime(0,0,0,date('m')+1,date('d'),date('y')));
}
$sql= "SELECT aktywnosci.ID, users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where data between '".$begin."' and '".$end."' order by data asc, godzina asc";
$result = $conn->query($sql);

?>
<form action="admin_aktywnosci.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>
<table border="solid">
<?php

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
echo "<td>".$row["wojewodztwo"]." / ".$row["okreg"]." / ".$row["powiat"]." / ".$row["gmina"]."</td>";
echo "<td>".$row["nazwa"]."</td>";
echo "<td>".$row["data"]."</td>";
echo "<td>".$row["godzina"]."</td>";
echo "<td>".$row["uczestnicy"]."</td>";
echo "<td><a href='".$row["potwierdzenie"]."' target='blank'>".$row["potwierdzenie"]."</a></td>";
echo "<td>".$row["data_dodania"]."</td>";
echo "<td>".$row["ocena"]."</td>";
echo "<td>".$row["notatka"]."</td>";
echo "</tr>";
}
?>
</table>
</body>
</html>