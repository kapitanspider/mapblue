<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Profil - Zmiana Hasła</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
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
<?php
var_dump($_POST);
?>
<div class="container-fluid p-2 card mt-1" style="max-width:700px;">
<form action="admin_users_change_pass_db.php" method="post">
<input type="hidden" name="id" value=<?php echo  $_POST["id"]; ?>>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Nowe hasło</span>
  
  <input type="password" class="form-control" name='haslo' id="haslo" oninput="validate()" placeholder="Hasło" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon2">Potwierdź hasło</span>
  <input type="password" class="form-control" name='haslo2' id="haslo2" oninput="validate()" placeholder="Hasło" aria-describedby="basic-addon2">
</div>
<input type="submit" class="btn blue m-1" id="sub" disabled value="Zatwierdź">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>

</body>
</html>
