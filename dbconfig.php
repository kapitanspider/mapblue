<?php
$uzytkownik='root';
$haslo='';
$baza='mapblue';
$host='localhost';

$conn = new mysqli($host, $uzytkownik, $haslo, $baza);
$conn -> query ('SET NAMES utf8');
?>