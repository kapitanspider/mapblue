<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
$db_data = array();
$sql = "SELECT * From Aktywnosci Where ID='".$_POST["ID"]."'";
$result = $conn->query($sql);
?>
<table border="solid">
<?php
$row = $result->fetch_assoc();
//var_dump($row);
echo "Lokalizacja:<br>-->Województwo: ".$row["wojewodztwo"]."<br>--->Powiat: ".$row["powiat"]."<br>---->Gmina: ".$row["gmina"];
echo "<br><br>";
echo "Nazwa Wydarzenia: ".$row["nazwa"];
echo "<br>";
echo "Typ Wydarzenia: ".$row["rodzaj"];
echo "<br>";
echo "Data wydarzenia: ".$row["data"];
echo "<br>";
echo "Godzina: ".$row["godzina"];
echo "<br><br>";
echo "Ilość uczestników: ".$row["uczestnicy"];
echo "<br>";
echo "<a href='".$row["potwierdzenie"]."' target='blank' >Link do wydarzenia</a>";
echo "<br>";
echo "Notatka: ".$row["notatka"];

?>
<br>
<br>
<form action="kalendarz_user_szczegoly_edit.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $_POST["ID"];?>">
    <input type="submit" value="Edytuj">
</form>
<br>
<a href="kalendarz_user.php">Wróć</a>
</table>
</body>
</html>
