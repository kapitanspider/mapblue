<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Wydarzenia ogólnopolskie</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="colors.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="main.php">Strona Główna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_aktywnosci.php">Wszystkie aktywności</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_statystyki.php">Statystyki</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_statystyki_kategorie.php">Statystyki kategorii</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_wydarzenie_krajowe.php">Wydarzenia ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_users.php">Użytkownicy</a>
      </li>
    </ul>
    <ul class="navbar-nav">
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php
$sql= "SELECT aktywnosci.ID, users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where ID_Parent='".$_POST["id"]."' order by users.IMIE, users.NAZWISKO asc";
$result = $conn->query($sql);
if($result->num_rows==0)
{
  echo "Brak wydarzeń pochodnych";
}
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
    <p class="m-1"><b>Liczba uczestników:</b> '.$row["uczestnicy"].'</p>
    <p class="m-1"><b>Data:</b> '.$row["data"].'</p>
    <p class="m-1"><b>Godzina:</b> '.$row["godzina"].'</p>
    <p class="m-1"><b>Czas Utworzenia:</b> '.$row["data_dodania"].'</p>
    <p class="m-1"><b>Ocena:</b> '.$row["ocena"].'</p>
    <p class="m-1"><b>Notatka:</b> '.$row["notatka"].'</p>';
    echo '</div>';
    echo "</div>";
    echo "</div>";
    $i++;
}
echo '</div>';
?>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>