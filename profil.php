<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
$db_data = array();
$sql = "SELECT * From Users Where ID='".$_SESSION["USER"]."'";
$result = $conn->query($sql);
$user = null;
while($row = $result->fetch_assoc()){
			$user = $row;
		}
//var_dump($user["ADMIN"]);
?>
<p>Profil</p>
<?php
echo '<p>'.$user["IMIE"]." ".$user["NAZWISKO"].'</p>';
echo '<p>Login: '.$user["LOGIN"].'</p>';
echo '<p>Nr. Okręgu: '.$user["NR_OKREGU"].'</p>';
echo '<p>Specjalizacja: '.$user["SPECJALIZACJA"].'</p>';
echo '<p>Adres email: '.$user["EMAIL"].' <a href="change_email.php">Zmień</a></p>';
echo '<p>Nr. telefonu: '.$user["TELEFON"].' <a href="change_tel.php">Zmień</a></p>';
?>
<br>
<br>
<br>
<a href="change_pass.php">Zmień hasło</a>
<br>
<a href="main.php">Ekran główny</a>
</body>
</html>
