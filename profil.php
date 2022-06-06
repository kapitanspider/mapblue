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
<?php
$db_data = array();
$sql = "SELECT * From users Where ID='".$_SESSION["USER"]."'";
$result = $conn->query($sql);
$user = null;
while($row = $result->fetch_assoc()){
			$user = $row;
		}
?>
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
        <a class="nav-link active" href="profil.php">Profil</a>
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
echo '<img class="card-img-top" src="'.$user["Profilowe"].'">';
echo '<div class="card-body"><h5 class="card-title">'.$user["IMIE"]." ".$user["NAZWISKO"].'</h5>';
echo '<p class="card-text">Login: '.$user["LOGIN"].'</p>';
echo '<p class="card-text">Nr. Okręgu: '.$user["NR_OKREGU"].'</p>';
echo '<p class="card-text">Specjalizacja: '.$user["SPECJALIZACJA"].'</p>';
echo '<p class="card-text">Funkcja: '.$user["FUNKCJA"].'</p>';
echo '<p class="card-text">Adres email: '.$user["EMAIL"].' </p>';
echo '<p class="card-text">Nr. telefonu: '.$user["TELEFON"].' </p>';
echo '<a class="btn blue m-1"  href="change_email.php">Zmień email</a>';
echo '<a class="btn blue m-1" href="change_pass.php">Zmień hasło</a>';
echo '<a class="btn blue m-1" href="change_tel.php">Zmień nr. Telefonu</a> ';
echo '</div>';
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
