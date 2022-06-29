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
      <li class="nav-item text-center">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
      <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </svg>
        <a class="nav-link" href="main.php">Strona główna</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
				<path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
			</svg>
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
    <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
			<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
 			<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  			<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
			</svg>
        <a class="nav-link" href="users.php">Użytkownicy</a>
    </li>
	  <li class="nav-item text-center" >
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
				<path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
				<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
        <a class="nav-link" href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
				<path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
				<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
        <a class="nav-link active" href="kalendarz_user.php">Kalendarz</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
				<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
				<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
			</svg>
        <a class="nav-link" href="ustawienia.php">Ustawienia</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
				<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
				<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
				<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
			</svg>
        <a class="nav-link" href="pomoc.php">Pomoc</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
			<path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
			</svg>
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item text-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16" height="30px">
			<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
			</svg>
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
    <ul class="navbar-nav">
	  <li class="nav-item text-center">
    
        <a class="nav-link " href="logout.php">Wyloguj</a>
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
	echo '
  <script>
  window.location.replace("forcelogout.php");
  </script>';
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
