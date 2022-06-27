<?php
include('input_check.php');
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Kalendarz</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<link rel="stylesheet" href="colors.css">
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
        <a class="nav-link" href="main.php">Strona główna</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users.php">Użytkownicy</a>
    </li>
	  <li class="nav-item" >
        <a class="nav-link " href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="kalendarz_user.php">Kalendarz</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ustawienia.php">Ustawienia</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="pomoc.php">Pomoc</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
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
<?php

if(isset($_POST["update"]))
{
  if(mainInputCheck()){
    if($_POST["update"]=="update")
    {
    $sql = "UPDATE `aktywnosci` SET `nazwa` = '".$_POST["nazwa"]."',`rodzaj` = '".$_POST["rodzaj"]."',`data` = '".$_POST["data"]."',`godzina` = '".$_POST["godzina"]."',`uczestnicy` = '".$_POST["uczestnicy"]."',`potwierdzenie` = '".$_POST["potwierdzenie"]."',`notatka` = '".$_POST["notatka"]."' WHERE ID='".$_POST["ID"]."'";
    $conn->query($sql);
    echo '<script>location.replace("kalendarz_user.php")</script>';
    //header("Location: kalendarz_user.php");
    }
    if($_POST["update"]=="delete")
    {
        $sql = "DELETE FROM `aktywnosci` WHERE ID='".$_POST["ID"]."'";
        $conn->query($sql);
        echo '<script>location.replace("kalendarz_user.php")</script>';
        //header("Location: kalendarz_user.php");
    }
}
else{
	header("Location: forcelogout.php");
}
}


$db_data = array();
$sql = "SELECT * From aktywnosci Where ID='".$_POST["ID"]."'";
$result = $conn->query($sql);
?>
<div class="container-fluid p-3 mt-1" style="max-width:700px;">
<?php
$row = $result->fetch_assoc();
//var_dump($row);
echo '<form action="kalendarz_user_szczegoly_edit.php" method="post">';
echo '<input type="hidden" name="ID" value="'.$_POST["ID"].'">';
echo "<div class='card m-1 p-2'>";
echo "Lokalizacja:<br>Województwo: ".$row["wojewodztwo"]."<br>Okreg: ".$row["okreg"]."<br>Powiat: ".$row["powiat"]."<br>Gmina: ".$row["gmina"];
echo "</div>";
echo "<div class='card m-1 p-2'>";
echo "Nazwa Wydarzenia:<br>";
echo '<input type="text" name="nazwa" value="'.$row["nazwa"].'">';
echo "<br>";
echo "Typ Wydarzenia: ";
echo "<br>";
if($row["rodzaj"]=="ACRT")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT" selected>Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
 else if($row["rodzaj"]=="WIP")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP" selected>Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else if($row["rodzaj"]=="SW")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW" selected>Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else if($row["rodzaj"]=="NGO")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO" selected>Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else if($row["rodzaj"]=="JST")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST" selected>Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else if($row["rodzaj"]=="RKP")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP" selected>Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else if($row["rodzaj"]=="OU")
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU" selected>Oficjalna uroczystość</option>
<option value="INNE">Inne</option>
</select>';
}
else
{
echo '
<select  id="rodzaj" name="rodzaj" required>
<option value="ACRT">Aktywność centralna realizowana w terenie</option> 
<option value="WIP">Własna inicjatywa posła</option> 
<option value="SW">Spotkanie z wborcami</option>
<option value="NGO">Aktywność z NGO</option>
<option value="JST">Aktywność z JST</option>
<option value="RKP">Regionalna konferencja prasowa</option>
<option value="OU">Oficjalna uroczystość</option>
<option value="INNE" selected>Inne</option>
</select>';
}
echo "<br>";
echo "Data wydarzenia: ";
echo "<br>";
echo '<input type="date" name="data" value="'.$row["data"].'">';
echo "<br>";
echo "Godzina: ";
echo "<br>";
echo '<input type="time" name="godzina" value="'.$row["godzina"].'">';
echo "<br><br>";
echo "Ilość uczestników: ";
echo "<br>";
echo '<input type="number" name="uczestnicy" value="'.$row["uczestnicy"].'">';
echo "<br>";
echo "Link do wydarzenia: ";
echo "<br>";
echo '<input type="text" name="potwierdzenie" value="'.$row["potwierdzenie"].'">';
echo "<br>";
echo "Notatka: ";
echo "<br>";
echo '<textarea id="notatka" name="notatka" rows="4" cols="50">'.$row["notatka"].'</textarea>';
echo "<br>";
echo '<input type="hidden" name="update" value="update">';
echo '<input class="btn blue m-2" type="submit"  value="Aktualizuj">';
echo '<input class="btn blue m-2" type="submit" value="Usuń Aktywność" form="form2">';
echo "</div>";
echo "</form>";
?>
<br>
<br>
<form action="kalendarz_user_szczegoly_edit.php" method="post" id="form2">
    <input type="hidden" name="ID" value="<?php echo $_POST["ID"];?>">
    <input type="hidden" name="update" value="delete">
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
