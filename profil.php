<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - Profil</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
$db_data = array();
$sql = "SELECT * From Users Where ID='".$_SESSION["USER"]."'";
$result = $conn->query($sql);
$user = null;
while($row = $result->fetch_assoc()){
			$user = $row;
		}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="main.php"><span class="h3">MapBlue</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Strona główna<span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container p-2">
<?php
echo '<img src="'.$user["Profilowe"].'" width="200px" height="200px">';
echo '<p>'.$user["IMIE"]." ".$user["NAZWISKO"].'</p>';
echo '<p>Login: '.$user["LOGIN"].'</p>';
echo '<p>Nr. Okręgu: '.$user["NR_OKREGU"].'</p>';
echo '<p>Specjalizacja: '.$user["SPECJALIZACJA"].'</p>';
echo '<p>Funkcja: '.$user["FUNKCJA"].'</p>';
echo '<p>Adres email: '.$user["EMAIL"].' <a href="change_email.php">Zmień</a></p>';
echo '<p>Nr. telefonu: '.$user["TELEFON"].' <a href="change_tel.php">Zmień</a></p>';
?>
</div>
<br>
<br>
<br>
<a href="change_pass.php">Zmień hasło</a>
<br>
<a href="main.php">Ekran główny</a>
</body>
</html>
