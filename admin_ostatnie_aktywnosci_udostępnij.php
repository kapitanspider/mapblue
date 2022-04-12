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

var_dump($_POST);
$sql="SELECT * FROM users where users.ADMIN = 0";
$result = $conn->query($sql);

?>
<table border="solid">
<?php
while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
	echo "<td>".$row["EMAIL"]."</td>";
	echo "<td>
	<form action='admin_ostatnie_aktywnosci.php' method='post'>
	<input type='hidden' name='begin' value=".$_POST["begin"].">
	<input type='hidden' name='end' value=".$_POST["end"].">
	<input type='hidden' name='limit' value=".$_POST["limit"].">
	<input type='hidden' name='id_aktywnosci_udostepnij' value=".$_POST["id_aktywnosci"].">
	<input type='hidden' name='id_usera_udostepnij' value=".$row["ID"].">
	<input type='submit' value='Udostępnij do oceny'>
	</form></td>";
	echo "</tr>";
}
?>
</table>
<br>
<a href="main.php">Wróć</a>
</body>
</html>