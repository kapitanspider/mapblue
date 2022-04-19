<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

</head>
<body>
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
<input type="file" name="profilowe" required>
<input type="submit" name="profilowe_zmien" value="Zmień zdjęcie profilowe">
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
<input type="text" name="login" required value="<?php echo $db_data['LOGIN'];?>">
<p>Imie</p>
<input type="text" name="imie" required value="<?php echo $db_data['IMIE'];?>">
<p>Nazwisko</p>
<input type="text" name="nazwisko" required value="<?php echo $db_data['NAZWISKO'];?>">
<p>Email</p>
<input type="email" name="email" required value="<?php echo $db_data['EMAIL'];?>">
<p>Nr Telefonu</p>
<input type="tel" name='tel' id="tel" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" required value="<?php echo $db_data['TELEFON'];?>">
<p>Nr_okręgu</p>
<input type="text" name="NR_OKREGU" required value="<?php echo $db_data['NR_OKREGU'];?>">
<p>Funkcja</p>
<input type="text" name="FUNKCJA" required value="<?php echo $db_data['FUNKCJA'];?>">
<p>Specjalizacjia</p>
<input type="text" name="SPECJALIZACJA" required value="<?php echo $db_data['SPECJALIZACJA'];?>">
<br>
<input type="submit" value="Zakualizuj dane" required>
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
<a href="admin_users.php">Wróć</a>
</body>
</html>