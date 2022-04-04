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
<form action="admin_statystyki_powiat_szczegoly.php" method="post">
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="hidden" name="powiat" value="<?php echo  $_POST["powiat"]; ?>">
<input type="submit" value="Zmień datę">

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
while($row = $result->fetch_assoc())
{
    ?>
<script type="text/javascript">
    xVal.push("<?php echo $row["gmina"]; ?>");
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
</body>
</html>