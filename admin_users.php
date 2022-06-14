<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Użytkownicy</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="colors.css">
<script>
function tablefilter() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  elem = document.getElementById("table");
  elem2 = document.getElementById("table2");
  lista = elem.getElementsByTagName('tr');
  lista2 = elem2.getElementsByTagName('tr');
  for (i = 1; i < lista.length; i++) {
    imie = lista[i].getElementsByClassName("imie")[0];
    nazwisko = lista[i].getElementsByClassName("nazwisko")[0];
    login = lista[i].getElementsByClassName("login")[0];
    email = lista[i].getElementsByClassName("email")[0];
    telefon = lista[i].getElementsByClassName("telefon")[0];
    txtValue = imie.textContent || imie.innerText;
    txtValue2 = nazwisko.textContent || nazwisko.innerText;
    txtValue3 = login.textContent || login.innerText;
    txtValue4 = email.textContent || email.innerText;
    txtValue5 = telefon.textContent || telefon.innerText;
   
    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) 
    {
      lista[i].style.display = "";
    } else {
      lista[i].style.display = "none";
    }
  }
  for (i = 1; i < lista2.length; i++) {
    imie = lista2[i].getElementsByClassName("imie")[0];
    nazwisko = lista2[i].getElementsByClassName("nazwisko")[0];
    login = lista2[i].getElementsByClassName("login")[0];
    email = lista2[i].getElementsByClassName("email")[0];
    telefon = lista2[i].getElementsByClassName("telefon")[0];
    txtValue = imie.textContent || imie.innerText;
    txtValue2 = nazwisko.textContent || nazwisko.innerText;
    txtValue3 = login.textContent || login.innerText;
    txtValue4 = email.textContent || email.innerText;
    txtValue5 = telefon.textContent || telefon.innerText;
   
    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) 
    {
   
      lista2[i].style.display = "";
    } else {
      lista2[i].style.display = "none";
    }
  }
}
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="main.php">Strona Główna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_aktywnosci.php">Wszystkie aktywności</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_statystyki.php">Statystyki</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_statystyki_kategorie.php">Statystyki kategorii</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_wydarzenie_krajowe.php">Wydarzenia ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="admin_users.php">Użytkownicy</a>
      </li>
    </ul>
    <ul class="navbar-nav">
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php

if(isset($_POST["deactivate"]))
{
	$sql="UPDATE users SET IS_ACTIVE = '0' WHERE ID = '".$_POST["deactivate"]."'";
	$conn->query($sql);
}
if(isset($_POST["activate"]))
{
	$sql="UPDATE `users` SET `IS_ACTIVE` = '1' WHERE `users`.`ID` = ".$_POST["activate"];
	$conn->query($sql);
}

$sql = "SELECT * From users Where ADMIN = 0";
$result = $conn->query($sql);
?>
<h4>Użytkownicy</h4>
<input type="text" class="m-2" id="myInput" onkeyup="tablefilter()" placeholder="Wyszukaj">
<table class="table" id="table">
<tr>
<th>Login</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Nr. Okręgu</th>
<th>Email</th>
<th>Telefon</th>
<th>Zmiana statusu konta</th>
</tr>
<?php
while($row = $result->fetch_assoc())
{
//var_dump($row);
if($row["IS_ACTIVE"]==1)
{
echo "<tr>";
}
else
{
echo "<tr bgcolor=red>";	
}
echo "<td class='login'>".$row["LOGIN"]."</td>";
echo "<td class='imie'>".$row["IMIE"]."</td>";
echo "<td class='nazwisko'>".$row["NAZWISKO"]."</td>";
echo "<td>".$row["NR_OKREGU"]."</td>";
echo "<td class='email'>".$row["EMAIL"]."</td>";
echo "<td class='telefon'>".$row["TELEFON"]."</td>";
if($row["IS_ACTIVE"]==1)
{
?>
<td>
<form action="admin_users.php" method="post">
<input type="hidden" name="deactivate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Dezaktywuj">
</form>
<form action="admin_users_edit.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Edytuj">
</form>
<form action="admin_users_change_pass.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Zmień hasło">
</form>
<form action="admin_users_remove.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="hidden" name="login" value=<?php echo  $row["LOGIN"]; ?>>
<input type="submit" value="Usuń">
</form>
</td>
<?php
}
else
{
?>
<td>
<form action="admin_users.php" method="post">
<input type="hidden" name="activate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Aktywuj">
</form>
<form action="admin_users_edit.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Edytuj">
</form>
<form action="admin_users_change_pass.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Zmień hasło">
</form>
<form action="admin_users_remove.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="hidden" name="login" value=<?php echo  $row["LOGIN"]; ?>>
<input type="submit" value="Usuń">
</form>
</td>
<?php	
}
echo "</tr>";
}
?>
</table>
<?php
$sql = "SELECT * From users Where ADMIN = 1";
$result = $conn->query($sql);
?>
<h4>Moderatorzy</h4>
<table class="table" id="table2">
<tr>
<th>Login</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Nr. Okręgu</th>
<th>Email</th>
<th>Telefon</th>
<th>Zmiana statusu konta</th>
</tr>
<?php
while($row = $result->fetch_assoc())
{
//var_dump($row);
if($row["IS_ACTIVE"]==1)
{
echo "<tr class=''>";
}
else
{
echo "<tr bgcolor=red>";	
}
echo "<td  class='login'>".$row["LOGIN"]."</td>";
echo "<td  class='imie'>".$row["IMIE"]."</td>";
echo "<td  class='nazwisko'>".$row["NAZWISKO"]."</td>";
echo "<td>".$row["NR_OKREGU"]."</td>";
echo "<td class='email'>".$row["EMAIL"]."</td>";
echo "<td class='telefon'>".$row["TELEFON"]."</td>";
if($row["IS_ACTIVE"]==1)
{
?>
<td>
<?php
if($row["ID"]!=$_SESSION["USER"])
{
?>
<form action="admin_users.php" method="post">
<input type="hidden" name="deactivate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Dezaktywuj">
</form>
<?php
}
?>
<form action="admin_users_edit.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Edytuj">
</form>
<form action="admin_users_change_pass.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Zmień hasło">
</form>
<form action="admin_users_remove.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="hidden" name="login" value=<?php echo  $row["LOGIN"]; ?>>
<input type="submit" value="Usuń">
</form>
</td>
<?php
}
else
{
?>
<td>
<?php
if($row["ID"]!=$_SESSION["USER"])
{
?>
<form action="admin_users.php" method="post">
<input type="hidden" name="activate" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Aktywuj">
</form>
<?php
}
?>
<form action="admin_users_edit.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Edytuj">
</form>
<form action="admin_users_change_pass.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="submit" value="Zmień hasło">
</form>
<form action="admin_users_remove.php" method="post">
<input type="hidden" name="id" value=<?php echo  $row["ID"]; ?>>
<input type="hidden" name="login" value=<?php echo  $row["LOGIN"]; ?>>
<input type="submit" value="Usuń">
</form>
</td>
<?php	
}
echo "</tr>";
}
?>
</table>
<br>
<a href="admin_users_add_new.php" class="btn blue">Dodaj urzytkownika</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>