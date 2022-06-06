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
<link rel="stylesheet" type="text/css" href="cssmap-poland/cssmap-poland.css" media="screen" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
h1 {
    text-align:center;
}
</style>
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
        <a class="nav-link active" href="map.php">Dodaj aktywność</a>
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
<!-- Mapa -->
<?php 
if(isset($_GET['ID_Parent']))
{
?>
<div id="map-poland">
<h1>Proszę wybrać województwo </h1>
 <ul class="poland">
  <li class="pl1"><a href="map_okregi.php?woj=dolnośląskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Dolnośląskie</a></li>
  <li class="pl2"><a href="map_okregi.php?woj=kujawsko-pomorskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Kujawsko-pomorskie</a></li>
  <li class="pl3"><a href="map_okregi.php?woj=lubelskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Lubelskie</a></li>
  <li class="pl4"><a href="map_okregi.php?woj=lubuskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Lubuskie</a></li>
  <li class="pl5"><a href="map_okregi.php?woj=łódzkie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Łódzkie</a></li>
  <li class="pl6"><a href="map_okregi.php?woj=małopolskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Małopolskie</a></li>
  <li class="pl7"><a href="map_okregi.php?woj=mazowieckie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Mazowieckie</a></li>
  <li class="pl8"><a href="map_okregi.php?woj=opolskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Opolskie</a></li>
  <li class="pl9"><a href="map_okregi.php?woj=podkarpackie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Podkarpackie</a></li>
  <li class="pl10"><a href="map_okregi.php?woj=podlaskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Podlaskie</a></li>
  <li class="pl11"><a href="map_okregi.php?woj=pomorskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Pomorskie</a></li>
  <li class="pl12"><a href="map_okregi.php?woj=śląskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Śląskie</a></li>
  <li class="pl13"><a href="map_okregi.php?woj=świętokrzyskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Świętokrzyskie</a></li>
  <li class="pl14"><a href="map_okregi.php?woj=warmińsko-mazurskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Warmińsko-mazurskie</a></li>
  <li class="pl15"><a href="map_okregi.php?woj=wielkopolskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Wielkopolskie</a></li>
  <li class="pl16"><a href="map_okregi.php?woj=zachodniopomorskie&ID_Parent=<?php echo  $_GET['ID_Parent']; ?>">Zachodniopomorskie</a></li>
 </ul>
</div>
<?php
}
else
{
?>
<div id="map-poland">
<h1>Proszę wybrać województwo </h1>
 <ul class="poland">
  <li class="pl1"><a href="map_okregi.php?woj=dolnośląskie">Dolnośląskie</a></li>
  <li class="pl2"><a href="map_okregi.php?woj=kujawsko-pomorskie">Kujawsko-pomorskie</a></li>
  <li class="pl3"><a href="map_okregi.php?woj=lubelskie">Lubelskie</a></li>
  <li class="pl4"><a href="map_okregi.php?woj=lubuskie">Lubuskie</a></li>
  <li class="pl5"><a href="map_okregi.php?woj=łódzkie">Łódzkie</a></li>
  <li class="pl6"><a href="map_okregi.php?woj=małopolskie">Małopolskie</a></li>
  <li class="pl7"><a href="map_okregi.php?woj=mazowieckie">Mazowieckie</a></li>
  <li class="pl8"><a href="map_okregi.php?woj=opolskie">Opolskie</a></li>
  <li class="pl9"><a href="map_okregi.php?woj=podkarpackie">Podkarpackie</a></li>
  <li class="pl10"><a href="map_okregi.php?woj=podlaskie">Podlaskie</a></li>
  <li class="pl11"><a href="map_okregi.php?woj=pomorskie">Pomorskie</a></li>
  <li class="pl12"><a href="map_okregi.php?woj=śląskie">Śląskie</a></li>
  <li class="pl13"><a href="map_okregi.php?woj=świętokrzyskie">Świętokrzyskie</a></li>
  <li class="pl14"><a href="map_okregi.php?woj=warmińsko-mazurskie">Warmińsko-mazurskie</a></li>
  <li class="pl15"><a href="map_okregi.php?woj=wielkopolskie">Wielkopolskie</a></li>
  <li class="pl16"><a href="map_okregi.php?woj=zachodniopomorskie">Zachodniopomorskie</a></li>
 </ul>
</div>
<?php
}
?>
<!-- Koniec mapy -->
<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSSMap SCRIPT -->
<script type="text/javascript" src="https://cssmapsplugin.com/5/jquery.cssmap.min.js"></script>
<!-- Skrypt mapy -->
<script type="text/javascript">
$(document).ready(function(){
$("#map-poland").CSSMap({
  "size": 960,
  "cities": false,
  "tooltips": false,
  "responsive": "auto",
  "mobileSupport": true

});
});
</script>
<!-- Koniec skryptu mapy -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>