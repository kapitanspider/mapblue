<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>MapBlue - Kalendarz</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
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
	  <li class="nav-item" >
        <a class="nav-link " href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="kalendarz_user.php">Kalendarz</a>
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
<?php
$db_data = array();
$sql = "SELECT * From aktywnosci Where ID='".$_POST["ID"]."'";
$result = $conn->query($sql);
?>
<div class="container-fluid p-3 mt-1 " style="max-width:700px;">
<?php
$row = $result->fetch_assoc();
//var_dump($row);
echo "<div class='card m-1 p-2'>";
echo "Lokalizacja:<br>Województwo: ".$row["wojewodztwo"]."<br>Okręg: ".$row["okreg"]."<br>Powiat: ".$row["powiat"]."<br>Gmina: ".$row["gmina"];
echo "</div>";
echo "<div class='card m-1 p-2'>";
echo "Nazwa Wydarzenia: ".$row["nazwa"];
echo "<br>";
echo "<a href='".$row["potwierdzenie"]."' target='blank' >
	<svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='currentColor' class='bi bi-link' viewBox='0 0 16 16'>
	<path d='M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z'/>
	<path d='M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z'/>
	</svg></a>";
echo "Typ Wydarzenia: ".$row["rodzaj"];
echo "<br>";
echo "Data wydarzenia: ".$row["data"];
echo "<br>";
echo "Godzina: ".$row["godzina"];
echo "<br><br>";
echo "Ilość uczestników: ".$row["uczestnicy"];
echo "<br>";
echo "Notatka: ".$row["notatka"];

?>
<br>
<br>
<form action="kalendarz_user_szczegoly_edit.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $_POST["ID"];?>">
    <input type="submit" class="btn btn-primary m-2" value="Edytuj wydarzenie">
</form>
</div>
<br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
