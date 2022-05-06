<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - Użytkownicy</title>
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
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST['login']))
{
$sql = "SELECT * From Users Where Login='".$_POST["login"]."'";
$result = $conn->query($sql);
$target_dir = "profiles/";
$ext = pathinfo($_FILES["profilowe"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir.$_POST['login'].".".$ext;
$uploadOk = 1;


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["profilowe"]["tmp_name"], $target_file)) {
    ;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
if($result->num_rows == 0)
{
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
	move_uploaded_file($_FILES["profilowe"]["tmp_name"], $target_file);
    
	$sql = "INSERT INTO `users` (`ADMIN`, `LOGIN`, `PASSWORD`, `IMIE`, `NAZWISKO`, `EMAIL`, `NR_OKREGU`, `FUNKCJA`, `SPECJALIZACJA`, `TELEFON`, `IS_ACTIVE`, `Profilowe`) VALUES ('".$_POST["admin"]."', '".$_POST["login"]."', '".hash('sha256', $_POST['password'])."', '".$_POST["imie"]."', '".$_POST["nazwisko"]."', '".$_POST["email"]."', '".$_POST["NR_OKREGU"]."', '".$_POST["FUNKCJA"]."', '".$_POST["SPECJALIZACJA"]."', '".$_POST["tel"]."', '1' ,'".$target_file."');";
    $conn->query($sql);
    echo "
    <script>
    alert('Dodano urzytkownika ".$_POST["login"]."');
    window.location.replace('admin_users.php');
    </script>";
	}
}
else{
    echo "Urzytkownik już istnieje";
}
}


?>
<form action="admin_users_add_new.php" method="post" enctype="multipart/form-data">
<p>Zdjęcie profilowe</p>
<input type="file" name="profilowe" required>
<p>Czy urztkownik ma być moderatorem?</p>
<select name="admin" >
<option value="0">Nie</option>
<option value="1">Tak</option>
</select>
<p>Login</p>
<input type="text" name="login" required>
<p>hasło</p>
<input type="text" name="password" required>
<p>Imie</p>
<input type="text" name="imie" required>
<p>Nazwisko</p>
<input type="text" name="nazwisko" required>
<p>Email</p>
<input type="email" name="email" required>
<p>Nr Telefonu</p>
<input type="tel" name='tel' id="tel" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" required>
<p>Nr_okręgu</p>
<input type="text" name="NR_OKREGU" required>
<p>Funkcja</p>
<input type="text" name="FUNKCJA" required>
<p>Specjalizacjia</p>
<input type="text" name="SPECJALIZACJA" required>
<br>
<br>
<input type="submit" value="Dodaj urzytkownika" required>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>