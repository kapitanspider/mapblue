<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>

</head>
<body>
<?php
include('facecheck.php');
?>
<form action="dodaj_aktywnosc.php" method="post">
<label>Wybierz powiat</label>
<input type="hidden" name="wojewodztwo" id="wojewodztwo" value=<?php echo '"'.$_GET['woj'].'"'; ?>>
<select name="powiat"  id="powiat" onchange="get_gminy()" required>
</select>
<label>Wybierz gminę</label>
<select name="gmina" id="gmina" required>
</select>
<input type="submit">
</form>
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
</body>
</html>