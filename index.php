<!DOCTYPE HTML>
<html lang="PL">
<head>
<title>Map Blue</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body>
<br>

<div class="d-flex justify-content-center m-1">
	<form action="login.php" method="post" class="card p-2 w-100">
	<h2 class="text-center m-3 text-primary">MapBlue</h2> 
	<img src="images/Poland.svg" class="rounded mx-auto d-block img-thumbnail" style="max-width: 250px;" alt="...">
	
<?php
include('dbconfig.php');
if(isset($_GET['login']))
{
	if($_GET['login']=="error")
	{
	echo '<script>alert("Błędny login lub hasło");</script>';
	}
	if($_GET['login']=="notactive")
	{
	echo '<script>alert("Konto zostało wyłączone przez administratora");</script>';
	}
}
?>
	
	<div class="container text-center ">
	<p style="font-size:xx-large;">Login:</p> 
	<input class="form-control text-center w-75 mx-auto d-block" type="text" name="Login" style="font-size:x-large;"><br>
	<p style="font-size:xx-large;">Hasło:</p> 
	<input class="form-control text-center w-75 mx-auto d-block" type="password" name="Password" style="font-size:x-large;"><br>
	<input type="submit" class="btn btn-primary">
	</div>
	</form>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy;2022 Company Name</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>