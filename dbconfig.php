<?php
$uzytkownik='root';
$haslo='';
$baza='mapblue';
$host='localhost';

$conn = new mysqli($host, $uzytkownik, $haslo, $baza); 
$conn->set_charset('utf8mb4');
?>