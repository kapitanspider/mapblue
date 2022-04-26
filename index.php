<!DOCTYPE HTML>
<html lang="PL">
<head>
<title>Map Blue</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>