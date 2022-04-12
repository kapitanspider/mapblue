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
<form action="admin_statystyki_powiaty_best.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>
<table>
<?php
$sql= "SELECT powiat, COUNT(ID), wojewodztwo from aktywnosci where data between '".$begin."' and '".$end."'group by powiat order by COUNT(ID) DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["powiat"]."</td><td>".$row["wojewodztwo"]."</td><td>".$row["COUNT(ID)"]."</td>";
	echo "</tr>";
}
?>
</table>
<a href="main.php">Wróć</a>
</body>
</html>