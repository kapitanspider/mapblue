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
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php
$sql = "SELECT * From users Where not ID='".$_SESSION["USER"]."' order by NAZWISKO,IMIE ASC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
  echo '<div class="col">
  <div class="card float-right mx-auto text-center" style="width: 10rem;">
  <img src="'.$row["Profilowe"].'" class="card-img-top" >
  <div class="card-body">
    <h5 class="card-title">'.$row["IMIE"].'</h5><h5>'.$row["NAZWISKO"].'</h5>
  <form action="users_aktywnosci.php" method="POST">
  <input type="hidden" name="id_uczestnika" value="'.$row["ID"].'">
  <input type="submit" class="btn blue" value="Aktywności">
  </form>
  </div>
  </div>
  </div>';
}
?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
