<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><body>
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
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<br>
<div class="container-fluid p-2 card" style="max-width:700px;">
<?php
$sql = "SELECT * From aktywnosci Where ID_Organizatora='".$_POST["id_uczestnika"]."' order by data_dodania desc";
$result = $conn->query($sql);
$i=0;
echo '<div class="accordion" id="accordion1">';
if($result->num_rows==0)
{
    echo "Brak aktywności";
}
while($row = $result->fetch_assoc())
{
    echo '<div class="accordion-item">';
    echo '<h2 class="accordion-header" id="heading'.$i.'">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">
    '.$row["nazwa"].'
    </button>
    </h2>';
    echo '<div id="collapse'.$i.'" class="accordion-collapse collapse" aria-labelledby="heading'.$i.'" data-bs-parent="#accordion1">
    <div class="accordion-body">
    <p class="m-1"><b>Woj: </b>'.$row["wojewodztwo"]."<b> Nr. Okręgu: </b>".$row["okreg"]." <b>Powiat: </b> ".$row["powiat"]." <b>Gmina: </b>".$row["gmina"].'</p>
    <p class="m-1"><b>Link do wydarzenia: </b><a href="'.$row["potwierdzenie"].'" target="blank">'.$row["potwierdzenie"].'</a></p>
    <p class="m-1"><b>Rodzaj wydarzenia:</b> '.$row["rodzaj"].'</p>
    <p class="m-1"><b>Data:</b> '.$row["data"].'</p>
    <p class="m-1"><b>Notatka:</b> '.$row["notatka"].'</p>';
    echo '</div>';
    echo "</div>";
    echo "</div>";
    $i++;
}
?>
</div>
<a href="users.php" class="btn blue m-2">Wróć</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
