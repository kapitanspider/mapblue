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
  <div class="grid-item">Profil</div>
  <a href="map.php"><div class="grid-item">Dodaj Aktywność</div></a>
</div>
</body>
</html>