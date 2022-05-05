<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - Profil - Zmiana Hasła</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	  <li class="nav-item active">
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
	  <li class="nav-item">
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
  </div>
</nav>
<?php
include('facecheck.php');
include('dbconfig.php');
?>
<script>
function validate(){
	if(document.getElementById("haslo").value == document.getElementById("haslo2").value && document.getElementById("haslo").value!=="")
	{
	document.getElementById("sub").disabled = false;
	}
	else{
	document.getElementById("sub").disabled = true;	
	}
}
</script>
<div class="container-fluid p-2 card mt-1" style="max-width:500px;">
<form action="change_pass_db.php" method="post">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Nowe hasło</span>
  <input type="password" class="form-control" name='haslo' id="haslo" oninput="validate()" placeholder="Email" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon2">Potwierdź hasło</span>
  <input type="password" class="form-control" name='haslo2' id="haslo2" oninput="validate()" placeholder="Email" aria-describedby="basic-addon2">
</div>
<input type="submit" class="btn btn-primary m-1" id="sub" disabled value="Zatwierdź">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>

</body>
</html>
