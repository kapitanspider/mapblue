<!DOCTYPE HTML>
<html>
<head>
<title>Map Blue - Użytkownicy</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Strona główna</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
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
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php
include('facecheck.php');
include('dbconfig.php');

if(isset($_POST["update"]))
{
    $sql = "SELECT * From Users Where Login='".$_POST["login"]."'and not ID='".$_POST["id"]."' ";
    $result = $conn->query($sql);
    if($result->num_rows == 0)
    {
    $sql = "UPDATE users SET LOGIN = '".$_POST["login"]."', IMIE ='".$_POST["imie"]."', NAZWISKO ='".$_POST["nazwisko"]."', EMAIL ='".$_POST["email"]."', TELEFON ='".$_POST["tel"]."', NR_OKREGU ='".$_POST["NR_OKREGU"]."', FUNKCJA ='".$_POST["FUNKCJA"]."', SPECJALIZACJA ='".$_POST["SPECJALIZACJA"]."',ADMIN='".$_POST["admin"]."'     WHERE ID = '".$_POST["id"]."'";
    $conn->query($sql);
    }
    else{
    echo "Login: ".$_POST["login"]." jest zajęty";
    }
}

$sql = "SELECT * From users Where ID = '".$_POST["id"]."'";
$result = $conn->query($sql);
$db_data;
while($row = $result->fetch_assoc()){
    $db_data=$row;
}
?>
<img src="<?php echo $db_data['Profilowe'];?>" width="200px" height="200px">
<form action="admin_users_edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
<input type="file" class="btn btn-primary m-2" name="profilowe" required>
<input type="submit" class="btn btn-primary m-2" name="profilowe_zmien" value="Zmień zdjęcie profilowe">
</form>
<form action="admin_users_edit.php" method="post">
<p>Czy urztkownik ma być administratorem?</p>
<select name="admin" >
<?php
    if($db_data["ADMIN"]=="1")
    {
    echo '<option value="0">Nie</option>';
    echo '<option value="1" selected>Tak</option>';
    }
    else
    {
    echo '<option value="0" selected>Nie</option>';
    echo '<option value="1">Tak</option>';
    }
?>
</select>
<input type="hidden" name="update" value="update">
<input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
<p>Login</p>
<input type="text" name="login" class="w-100" required value="<?php echo $db_data['LOGIN'];?>" >
<p>Imie</p>
<input type="text" name="imie" class="w-100" required value="<?php echo $db_data['IMIE'];?>">
<p>Nazwisko</p>
<input type="text" name="nazwisko" class="w-100" required value="<?php echo $db_data['NAZWISKO'];?>">
<p>Email</p>
<input type="email" name="email" class="w-100" required value="<?php echo $db_data['EMAIL'];?>">
<p>Nr Telefonu</p>
<input type="tel" name='tel' id="tel" class="w-100" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" required value="<?php echo $db_data['TELEFON'];?>">
<p>Nr_okręgu</p>
<input type="text" name="NR_OKREGU" class="w-100" required value="<?php echo $db_data['NR_OKREGU'];?>">
<p>Funkcja</p>
<input type="text" name="FUNKCJA" class="w-100" required value="<?php echo $db_data['FUNKCJA'];?>">
<p>Specjalizacjia</p>
<input type="text" name="SPECJALIZACJA" class="w-100" required value="<?php echo $db_data['SPECJALIZACJA'];?>">
<br>
<br>
<input type="submit" class="btn btn-primary m-2" value="Zakualizuj dane" required>
</form>
<?php
if(isset($_POST["profilowe_zmien"]))
{
$target_dir = "profiles/";
$ext = pathinfo($_FILES["profilowe"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir.$db_data['LOGIN'].".".$ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  move_uploaded_file($_FILES["profilowe"]["tmp_name"], $target_file);
  $sql="UPDATE `users` SET `Profilowe` = '".$target_file."' WHERE `users`.`ID` = ".$_POST['id'].";";
  $conn->query($sql);
}
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>