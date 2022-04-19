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
$sql = "SELECT * From Aktywnosci Where ID_Organizatora='".$_SESSION["USER"]."' and data between '".$begin."' and '".$end."' order by data asc, godzina asc";
$result = $conn->query($sql);
?>
<form action="kalendarz_user.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>
<table border="solid">
<?php
while($row = $result->fetch_assoc())
{
	echo '<tr><td>'.$row["nazwa"].'</td><td>'.$row["data"].'</td><td>'.$row["godzina"].'</td><td><form action="kalendarz_user_szczegoly.php" method="post"><input type="hidden" name="ID" value="'.$row["ID"].'"><input type="submit" value="Szczegóły"></form></td></tr>';
}
?>
</table>
<a href="main.php">Wróć</a>
</body>
</html>
