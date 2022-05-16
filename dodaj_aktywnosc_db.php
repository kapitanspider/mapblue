<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>
</head>
<body>
<?php
if(isset($_POST["ID_Parent"]))
{
$sql = "INSERT INTO `aktywnosci` (`ID_Organizatora`, `wojewodztwo`, `okreg`, `powiat`, `gmina`, `nazwa`,`rodzaj`, `data`, `godzina`, `uczestnicy`, `potwierdzenie`, `notatka`, `ID_Parent`) VALUES ('".$_SESSION["USER"]."', '".$_POST["wojewodztwo"]."', '".$_POST["okreg"]."', '".$_POST["powiat"]."', '".$_POST["gmina"]."', '".$_POST["nazwa"]."','".$_POST["rodzaj"]."', '".$_POST["data"]."', '".$_POST["godzina"]."', '".$_POST["uczestnicy"]."', '".$_POST["potwierdzenie"]."', '".$_POST["notatka"]."', '".$_POST["ID_Parent"]."')";
}
else
{
$sql = "INSERT INTO `aktywnosci` (`ID_Organizatora`, `wojewodztwo`, `okreg`, `powiat`, `gmina`, `nazwa`,`rodzaj`, `data`, `godzina`, `uczestnicy`, `potwierdzenie`, `notatka`, `ID_Parent`) VALUES ('".$_SESSION["USER"]."', '".$_POST["wojewodztwo"]."', '".$_POST["okreg"]."', '".$_POST["powiat"]."', '".$_POST["gmina"]."', '".$_POST["nazwa"]."','".$_POST["rodzaj"]."', '".$_POST["data"]."', '".$_POST["godzina"]."', '".$_POST["uczestnicy"]."', '".$_POST["potwierdzenie"]."', '".$_POST["notatka"]."', '0')";
	
}
	$result = $conn->query($sql);
?>
<script>
alert("Dodano aktywność");
window.location.replace("main.php");
</script>
</body>
</html>
