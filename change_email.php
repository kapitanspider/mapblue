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
	if(document.getElementById("email").value == document.getElementById("email2").value && document.getElementById("email").value!=="")
	{
	document.getElementById("sub").disabled = false;
	}
	else{
	document.getElementById("sub").disabled = true;	
	}
}
</script>
<form action="change_email_db.php" method="post">
Nowy email
<input type="email" name='email' id="email" oninput="validate()">
Potwierdź nowy email
<input type="email" name='email2' id="email2" oninput="validate()">
<input type="submit" id="sub" disabled value="Zatwierdź">
</form>
</body>
</html>
