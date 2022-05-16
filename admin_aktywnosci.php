<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Admin - Aktywności</title>
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
<div class="container-fluid p-2 card mt-1" style="max-width:700px;">
<?php

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
$sql= "SELECT aktywnosci.ID, users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where data between '".$begin."' and '".$end."' order by data asc, godzina asc";
$result = $conn->query($sql);

?>
<form action="admin_aktywnosci.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit" value="Prześlij">
</form>
<?php
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
  <p class="m-1"><b>Data:</b> '.$row["data"].'</p>
  <p class="m-1"><b>Ocena:</b> '.$row["ocena"].'</p>
  <p class="m-1"><b>Notatka:</b> '.$row["notatka"].'</p>';
  echo '</div>';
  echo "</div>";
  echo "</div>";
  $i++;
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>