<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Dodawanie aktywności</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="colors.css">
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
    <li class="nav-item text-center">
      <a class="nav-link" href="main.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
      <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </svg>
        <br>Strona główna</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_aktywnosci.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
    </svg>
        <br>Wszystkie aktywności</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_statystyki.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
    </svg>
        <br>Statystyki</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_ostatnie_aktywnosci.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
    </svg>
        <br>Ostatnio dodane aktywnosci</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_wydarzenie_krajowe.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
    </svg>
        <br>Wydarzenia ogólnopolskie</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_users.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
    </svg>
        <br>Użytkownicy</a>
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
<div class="container-fluid p-2 card mt-1" style="max-width:700px;">
<form action="admin_statystyki_okregi.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $_GET["begin"]; ?>">
<input type="hidden" name="end" required value="<?php echo  $_GET["end"]; ?>">
<input type="hidden" name="woj" required value="<?php echo  $_GET["woj"]; ?>">
<input type="submit"  class="btn blue w-100" value="Wróć" >
</form>
<form action="admin_statystyki_okregi_szczegoly.php" class="text-center"method="get">
<input type="hidden" name="begin" required value="<?php echo $_GET["begin"]; ?>">
<input type="hidden" name="okr" required value="<?php echo $_GET["okr"]; ?>">
<input type="hidden" name="end" required value="<?php echo  $_GET["end"]; ?>">
<input type="hidden" name="woj" required value="<?php echo  $_GET["woj"]; ?>">
<input type="submit"  class="btn blue w-25 m-2" name="ilosc" value="10" >
<input type="submit"  class="btn blue w-25 m-2" name="ilosc" value="100" >
<input type="submit"  class="btn blue w-25 m-2" name="ilosc" value="500" >
</form>
<?php
$begin=$_GET["begin"];
$end=$_GET["end"];
$okr=$_GET["okr"];
$i=0;
$sql= "SELECT aktywnosci.ID, users.IMIE,users.NAZWISKO , aktywnosci.ID_Organizatora, aktywnosci.wojewodztwo, aktywnosci.okreg, aktywnosci.powiat, aktywnosci.gmina, aktywnosci.nazwa, aktywnosci.rodzaj, aktywnosci.data, aktywnosci.godzina, aktywnosci.uczestnicy, aktywnosci.potwierdzenie, aktywnosci.notatka, aktywnosci.data_dodania, aktywnosci.ocena, aktywnosci.uwagi FROM aktywnosci INNER JOIN users ON aktywnosci.ID_Organizatora=users.ID Where data between '".$begin."' and '".$end."' and aktywnosci.okreg='".$okr."' order by data_dodania desc";
if(isset($_GET['ilosc']))
{
  switch ($_GET['ilosc']) {
    case 10:
      $sql.=" limit 10";
        break;
    case 100:
      $sql.=" limit 100";
        break;
    case 500:
      $sql.=" limit 500";
        break;
}
}
$result = $conn->query($sql);
echo '<div class="accordion mt-2" id="accordion1">';
while($row = $result->fetch_assoc())
{
  echo '<div class="accordion-item">';
  echo '<h2 class="accordion-header" id="heading'.$i.'">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">
  '.$row["IMIE"].' '.$row["NAZWISKO"].' - '.$row["nazwa"].'
  </button>
  </h2>';
  echo '<div id="collapse'.$i.'" class="accordion-collapse collapse" aria-labelledby="heading'.$i.'" data-bs-parent="#accordion1">
  <div class="accordion-body">
  <p class="m-1"><b>Woj: </b>'.$row["wojewodztwo"]."<b> Nr. Okręgu: </b>".$row["okreg"]." <b>Powiat: </b> ".$row["powiat"]." <b>Gmina: </b>".$row["gmina"].'</p>
  <p class="m-1"><b>Link do wydarzenia: </b><a href="'.$row["potwierdzenie"].'" target="blank">'.$row["potwierdzenie"].'</a></p>
  <p class="m-1"><b>Rodzaj wydarzenia:</b> '.$row["rodzaj"].'</p>
  <p class="m-1"><b>Data:</b> '.$row["data"].'</p>
  <p class="m-1"><b>Ocena:</b> '.$row["ocena"].'</p>
  <p class="m-1"><b>Notatka:</b> '.$row["notatka"].'</p>
  <p class="m-1"><b>Uwagi:</b> '.$row["uwagi"].'</p>';
  echo '</div>';
  echo "</div>";
  echo "</div>";
  $i++;
}
?>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>