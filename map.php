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
  <li class="pl1"><a href="location.php?woj=dolnośląskie">Dolnośląskie</a></li>
  <li class="pl2"><a href="location.php?woj=kujawsko-pomorskie">Kujawsko-pomorskie</a></li>
  <li class="pl3"><a href="location.php?woj=lubelskie">Lubelskie</a></li>
  <li class="pl4"><a href="location.php?woj=lubuskie">Lubuskie</a></li>
  <li class="pl5"><a href="location.php?woj=lódzkie">Łódzkie</a></li>
  <li class="pl6"><a href="location.php?woj=małopolskie">Małopolskie</a></li>
  <li class="pl7"><a href="location.php?woj=mazowieckie">Mazowieckie</a></li>
  <li class="pl8"><a href="location.php?woj=opolskie">Opolskie</a></li>
  <li class="pl9"><a href="location.php?woj=podkarpackie">Podkarpackie</a></li>
  <li class="pl10"><a href="location.php?woj=podlaskie">Podlaskie</a></li>
  <li class="pl11"><a href="location.php?woj=pomorskie">Pomorskie</a></li>
  <li class="pl12"><a href="location.php?woj=śląskie">Śląskie</a></li>
  <li class="pl13"><a href="location.php?woj=świętokrzyskie">Świętokrzyskie</a></li>
  <li class="pl14"><a href="location.php?woj=warmińsko-mazurskie">Warmińsko-mazurskie</a></li>
  <li class="pl15"><a href="location.php?woj=wielkopolskie">Wielkopolskie</a></li>
  <li class="pl16"><a href="location.php?woj=zachodniopomorskie">Zachodniopomorskie</a></li>
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
  "responsive": {}
});
});
</script>
<!-- Koniec skryptu mapy -->
</body>
</html>