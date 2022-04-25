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
}
else
{
$begin=date_format(date_create(),"Y-m-d");
$end=date("Y-m-d",mktime(0,0,0,date('m')+1,date('d'),date('y')));
}
?>
<form action="wydarzenia_krajowe.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>

<table >
<?php
$sql="DELETE FROM powiadomienia WHERE id_osoby='".$_SESSION["USER"]."'";
$conn->query($sql);
$sql="SELECT * FROM wydarzenia_ogolnopolskie WHERE data between '".$begin."' and '".$end."' order by data asc, godzina asc";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["nazwa"]."</td>";
	echo "<td>".$row["data"]."</td>";
	echo "<td>".$row["godzina"]."</td>";
	echo "<td><a href='".$row["plik"]."' target='blank' >Załącznik</a></td>";
	echo "<td>
	<form method='GET' action='map.php'>
	<input type='hidden' name='ID_Parent' value='".$row["ID"]."'>
	<input type='submit' value='Utwórz wydarzenie pochodne'>
	</form>
	</td>";
	echo "</form></td>";
	echo "</tr>";
}
?>
</table>
<br>
<a href="main.php">Wróć</a>
</body>
</html>