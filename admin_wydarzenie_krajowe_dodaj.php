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


if(isset($_POST["nazwa"]))
{
$target_dir = "pliki_wydarzen/";
$target_file = $target_dir .$_POST["data"]." ".$_POST["nazwa"]." ". basename($_FILES["zalacznik"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Taki plik już istnieje";
  $uploadOk = 0;
}

// Forbid certain file formats
if($imageFileType == "exe"){
  echo "Pliki exe nie są dozwolone";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Wystąpił błąd";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["zalacznik"]["tmp_name"], $target_file)) {
    echo "Plik ". htmlspecialchars( basename( $_FILES["zalacznik"]["name"])). " został wgrany na serwer, A wydarzenie zostało utworzone";
	$sql = "INSERT INTO `wydarzenia_ogolnopolskie` (`nazwa`, `data`, `godzina`, `plik`) VALUES ('".$_POST["nazwa"]."', '".$_POST["data"]."', '".$_POST["godzina"]."', '".$target_file."')";
	$conn->query($sql);
	$sql = "SELECT * from wydarzenia_ogolnopolskie where plik = '".$target_file."'";
	$result=$conn->query($sql);
	$row = $result->fetch_assoc();
	$wydarzenie=$row["ID"];
	$sql = "select ID from users";
	$result=$conn->query($sql);
	$ins_sql="INSERT INTO `powiadomienia` (`id_wydarzenia`, `id_osoby`) VALUES ";
	while($row = $result->fetch_assoc())
	{
		$ins_sql.="('".$wydarzenie."','".$row["ID"]."'), ";
	}
	$ins_sql = rtrim($ins_sql, ", ");
	$conn->query($ins_sql);
  } 
  else {
    echo "Wystąpił błąd";
  }
}
}
?>
<form action="admin_wydarzenie_krajowe_dodaj.php" method="post" enctype="multipart/form-data">
<p>Nazwa wydarzenia:</p>
<input type="text" name="nazwa" required>
<p>Data wydarzenia:</p>
<input type="date" name="data" id="input_data" min="<?= date('Y-m-d'); ?>"required>
<p>Godzina wydarzenia:</p>
<input type="time" name="godzina" required>
<p>Załącznik:</p>
<input type="file" name="zalacznik" required>
<br>
<br>
<input type="submit" value="Utwórz">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>