<?php
include('facecheck.php');
include('dbconfig.php');
?>
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
var_dump($_POST);
$sql= "SELECT aktywnosci.ID, users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where ID_Parent='".$_POST["id"]."' order by users.IMIE, users.NAZWISKO asc";
$result = $conn->query($sql);
echo "<table border='solid'>";

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
echo "<td>".$row["wojewodztwo"]." / ".$row["okreg"]." / ".$row["powiat"]." / ".$row["gmina"]."</td>";
echo "<td>".$row["nazwa"]."</td>";
echo "<td>".$row["data"]."</td>";
echo "<td>".$row["godzina"]."</td>";
echo "<td>".$row["uczestnicy"]."</td>";
echo "<td><a href='".$row["potwierdzenie"]."' target='blank'>"."Link"."</a></td>";
echo "<td>".$row["data_dodania"]."</td>";
echo "<td>".$row["ocena"]."</td>";
echo "</tr>";
}
echo "</table>";
?>
<br>
<a href="main.php">Wróć</a>
</body>
</html>