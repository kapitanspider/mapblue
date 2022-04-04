<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  margin:10px;
  font-size: 30px;
  text-align: center;
}
a{
  color: inherit;
  text-decoration: inherit;
}
</style>

</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
//print_r($_SESSION["USER"]);
?>
<form action="logout.php" method="post">
<input type="submit" value="wyloguj">
</form>
<div class="grid-container">
  <a href="profil.php"><div class="grid-item">Profil</div></a>
  <a href="map.php"><div class="grid-item">Dodaj Aktywność</div></a>
  <a href="kalendarz_user.php"><div class="grid-item">Kalendarz aktywności</div></a>
  <a href="ustawienia.php"><div class="grid-item">Ustawienia</div></a>
  <a href="pomoc.php"><div class="grid-item">Pomoc</div></a>
</div>
<?php
if($_SESSION["ADMIN"]==1)
{
?>
<h1>Panel administratora</h1>
<div class="grid-container">
  <a href="admin_users.php"><div class="grid-item">Urzytkownicy</div></a>
  <a href="admin_aktywnosci.php"><div class="grid-item">Wszystkie aktywności</div></a>
  <a href="admin_statystyki.php"><div class="grid-item">Statystyki aktywności</div></a>
  <a href="admin_statystyki_kategorie.php"><div class="grid-item">Statystyki kategori</div></a>
</div>
<?php
}
?>

</div>
</body>
</html>