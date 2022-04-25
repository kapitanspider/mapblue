<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
$sql = "INSERT INTO `aktywnosci` (`ID_Organizatora`, `wojewodztwo`, `okreg`, `powiat`, `gmina`, `nazwa`,`rodzaj`, `data`, `godzina`, `uczestnicy`, `potwierdzenie`, `notatka`, `ID_Parent`) VALUES ('".$_SESSION["USER"]."', '".$_POST["wojewodztwo"]."', '".$_POST["okreg"]."', '".$_POST["powiat"]."', '".$_POST["gmina"]."', '".$_POST["nazwa"]."','".$_POST["rodzaj"]."', '".$_POST["data"]."', '".$_POST["godzina"]."', '".$_POST["uczestnicy"]."', '".$_POST["potwierdzenie"]."', '".$_POST["notatka"]."', '".$_POST["ID_Parent"]."')";
	$result = $conn->query($sql);
?>
<script>
alert("Dodano aktywność");
window.location.replace("main.php");
</script>
</body>
</html>
