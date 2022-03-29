<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');
?>
<script>
function validate(){
	if(document.getElementById("haslo").value == document.getElementById("haslo2").value && document.getElementById("haslo").value!=="")
	{
	document.getElementById("sub").disabled = false;
	}
	else{
	document.getElementById("sub").disabled = true;	
	}
}
</script>
<form action="change_pass_db.php" method="post">
Nowe hasło
<input type="password" name='haslo' id="haslo" oninput="validate()">
Potwierdź hasło
<input type="password" name='haslo2' id="haslo2" oninput="validate()">
<input type="submit" id="sub" disabled value="Zatwierdź">
</form>
</body>
</html>
