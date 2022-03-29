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
	if(document.getElementById("tel").value == document.getElementById("tel2").value && document.getElementById("tel").value.length==13)
	{
	document.getElementById("sub").disabled = false;
	}
	else{
	document.getElementById("sub").disabled = true;	
	}
}
</script>
<form action="change_tel_db.php" method="post">
Nowy nr. telefonu
<input type="tel" name='tel' id="tel" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" oninput="validate()" value="+48 ">
Potwierdź nowy nr. telefonu
<input type="tel" name='tel2' id="tel2" placeholder="+48 123456789" maxlength="13" pattern="[+][0-9]{2}[' ']{1}[0-9]{9}" oninput="validate()" value="+48 ">
<input type="submit" id="sub" disabled value="Zatwierdź">
</form>
</body>
</html>
