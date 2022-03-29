<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<form action="login.php" method="post">
Login: <input type="text" name="Login"><br>
Hasło: <input type="password" name="Password"><br>
<input type="submit">
</form>
<?php
include('dbconfig.php');
if(isset($_GET['login']))
{
	if($_GET['login']=="error")
	{
	echo "błędny login lub hasło";
	}
	if($_GET['login']=="notactive")
	{
	echo "konto zostało zablokowane przez administratora";
	}
}
?>
</body>
</html>