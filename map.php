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