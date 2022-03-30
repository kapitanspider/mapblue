<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST['login']))
{
$sql = "SELECT * From Users Where Login='".$_POST["login"]."'";
$result = $conn->query($sql);
if($result->num_rows == 0)
{
    $sql = "INSERT INTO `users` (`ADMIN`, `LOGIN`, `PASSWORD`, `IMIE`, `NAZWISKO`, `EMAIL`, `NR_OKREGU`, `FUNKCJA`, `SPECJALIZACJA`, `TELEFON`, `IS_ACTIVE`) VALUES ('".$_POST["admin"]."', '".$_POST["login"]."', '".hash('sha256', $_POST['password'])."', '".$_POST["imie"]."', '".$_POST["nazwisko"]."', '".$_POST["email"]."', '".$_POST["NR_OKREGU"]."', '".$_POST["FUNKCJA"]."', '".$_POST["SPECJALIZACJA"]."', '".$_POST["tel"]."', '1');";
    $conn->query($sql);
    echo "Dodano urzytkownika: ".$_POST["login"];
}
else{
    echo "Urzytkownik o loginie ".$_POST["login"]." już istnieje";
}
}



?>
<form action="admin_users_add_new.php" method="post">
<p>Czy urztkownik ma być administratorem?</p>
<select name="admin" >
<option value="0">Nie</option>
<option value="1">Tak</option>
</select>
<p>Login</p>
<input type="text" name="login" required>
<p>hasło</p>
<input type="text" name="password" required>
<p>Imie</p>
<input type="text" name="imie" required>
<p>Nazwisko</p>
<input type="text" name="nazwisko" required>
<p>Email</p>
<input type="email" name="email" required>
<p>Nr Telefonu</p>
<input type="tel" name='tel' id="tel" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" required>
<p>Nr_okręgu</p>
<input type="text" name="NR_OKREGU" required>
<p>Funkcja</p>
<input type="text" name="FUNKCJA" required>
<p>Specjalizacjia</p>
<input type="text" name="SPECJALIZACJA" required>
<br>
<input type="submit" value="Dodaj urzytkownika" required>
</form>
<a href="admin_users.php">Wróć</a>
</body>
</html>