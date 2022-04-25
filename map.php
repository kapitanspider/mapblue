<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
<link rel="stylesheet" type="text/css" href="cssmap-poland/cssmap-poland.css" media="screen" />
<style>
h1 {
    text-align:center;
}
</style>
</head>
<body>
<?php
include('facecheck.php');
?>
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
<a href="javascript:history.go(-1)">Wróć</a>
<!-- Koniec skryptu mapy -->
</body>
</html>