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

if(isset($_POST["id_wydarzenia_usun"]))
{
	$sql="Select plik FROM wydarzenia_ogolnopolskie WHERE `wydarzenia_ogolnopolskie`.`ID` ='".$_POST["id_wydarzenia_usun"]."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	unlink($row["plik"]);
	$sql="DELETE FROM wydarzenia_ogolnopolskie WHERE `wydarzenia_ogolnopolskie`.`ID` ='".$_POST["id_wydarzenia_usun"]."'";
	$conn->query($sql);
	$sql="DELETE FROM powiadomienia WHERE `powiadomienia`.`id_wydarzenia`  ='".$_POST["id_wydarzenia_usun"]."'";
	$conn->query($sql);
	$sql="UPDATE `aktywnosci` SET `ID_Parent`='0' WHERE ID_Parent='".$_POST["id_wydarzenia_usun"]."'";
	$conn->query($sql);
}

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
?>
<form action="admin_wydarzenie_krajowe.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>

<table >
<?php
$sql="SELECT * FROM wydarzenia_ogolnopolskie WHERE data between '".$begin."' and '".$end."' order by data asc, godzina asc";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["nazwa"]."</td>";
	echo "<td>".$row["data"]."</td>";
	echo "<td>".$row["godzina"]."</td>";
	echo "<td><a href='".$row["plik"]."' target='blank' >Załącznik</a></td>";
	echo "<td><form action='admin_wydarzenie_krajowe.php' method='post'>";
	echo "<input type='hidden' name='id_wydarzenia_usun' value='".$row["ID"]."'>";
	echo "<input type='submit' value='Usuń'> ";
	echo "</form></td>";
	echo "</tr>";
}
?>
</table>
<a href="admin_wydarzenie_krajowe_dodaj.php">Dodaj wydarzenie ogólnopolskie</a>
<br>
<a href="main.php">Wróć</a>
</body>
</html>