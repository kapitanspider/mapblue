<?php
include('facecheck.php');
include('dbconfig.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>MapBlue - Admin - Statystyki</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MapBlue</a>
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
<form action="admin_statystyki_powiat_szczegoly.php" method="post">
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="hidden" name="powiat" value="<?php echo  $_POST["powiat"]; ?>">
<input type="submit" value="Zmień datę">
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

$sql= "SELECT Count(ID), gmina from aktywnosci Where data between '".$begin."' and '".$end."' and powiat= '".$_POST["powiat"]."' group by powiat";
$result = $conn->query($sql);
$gminy=[];
while($row = $result->fetch_assoc())
{
    ?>
<script type="text/javascript">
    xVal.push("<?php echo $row["gmina"]; ?>");
    yVal.push("<?php echo $row["Count(ID)"]; ?>");
 </script>
 <?php
array_push($gminy,$row["gmina"]);
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
      text: "Aktywności w gminach w podanym zakresie dat"
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
<?php
if(sizeof($gminy)>0)
{
?>
<form action="admin_statystyki_gmina_lista.php" method="post">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<select name="gmina">
<?php
for($i=0;$i<sizeof($gminy);$i++)
{
  echo "<option value=".$gminy[$i].">".$gminy[$i]."</option>";
}
?>
</select>
<input type="submit" value="Lista aktywnosci w gminie">
</form>
<?php
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>