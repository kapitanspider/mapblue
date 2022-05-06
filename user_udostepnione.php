<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - Udostępnione</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
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
	  <li class="nav-item" >
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
	  <li class="nav-item">
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:700px;">
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
$i=0;
echo '<div class="accordion" id="accordion1">';
while($row = $result->fetch_assoc())
{
echo '<div class="accordion-item">';
  echo '<h2 class="accordion-header" id="heading'.$i.'">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">
  '.$row["IMIE"].' '.$row["NAZWISKO"].' - '.$row["nazwa"].'
  </button>
  </h2>';
  echo '<div id="collapse'.$i.'" class="accordion-collapse collapse" aria-labelledby="heading'.$i.'" data-bs-parent="#accordion1">
  <div class="accordion-body">
  <p class="m-1"><b>Woj: </b>'.$row["wojewodztwo"]."<b> Nr. Okręgu: </b>".$row["okreg"]." <b>Powiat: </b> ".$row["powiat"]." <b>Gmina: </b>".$row["gmina"].'</p>
  <p class="m-1"><b>Link do wydarzenia: </b><a href="'.$row["potwierdzenie"].'" target="blank">'.$row["potwierdzenie"].'</a></p>
  <p class="m-1"><b>Rodzaj wydarzenia:</b> '.$row["rodzaj"].'</p>
  <p class="m-1"><b>Data:</b> '.$row["data"].'</p>';
  switch ($row["ocena"]) {
    case 0:
        echo "<p style='background-color:white;'>".$row["ocena"]."</p>";
        break;
    case 1:
        echo "<p style='background-color:red;'>".$row["ocena"]."</p>";
        break;
    case 2:
        echo "<p style='background-color:yellow;'>".$row["ocena"]."</p>";
        break;
	case 3:
        echo "<p style='background-color:lightgreen;'>".$row["ocena"]."</p>";
        break;
	}
	echo "<form action='user_udostepnione.php' method='post'>
	<input type='hidden' name='begin' value=".$begin.">
	<input type='hidden' name='end' value=".$end.">
	<input type='hidden' name='id_aktywnosci' value=".$row["id_aktywnosci"].">
	
	<input type='submit' name='ocena' style='background-color:white;' value='0'>
	<input type='submit' name='ocena' style='background-color:red;' value='1'>
	<input type='submit' name='ocena' style='background-color:yellow;' value='2'>
	<input type='submit' name='ocena' style='background-color:lightgreen;' value='3'>
	</form>";
  echo '</div>';
  echo "</div>";
  echo "</div>";
  $i++;
}
echo "</div>";
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>