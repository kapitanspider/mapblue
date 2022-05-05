<!DOCTYPE HTML>
<html>
<head>
<title>MapBlue - Dodawanie aktywności</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="main.php"><span class="h3">MapBlue</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Strona główna</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
	  <li class="nav-item active" >
        <a class="nav-link" href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="kalendarz_user.php">Kalendarz</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ustawienia.php">Ustawienia</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="pomoc.php">Pomoc</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="wydarzenia_krajowe.php">Wydarzenia Ogólnopolskie</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="user_udostepnione.php">Udostępnione</a>
      </li>
    </ul>
  </div>
</nav>
<?php
include('facecheck.php');
?>
<div class="container-fluid p-3 card mt-1 " style="max-width:500px;">
<form action="dodaj_aktywnosc.php" method="post">
<label>Wybierz powiat</label>
<br>
<input type="hidden" name="wojewodztwo" id="wojewodztwo" value=<?php echo '"'.$_GET['woj'].'"'; ?>>
<input type="hidden" name="okreg" id="okreg" value=<?php echo '"'.$_GET['okr'].'"'; ?>>
<?php
if(isset($_GET['ID_Parent']))
{
?>
<input type="hidden" name="ID_Parent" id="ID_Parent" value=<?php echo '"'.$_GET['ID_Parent'].'"'; ?>>
<?php
}
?>
<select class="form-select" name="powiat" style="width:100%;" id="powiat" onchange="get_gminy()" required>
</select>
<br>
<label>Wybierz gminę</label>
<br>
<select class="form-select" name="gmina" style="width:100%;" id="gmina" required>
</select>
<br>
<input class="btn btn-primary m-1" type="submit">
</form>
</div>
<script>
$woj = <?php echo '"'.$_GET['woj'].'"'; ?>;
$okr = <?php echo '"'.$_GET['okr'].'"'; ?>;
//var mydata = JSON.parse($wojewodztwa);
const wojewodztwo= fetch('wojewodztwa.json')
  .then(res => res.json()) // the .json() method parses the JSON response into a JS object literal
  .then(wojewodztwa => {return wojewodztwa});

function currnet_woj(x){
	//console.log(x.wojewodztwo);
	//console.log($woj);
	return x.wojewodztwo === $woj;
} 
function currnet_pow(x){
	return x.powiat === document.getElementById("powiat").value;
} 
async function get_powiaty(woj){
	//console.log(woj);
	const w = await wojewodztwo;
	var x=w.wojewodztwa.find(currnet_woj);
	//console.log(x);
	var lista="";
	for(var i=0; i<x.powiaty.length;i++)
	{
		if(x.powiaty[i].okreg==$okr)
		lista+="<option value='"+x.powiaty[i].powiat+"'>"+x.powiaty[i].powiat+"</option>";
	}
	document.getElementById("powiat").innerHTML=lista;
}

async function get_gminy(){
	const w = await wojewodztwo;
	var x=w.wojewodztwa.find(currnet_woj);
	var p=x.powiaty.find(currnet_pow);
	var lista="";
	for(var i=0; i<p.gminy.length;i++)
	{
		lista+="<option value='"+p.gminy[i]+"'>"+p.gminy[i]+"</option>";
	}
	document.getElementById("gmina").innerHTML=lista;
}
get_powiaty($woj);
get_gminy();

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>