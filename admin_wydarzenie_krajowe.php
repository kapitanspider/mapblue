<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>MapBlue - Wydarzenia ogólnopolskie</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Strona główna</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="kalendarz_user.php">Kalendarz</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ustawienia.php">Ustawienia</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="pomoc.php">Pomoc</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php

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

<table class="table table-striped">
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
	echo "<td><form action='admin_wydarzenie_krajowe_pochodne.php' method='post'>";
	echo "<input type='hidden' name='id' value='".$row["ID"]."'>";
	echo "<input type='submit' value='Wyświetl wydarzenia pochodne'> ";
	echo "</form></td>";
	echo "</tr>";
}
?>
</table>
<a href="admin_wydarzenie_krajowe_dodaj.php">Dodaj wydarzenie ogólnopolskie</a>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>