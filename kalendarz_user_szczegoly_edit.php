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
    if($_POST["update"]=="update")
    {
    $sql = "UPDATE `aktywnosci` SET `nazwa` = '".$_POST["nazwa"]."',`rodzaj` = '".$_POST["rodzaj"]."',`data` = '".$_POST["data"]."',`godzina` = '".$_POST["godzina"]."',`uczestnicy` = '".$_POST["uczestnicy"]."',`potwierdzenie` = '".$_POST["potwierdzenie"]."',`notatka` = '".$_POST["notatka"]."' WHERE ID='".$_POST["ID"]."'";
    $conn->query($sql);
    }
    if($_POST["update"]=="delete")
    {
        $sql = "DELETE FROM `aktywnosci` WHERE ID='".$_POST["ID"]."'";
        $conn->query($sql);
        header("Location: kalendarz_user.php");
    }
}

$db_data = array();
$sql = "SELECT * From Aktywnosci Where ID='".$_POST["ID"]."'";
$result = $conn->query($sql);
?>
<table border="solid">
<?php
$row = $result->fetch_assoc();
//var_dump($row);
echo '<form action="kalendarz_user_szczegoly_edit.php" method="post">';
echo '<input type="hidden" name="ID" value="'.$_POST["ID"].'">';
echo "Lokalizacja:<br>-->Województwo: ".$row["wojewodztwo"]."<br>--->Powiat: ".$row["powiat"]."<br>---->Gmina: ".$row["gmina"];
echo "<br><br>";
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
echo '<input type="submit"  value="Aktualizuj">';
echo "</form>";
?>
<br>
<br>
<form action="kalendarz_user_szczegoly_edit.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $_POST["ID"];?>">
    <input type="hidden" name="update" value="delete">
    <input type="submit" value="Usuń Aktywność">
</form>
<br>
<br>  
<a href="kalendarz_user.php">Wróć</a>
</table>
</body>
</html>
