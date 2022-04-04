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
$sql= "SELECT Count(aktywnosci.ID), users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where data between '".$begin."' and '".$end."' and gmina='".$_POST["gmina"]."' group by aktywnosci.ID_Organizatora";
$result = $conn->query($sql);

?>
<form action="admin_statystyki_gmina_lista.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="hidden" name="gmina" required value="<?php echo  $_POST["gmina"]; ?>">
<input type="submit" value="Prześlij">
</form>
<table border="solid">
    <tr>
        <td>ID</td>
        <td>Imie i nazwisko</td>
        <td>Ilość aktywnosci w gminie</td>
    </tr>
<?php
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row["ID_Organizatora"]."</td>";
    echo "<td>".$row["IMIE"]." ".$row["NAZWISKO"]."</td>";
    echo "<td>".$row["Count(aktywnosci.ID)"]."</td>";
    echo "</tr>";
}
?>
</table>
<a href="main.php">Wróć</a>
</body>
</html>