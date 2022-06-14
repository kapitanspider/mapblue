<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Dodawanie aktywności</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <a class="nav-link active" href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="kalendarz_user.php">Kalendarz</a>
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
?>
<div class="container-fluid p-3 card mt-2 " style="max-width:700px;">
<form action="dodaj_aktywnosc_db.php" method="post">
<p class="form-label m-1">Lokalizacja:</p>
<p class="form-label m-1">Województwo:</p>
<input class="m-1 w-100" type="text" disabled value="<?php echo $_POST['wojewodztwo']; ?>">
<input type="hidden" id="wojewodztwo" name="wojewodztwo"  value="<?php echo $_POST['wojewodztwo']; ?>">
<p class="form-label m-1">Okręg:</p>
<input class="m-1 w-100" type="text" disabled value="<?php echo $_POST['okreg']; ?>">
<input type="hidden" id="okreg" name="okreg"  value="<?php echo $_POST['okreg']; ?>">
<p class="form-label m-1">Powiat:</p>
<input class="m-1 w-100" type="text" disabled value="<?php echo $_POST['powiat']; ?>">
<input type="hidden" id="powiat" name="powiat"  value="<?php echo $_POST['powiat']; ?>">
<p class="form-label m-1">Gmina:</p>
<input class="m-1 w-100" type="text" disabled value="<?php echo $_POST['gmina']; ?>">
<input type="hidden" id="gmina" name="gmina"  value="<?php echo $_POST['gmina']; ?>">
</br>
<a href="map.php" class="btn blue m-1 w-100">Zmień lokację</a>
<p class="form-label m-1">Ogólnopolskie wydarzenie macierzyste:</p>
<select  class="m-1 w-100" id="ID_Parent" name="ID_Parent" required>
<option value="0" selected>Brak</option>
</select>
<p class="form-label m-1">Nazwa aktywności/wydarzenia:</p>
<input class="m-1 w-100" type="text" id="nazwa" name="nazwa" required>
<p class="form-label m-1">Rodzaj</p>
<select  class="m-1 w-100" id="rodzaj" name="rodzaj" required>
<option value="ACRT">ACRT - Aktywność centralna realizowana w terenie</option> 
<option value="WIP">WIP - Własna inicjatywa posła</option> 
<option value="SW">SW - Spotkanie z wborcami</option>
<option value="NGO">NGO - Aktywność z NGO</option>
<option value="JST">JST - Aktywność z JST</option>
<option value="RKP">RPK - Regionalna konferencja prasowa</option>
<option value="OU">OU - Oficjalna uroczystość</option>
<option value="INNE">Inne</option>

</select>
<p class="form-label m-1">Data:</p>
<input class="m-1 w-100" type="date" id="data" name="data" required>
<p class="form-label m-1">Godzina:</p>
<input class="m-1 w-100" type="time" id="godzina" name="godzina" required>
<p class="form-label m-1">Ilość uczestników</p>
<input class="m-1 w-100" type="number" id="uczestnicy" name="uczestnicy" required>
<p class="form-label m-1">Link FB/WWW</p>
<input class="m-1 w-100" type="text" id="potwierdzenie" name="potwierdzenie" required>
<p class="form-label m-1">Notatka:</p>
<textarea class="m-1 w-100" id="notatka" name="notatka" rows="4" cols="50"></textarea>
<input class="btn blue m-1 w-100" type="submit" value="Dodaj">
</form>
</div>
<script>
<?php
$sql = "SELECT nazwa,ID FROM `wydarzenia_ogolnopolskie` order by ID DESC limit 3";
//$sql = "SELECT * From users";
$result = $conn->query($sql);
echo "var nazwy=[];";
echo "var id=[];";
while($row = $result->fetch_assoc()){
  echo '
  nazwy.push("'.$row["nazwa"].'");
  id.push("'.$row["ID"].'");
  ';
}
?>

let elem=document.getElementById("ID_Parent");
console.log(elem);
var lista= elem.innerHTML;
for (var i=0;i<nazwy.length;i++)
{
  lista+='<option value="'+id[i]+'">'+nazwy[i]+'</option>';
}
elem.innerHTML=lista;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
