<!DOCTYPE HTML>
<html>
<head>
<title>Title of the document</title>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body>
<?php
include('facecheck.php');
include('dbconfig.php');

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

$gminy=[];

while($row = $result->fetch_assoc())
{
  array_push($gminy,$row["powiat"]);
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
<a href="main.php">Wróć</a>
<br>
<br>
<?php
if(sizeof($gminy)>0)
{
?>
<form action="admin_statystyki_powiat_szczegoly.php" method="post">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<select name="powiat">
<?php
for($i=0;$i<sizeof($gminy);$i++)
{
  echo "<option value=".$gminy[$i].">".$gminy[$i]."</option>";
}
?>
</select>
<input type="submit" value="Szczegóły powiatu">
</form>
<?php
}
?>
</body>
</html>