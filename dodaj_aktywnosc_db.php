<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
$sql = "INSERT INTO `aktywnosci` (`ID_Organizatora`, `wojewodztwo`, `powiat`, `gmina`, `nazwa`, `data`, `uczestnicy`, `potwierdzenie`, `notatka`) VALUES ('".$_SESSION["USER"]."', '".$_POST["wojewodztwo"]."', '".$_POST["powiat"]."', '".$_POST["gmina"]."', '".$_POST["nazwa"]."', '".$_POST["data"]."', '".$_POST["uczestnicy"]."', '".$_POST["potwierdzenie"]."', '".$_POST["notatka"]."')";
	$result = $conn->query($sql);
header("Location: main.php");
?>
</body>
</html>
