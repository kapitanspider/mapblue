<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST["deactivate"]))
{
	$sql="UPDATE users SET IS_ACTIVE = '0' WHERE ID = '".$_POST["deactivate"]."'";
	$conn->query($sql);
}
if(isset($_POST["activate"]))
{
	$sql="UPDATE `users` SET `IS_ACTIVE` = '1' WHERE `users`.`ID` = ".$_POST["activate"];
	$conn->query($sql);
}

$sql = "SELECT * From users Where Not ID = '".$_SESSION["USER"]."'";
$result = $conn->query($sql);
?>
Użytkownicy
<table border="solid">
<?php
while($row = $result->fetch_assoc())
{
//var_dump($row);
if($row["IS_ACTIVE"]==1)
{
echo "<tr bgcolor=lime>";
}
else
{
echo "<tr bgcolor=red>";	
}
echo "<td>".$row["LOGIN"]."</td>";
echo "<td>".$row["IMIE"]."</td>";
echo "<td>".$row["NAZWISKO"]."</td>";
echo "<td>".$row["EMAIL"]."</td>";
echo "<td>".$row["TELEFON"]."</td>";
if($row["IS_ACTIVE"]==1)
{
?>
<td>
<form action="admin_users.php" method="post">
<input type="hidden" name="deactivate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Dezaktywuj">
</form>
</td>
<?php
}
else
{
?>
<td>
<form action="admin_users.php" method="post">
<input type="hidden" name="activate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Aktywuj">
</form>
</td>
<?php	
}
echo "</tr>";
}
?>
</table>
</body>
</html>