<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Profil - Zmiana nr. Telefonu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<link rel="stylesheet" href="colors.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
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

<script>
function validate(){
	if(document.getElementById("tel").value == document.getElementById("tel2").value && document.getElementById("tel").value.length==13)
	{
	document.getElementById("sub").disabled = false;
	}
	else{
	document.getElementById("sub").disabled = true;	
	}
}
</script>
<div class="container-fluid p-2 card mt-1" style="max-width:700px;">
<form action="change_tel_db.php" method="post">
<p>Format: +48 111222333</p>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Nowy nr. telefonu</span>
  <input type="tel" class="form-control" name='tel' id="tel" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" oninput="validate()" value="+48 "  aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon2">Potwierdź nowy nr. telefonu</span>
  <input type="tel" class="form-control" name='tel2' id="tel2" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" oninput="validate()" value="+48 "  aria-describedby="basic-addon2">
</div>
<input type="submit" class="btn blue m-1" id="sub" disabled value="Zatwierdź">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
