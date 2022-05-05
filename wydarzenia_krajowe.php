<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - wydarzenia Ogólnopolskie</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="main.php"><span class="h3">MapBlue</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link" href="map.php">Dodaj aktywność</a>
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
	  <li class="nav-item active">
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container-fluid p-2 card" style="max-width:500px;">
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
<br>
OD:
<input type="date" name="begin" required value="<?php echo $begin; ?>"> 
DO:
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Ustaw">
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
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>