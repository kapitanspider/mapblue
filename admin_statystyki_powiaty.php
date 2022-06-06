<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MapBlue - Admin - Statystyki</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<link rel="stylesheet" href="colors.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
	  <li class="nav-item">
        <a class="nav-link" href="kalendarz_user.php">Kalendarz</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ustawienia.php">Ustawienia</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="pomoc.php">Pomoc</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1" style="max-width:1000px;">
<?php

if(isset($_POST["begin"]))
{
$begin=$_POST["begin"];
$end=$_POST["end"];
}
else
{
$begin=date_format(date_create(),"Y-m-d");
$end=date("Y-m-d",mktime(0,0,0,date('m')+1,date('d'),date('y')));
}
?>
<form action="admin_statystyki_powiaty.php" method="post">
<label>Ustaw zakres dat</label>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<label>Wybierz województwo</label>
<select name="woj">
<?php
if(isset($_POST["woj"]))
{
?>
<option value="dolnośląskie" <?=$_POST['woj'] == 'dolnośląskie' ? ' selected="selected"' : '';?>>dolnośląskie</option>
<option value="kujawsko-pomorskie"  <?=$_POST['woj'] == 'kujawsko-pomorskie' ? ' selected="selected"' : '';?>>kujawsko-pomorskie</option>
<option value="lubelskie"  <?=$_POST['woj'] == 'lubelskie' ? ' selected="selected"' : '';?>>lubelskie</option>
<option value="lubuskie"  <?=$_POST['woj'] == 'lubuskie' ? ' selected="selected"' : '';?>>lubuskie</option>
<option value="łódzkie"  <?=$_POST['woj'] == 'łódzkie' ? ' selected="selected"' : '';?>>łódzkie</option>
<option value="małopolskie"  <?=$_POST['woj'] == 'małopolskie' ? ' selected="selected"' : '';?>>małopolskie</option>
<option value="mazowieckie"  <?=$_POST['woj'] == 'mazowieckie' ? ' selected="selected"' : '';?>>mazowieckie</option>
<option value="opolskie"  <?=$_POST['woj'] == 'opolskie' ? ' selected="selected"' : '';?>>opolskie</option>
<option value="podkarpackie"  <?=$_POST['woj'] == 'podkarpackie' ? ' selected="selected"' : '';?>>podkarpackie</option>
<option value="podlaskie"  <?=$_POST['woj'] == 'podlaskie' ? ' selected="selected"' : '';?>>podlaskie</option>
<option value="pomorskie"  <?=$_POST['woj'] == 'pomorskie' ? ' selected="selected"' : '';?>>pomorskie</option>
<option value="śląskie"  <?=$_POST['woj'] == 'śląskie' ? ' selected="selected"' : '';?>>śląskie</option>
<option value="świętokrzyskie"  <?=$_POST['woj'] == 'świętokrzyskie' ? ' selected="selected"' : '';?>>świętokrzyskie</option>
<option value="warmińsko-mazurskie"  <?=$_POST['woj'] == 'warmińsko-mazurskie' ? ' selected="selected"' : '';?>>warmińsko-mazurskie</option>
<option value="wielkopolskie"  <?=$_POST['woj'] == 'wielkopolskie' ? ' selected="selected"' : '';?>>wielkopolskie</option>
<option value="zachodniopomorskie" <?=$_POST['woj'] == 'zachodniopomorskie' ? ' selected="selected"' : '';?>>zachodniopomorskie</option>
<?php
}
else
{
?>
<option value="dolnośląskie">dolnośląskie</option>
<option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
<option value="lubelskie">lubelskie</option>
<option value="lubuskie">lubuskie</option>
<option value="łódzkie">łódzkie</option>
<option value="małopolskie">małopolskie</option>
<option value="mazowieckie">mazowieckie</option>
<option value="opolskie">opolskie</option>
<option value="podkarpackie">podkarpackie</option>
<option value="podlaskie">podlaskie</option>
<option value="pomorskie">pomorskie</option>
<option value="śląskie">śląskie</option>
<option value="świętokrzyskie">świętokrzyskie</option>
<option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
<option value="wielkopolskie">wielkopolskie</option>
<option value="zachodniopomorskie">zachodniopomorskie</option>
<?php
}
?>
</select>
<input type="submit" value="Prześlij">
</form>
<canvas id="myChart"></canvas>
<script type="text/javascript">
var xVal=[];
var yVal=[];
var barColors = ['red', 'green', 'blue'];
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
Array.prototype.push.apply(barColors, barColors);
</script>    
<?php
if(isset($_POST["woj"]))
{
$sql= "SELECT Count(ID), powiat from aktywnosci Where data between '".$begin."' and '".$end."' and wojewodztwo= '".$_POST["woj"]."' group by powiat";
}
else
{
$sql= "SELECT Count(ID), powiat from aktywnosci Where data between '".$begin."' and '".$end."' group by powiat";
}
$result = $conn->query($sql);

$powiaty=[];

while($row = $result->fetch_assoc())
{
  array_push($powiaty,$row["powiat"]);
?>
<script type="text/javascript">
   xVal.push("<?php echo $row["powiat"]; ?>");
   yVal.push("<?php echo $row["Count(ID)"]; ?>");
</script>
<?php
}
?>
<script type="text/javascript">
new Chart("myChart", {
  type: "bar",
  data: {
    labels: xVal,
    datasets: [{
        backgroundColor: barColors,
        data: yVal
    }]
  },
  options: {
    responsive: true,
    legend: {display: false},
    title: {
      display: true,
      text: "Aktywności w powiatach w podanym zakresie dat"
    },
    scales: {
        yAxes: [{
            ticks: {
                min: 0, // minimum value
            }
        }]
    }
  }
});
</script> 
<br>
<br>
<?php
if(sizeof($powiaty)>0)
{
?>
<form action="admin_statystyki_powiat_szczegoly.php" method="post">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<select name="powiat">
<?php
for($i=0;$i<sizeof($powiaty);$i++)
{
  echo "<option value=".$powiaty[$i].">".$powiaty[$i]."</option>";
}
?>
</select>
<input type="submit" value="Szczegóły powiatu">
</form>
<?php
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>