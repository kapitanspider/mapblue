<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="colors.css">
</head>
<body>
<?php

//print_r($_SESSION["USER"]);
?>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <a class="navbar-brand" href="main.php">MapBlue</a>
  <a class="float-sm-start"><?php echo $_SESSION["IMIE"];?>&nbsp;<?php echo $_SESSION["NAZWISKO"];?>&nbsp;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	</ul>
	<ul class="navbar-nav">
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container w-100">
<div class="row justify-content-center">
	<a href="profil.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
				<path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Profil</p>
			</div>
		</div>
	</a>
	<a href="users.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
 			<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  			<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Użytkownicy</p>
			</div>
		</div>
	</a>
	<a href="map.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
				<path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
				<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Dodaj Aktywność</p>
			</div>
		</div>
	</a>

	<a href="kalendarz_user.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
				<path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
				<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Kalendarz aktywności</p>
			</div>
		</div>
	</a>
	<a href="wydarzenia_krajowe.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;;">
<?php
$sql="SELECT * from powiadomienia where id_osoby='".$_SESSION["USER"]."'";
$result = $conn->query($sql);
if($result->num_rows==0)
{
?>
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
			</svg>
			<div class="card-body">
			<i class="bi bi-file-person"></i>
			<p class="card-text text-center blue_text" style="font-size:x-large;">Wydarzenia ogólnopolskie</p>
			</div>
<?php
}
else
{
?>	
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
			<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
			</svg>
			<div class="card-body">
			<i class="bi bi-file-person"></i>
			<p class="card-text text-center blue_text" style="font-size:x-large;">Wydarzenia ogólnopolskie !!!</p>
			</div>
<?php
}
?>
		</div>
	</a>
	<a href="user_udostepnione.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Udostępnione dla mnie</p>
			</div>
		</div>
	</a>
	<a href="statystyki.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"/>			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Statystyki</p>
			</div>
		</div>
	</a>
	<a href="ustawienia.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
				<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
				<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Ustawienia</p>
			</div>
		</div>
	</a>
	<a href="pomoc.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
				<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
				<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
				<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Pomoc</p>
			</div>
		</div>
	</a>
</div>
<?php
if($_SESSION["ADMIN"]==1)
{
?>
<br>
<p class="text-center h2 gray_text">Panel Moderatora</p>
<br>
<div class="container w-100">
<div class="row justify-content-center">
	<a href="admin_aktywnosci.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Wszystkie aktywności</p>
			</div>
		</div>
	</a>
	<a href="admin_statystyki.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Statystyki aktywności</p>
			</div>
		</div>
	</a>
	<a href="admin_statystyki_kategorie.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Statystyki kategori</p>
			</div>
		</div>
	</a>
	<a href="admin_ostatnie_aktywnosci.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Ostatnio dodane aktywnosci</p>
			</div>
		</div>
	</a>
	<a href="admin_wydarzenie_krajowe.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Wydarzenia ogólnopolskie</p>
			</div>
		</div>
	</a>
</div>
<?php
}
else
{
if($_SESSION["ADMIN"]==2)
{
?>
<br>
<p class="text-center h2 gray_text">Panel Administratora</p>
<br>
<div class="container w-100">
<div class="row justify-content-center">
	<a href="admin_aktywnosci.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Wszystkie aktywności</p>
			</div>
		</div>
	</a>
	<a href="admin_statystyki.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Statystyki aktywności</p>
			</div>
		</div>
	</a>
	<a href="admin_ostatnie_aktywnosci.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Ostatnio dodane aktywnosci</p>
			</div>
		</div>
	</a>
	<a href="admin_wydarzenie_krajowe.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Wydarzenia ogólnopolskie</p>
			</div>
		</div>
	</a>
	<a href="admin_users.php" style="text-decoration:none;">
		<div class="col card m-1 p-2" style="width: 15rem; height: 15rem;">
			<svg xmlns="http://www.w3.org/2000/svg" fill="#00529c" class="bi bi-file-earmark-person card-img-top" viewBox="0 0 16 16">
			<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
			</svg>
			<div class="card-body">
				<i class="bi bi-file-person"></i>
				<p class="card-text text-center blue_text" style="font-size:x-large;">Użytkownicy</p>
			</div>
		</div>
	</a> 

</div>
<?php
}
}
?>
</div>
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy;2022 PRONEX</p>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>