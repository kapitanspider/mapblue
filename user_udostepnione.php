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

if(isset($_POST["id_aktywnosci"]))
{
	$sql="UPDATE aktywnosci SET ocena = '".$_POST["ocena"]."' WHERE aktywnosci.ID = ".$_POST["id_aktywnosci"]."";
	$conn->query($sql);
}

?>
<form action="user_udostepnione.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>
<?php
$sql="SELECT * FROM aktywnosci INNER JOIN users on users.ID = aktywnosci.ID_organizatora INNER JOIN udostepnienia on udostepnienia.id_aktywnosci=aktywnosci.ID WHERE udostepnienia.id_usera=".$_SESSION["USER"]." and aktywnosci.data between '".$begin."' and '".$end."'";
$result = $conn->query($sql);
if($result->num_rows==0)
{
	echo "<p>Nic nie zostało dla ciebie udostępnione</p>";
}
else
{
	echo '<table border="solid">';
while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
	echo "<td>".$row["nazwa"]."</td>";
	echo "<td>".$row["wojewodztwo"]." / ".$row["powiat"]." / ".$row["gmina"]."</td>";
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
	
	echo "<td><form action='user_udostepnione.php' method='post'>
	<input type='hidden' name='begin' value=".$begin.">
	<input type='hidden' name='end' value=".$end.">
	<input type='hidden' name='id_aktywnosci' value=".$row["id_aktywnosci"].">
	
	<input type='submit' name='ocena' style='background-color:white;' value='0'>
	<input type='submit' name='ocena' style='background-color:red;' value='1'>
	<input type='submit' name='ocena' style='background-color:yellow;' value='2'>
	<input type='submit' name='ocena' style='background-color:lightgreen;' value='3'>
	</form></td>";
	echo "</tr>";
}
}
?>
</table>
<a href="main.php">Wróć</a>
</body>
</html>