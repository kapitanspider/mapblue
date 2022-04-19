<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST["begin"]))
{
$begin=$_POST["begin"];
$end=$_POST["end"];
$limit=$_POST["limit"];

}
else
{
$begin=date_format(date_create(),"Y-m-d");
$end=date("Y-m-d",mktime(0,0,0,date('m')+1,date('d'),date('y')));
$limit=10;
}


if(isset($_POST["id_aktywnosci"]))
{
	$sql="UPDATE aktywnosci SET ocena = '".$_POST["ocena"]."' WHERE aktywnosci.ID = ".$_POST["id_aktywnosci"]."";
	$conn->query($sql);
}
if(isset($_POST["id_aktywnosci_udostepnij"]))
{
	$sql="SELECT * FROM `udostepnienia` Where id_usera='".$_POST["id_usera_udostepnij"]."'and id_aktywnosci='".$_POST["id_aktywnosci_udostepnij"]."'";
	$result = $conn->query($sql);
	if($result->num_rows==0)
	{
	$sql="INSERT INTO `udostepnienia` (`id_admina`, `id_usera`, `id_aktywnosci`) VALUES ('".$_SESSION["USER"]."', '".$_POST["id_usera_udostepnij"]."', '".$_POST["id_aktywnosci_udostepnij"]."')";
	$conn->query($sql);
	}
	else
	{
		echo "<script>
		alert('Ta aktywnosc już jest udostępniona dla tego urzytwkonika');
		</script>";
	}
}
?>
<form action="admin_ostatnie_aktywnosci.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<label>Ilość:</label>
<input type="number" name="limit" required value="<?php echo  $limit; ?>">
<input type="submit" value="Prześlij">
</form>
<table border="solid">
<td>Imie i Nazwisko</td>
<td>Nazwa aktywnosci</td>
<td>Lokalizacja</td>
<td>Potwierdzenie</td>
<td>Rodzaj</td>
<td>Data</td>
<td>Ocena</td>
<td>Zmień ocenę</td>
<td>Udostępnij do oceny</td>
<?php
$sql= "SELECT users.IMIE, users.NAZWISKO, aktywnosci.ID, aktywnosci.nazwa, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.ocena, aktywnosci.data, aktywnosci.gmina, aktywnosci.potwierdzenie, aktywnosci.rodzaj from aktywnosci INNER JOIN users ON users.ID=aktywnosci.ID_Organizatora where data between '".$begin."' and '".$end."' order by data_dodania desc limit ".$limit;
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
	echo "<td>".$row["nazwa"]."</td>";
	echo "<td>".$row["wojewodztwo"]." / ".$row["okreg"]." / ".$row["powiat"]." / ".$row["gmina"]."</td>";
	echo "<td><a href='".$row["potwierdzenie"]."' target='blank'>".$row["potwierdzenie"]."</a></td>";
	echo "<td>".$row["rodzaj"]."</td>";
	echo "<td>".$row["data"]."</td>";
	switch ($row["ocena"]) {
    case 0:
        echo "<td style='background-color:white;'>".$row["ocena"]."</td>";
        break;
    case 1:
        echo "<td style='background-color:red;'>".$row["ocena"]."</td>";
        break;
    case 2:
        echo "<td style='background-color:yellow;'>".$row["ocena"]."</td>";
        break;
	case 3:
        echo "<td style='background-color:lightgreen;'>".$row["ocena"]."</td>";
        break;
}
	
	echo "<td><form action='admin_ostatnie_aktywnosci.php' method='post'>
	<input type='hidden' name='begin' value=".$begin.">
	<input type='hidden' name='end' value=".$end.">
	<input type='hidden' name='limit' value=".$limit.">
	<input type='hidden' name='id_aktywnosci' value=".$row["ID"].">
	
	<input type='submit' name='ocena' style='background-color:white;' value='0'>
	<input type='submit' name='ocena' style='background-color:red;' value='1'>
	<input type='submit' name='ocena' style='background-color:yellow;' value='2'>
	<input type='submit' name='ocena' style='background-color:lightgreen;' value='3'>
	</form></td>";
	echo "<td><form action='admin_ostatnie_aktywnosci_udostępnij.php' method='post'>
	<input type='hidden' name='begin' value=".$begin.">
	<input type='hidden' name='end' value=".$end.">
	<input type='hidden' name='limit' value=".$limit.">
	<input type='hidden' name='id_aktywnosci' value=".$row["ID"].">
	<input type='submit' value='Udostępnij'>
	</form></td>";
	echo "</tr>";
}
?>
</table>
<a href="main.php">Wróć</a>
</body>
</html>