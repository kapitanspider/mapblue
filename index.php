<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
</head>
<body>
<form action="login.php" method="post">
Login: <input type="text" name="Login"><br>
Hasło: <input type="text" name="Password"><br>
<input type="submit">
</form>
<?php
include('dbconfig.php');
if(isset($_GET['login']))
{
	echo "błędny login lub hasło";
}
?>
</body>
</html>