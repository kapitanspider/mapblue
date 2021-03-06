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
<link rel="stylesheet" href="colors.css">
<style>
.square {
    border-radius:4px;
    height:25px;
    width:25px;
    border-radius:4px;
    margin-left: auto;
    margin-right: auto;
    display:inline-block;
    background-color:#B80000;
}
</style> 
<script>


var woj=[];
var ilosci=[];
var suma=0;

var cmax='#0000ff';
var c8='#1a1aff';
var c7='#3333ff';
var c6='#4d4dff';
var c5='#6666ff';
var c4='#8080ff';
var c3='#9999ff';
var c2='#b3b3ff';
var c1='#ccccff';
var c0='#ddddff';

function update(elem){
  for (var i=0;i<woj.length;i++)
  {
    obj=elem.getElementById(woj[i]);
    if(ilosci[i]>(suma/10))
    {
      obj.style.fill=cmax;
    }
    else if(ilosci[i]>(suma/15))
    {
      obj.style.fill=c8;
    }
    else if(ilosci[i]>(suma/20))
    {
      obj.style.fill=c7;
    }
    else if(ilosci[i]>(suma/25))
    {
      obj.style.fill=c6;
    }
    else if(ilosci[i]>(suma/30))
    {
      obj.style.fill=c5;
    }
    else if(ilosci[i]>(suma/35))
    {
      obj.style.fill=c4;
    }
    else if(ilosci[i]>(suma/40))
    {
      obj.style.fill=c3;
    }
    else if(ilosci[i]>(suma/45))
    {
      obj.style.fill=c2;
    }
    else if(ilosci[i]>(suma/50))
    {
      obj.style.fill=c1;
    }
    else
    {
      obj.style.fill=c0;
    }
  }
}

function move(elem){
  window.location.replace('admin_statystyki_okregi.php?woj='+elem.id+"&begin="+begin+"&end="+end);
}
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark blue">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">MapBlue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
    <li class="nav-item text-center">
      <a class="nav-link" href="main.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
      <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </svg>
        <br>Strona g????wna</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_aktywnosci.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
    </svg>
        <br>Wszystkie aktywno??ci</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_statystyki.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
    </svg>
        <br>Statystyki</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_ostatnie_aktywnosci.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
    </svg>
        <br>Ostatnio dodane aktywnosci</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_wydarzenie_krajowe.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
			<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
			<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
    </svg>
        <br>Wydarzenia og??lnopolskie</a>
      </li>

    <li class="nav-item text-center">
      <a class="nav-link" href="admin_users.php">
      <svg xmlns="http://www.w3.org/2000/svg"fill="#ffffff" viewBox="0 0 16 16" height="30px">
			<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
    </svg>
        <br>U??ytkownicy</a>
      </li>
    </ul>
    <ul class="navbar-nav">
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2 card mt-1 text-center" style="max-width:700px;">
<?php
if(isset($_POST["begin"]))
{
$begin=$_POST["begin"];
$end=$_POST["end"];
}
else
{
$end=date_format(date_create(),"Y-m-d");
$begin=date("Y-m-d",mktime(0,0,0,date('m')-3,date('d'),date('y')));
}
?>
<?php
$sql = "SELECT count(id), wojewodztwo FROM `aktywnosci` Where data between '".$begin."' and '".$end."' GROUP by wojewodztwo ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
?>
<script type="text/javascript">
   woj.push("<?php echo $row["wojewodztwo"]; ?>");
   ilosci.push("<?php echo $row["count(id)"]; ?>");
   suma+=<?php echo $row["count(id)"]; ?>;
</script>
<?php
}
?>
<script>
  var begin='<?php echo $begin; ?>';
  var end='<?php echo $end; ?>';
</script>
<form action="admin_statystyki.php" method="post">
<label>Ustaw zakres dat</label>
<br>
<input type="date" name="begin" required value="<?php echo $begin; ?>">
<input type="date" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue" value="Ustaw">
</form>
<div id="scale" class="mt-2 text-center">
  <b class="m-2">Du??o</b>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <div class="square"></div>
  <b class="m-2">Ma??o</b>
</div>

<svg id="map" onload="update(this)" viewBox="15 0 140 130"> 
    <polygon id="pomorskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="86.191 22.766 83.453 27.132 80.049 27.132 78.051 25.356 73.463 25.356 69.911 23.802 67.543 23.802 65.841 26.836 62.363 27.132 61.771 29.204 57.479 29.204 55.111 26.836 55.481 24.616 56.369 23.284 55.481 22.174 56.591 21.434 54.519 19.362 54.162 16.203 53.149 15.299 54.741 14.182 54.844 10.128 52.994 8.33 55.481 7.5965 58.226 5.3185 66.359 2.78 72.984 2.2395 77.028 3.7955 79.486 5.8945 79.058 6.538 76.805 4.4105 73.55 3.026 76.298 10.664 79.723 11.967 84.301 11.794 89.225 9.2041 89.521 9.5135 84.563 12.07 85.886 13.589 84.901 17.406 86.561 18.844 86.561 19.954 89.151 19.954 88.041 22.914" class="fil1 str0"/>
    <polygon id="zachodniopomorskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="54.893 22.026 56.019 23.528 55.118 24.279 54.742 26.908 53.616 27.133 53.24 29.161 50.537 30.287 50.236 31.94 52.79 33.291 50.912 35.77 48.885 37.422 48.359 38.699 46.256 39.9 44.379 39.149 43.102 37.647 41.149 40.05 36.869 40.276 35.742 42.454 33.865 43.43 30.629 43.1 28.867 46.723 27.336 47.643 25.7 47.017 21.626 43.409 21.95 41.147 24.204 39.702 25.003 34.357 23.632 26.334 25.979 27.809 26.956 22.177 25.228 22.327 23.313 23.359 21.698 22.702 21.698 21.726 24.759 21.585 27.857 19.698 46.482 13.69 50.537 8.959 52.414 8.7337 54.292 10.386 54.142 13.916 52.264 15.267 53.541 16.394 54.292 19.924 55.794 21.275" class="fil4 str0"/>
    <polygon id="warmi??sko-mazurskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="84.008 27.392 84.933 28.594 85.211 30.629 87.986 31.832 90.761 32.479 90.965 36.222 94.026 35.15 95.48 36.392 98.968 36.179 100.01 34.144 102.32 34.144 103.71 32.756 105.56 32.572 106.49 31.369 107.87 31.646 110.65 30.444 114.81 29.056 118.25 29.334 118.99 28.046 120.48 28.026 128.13 23.089 129.33 20.732 128.69 18.696 127.39 17.124 127.3 15.459 125.59 13.841 126.84 12.684 128.87 11.853 129.03 10.557 126.24 11.111 112.27 12.176 91.666 9.9096 89.696 12.038 86.365 13.644 85.459 17.142 86.997 18.556 87.061 19.344 89.87 19.341 88.31 23.506 86.46 23.368" class="fil2 str0"/>
    <polygon id="podlaskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="129.84 20.725 128.37 23.398 120.44 28.469 119.28 28.562 118.52 29.904 114.97 29.806 115.73 31.789 115.46 34.462 116.29 36.214 119.01 37.09 119.01 38.611 120.07 39.303 120.07 41.285 123.39 41.285 123.39 43.083 125.37 43.221 125.28 46.494 127.12 50.874 132.98 51.888 133.21 53.179 134.91 53.271 137.12 48.2 141.41 45.434 143.72 43.636 143.44 34.97 139.57 28.008 137.31 15.239 130.9 10.122 129.52 10.396 129.2 12.104 127.21 12.934 126.15 13.948 127.81 15.469 127.81 17.083 129.06 18.696" class="fil4 str0"/>
    <polygon id="mazowieckie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="118.87 60.14 118.68 62.102 120.25 63.552 118.87 64.289 118.87 65.856 117.21 66.594 115.92 66.594 115.37 67.781 118.59 68.899 118.41 71.02 117.76 71.388 118.41 71.85 118.59 74.431 117.3 75.076 117.49 78.764 115.18 78.396 113.15 79.318 112.23 78.119 110.11 78.119 108.73 76.275 106.42 76.92 103.93 76.736 100.32 72.864 100.43 71.665 102 70.282 99.322 66.133 102.92 66.318 103.66 65.027 102.09 64.105 102.09 61.984 100.24 61.062 98.585 60.786 97.663 59.034 98.308 57.374 95.542 55.714 95.542 54.424 93.79 53.686 91.024 54.147 87.982 52.764 85.492 52.303 85.861 50.459 87.244 49.537 87.06 47.601 88.166 45.112 89.157 44.466 87.924 43.217 87.982 40.778 91.09 39.58 91.096 36.819 93.698 35.707 95.295 37.035 99.507 36.629 100.43 34.848 102.42 34.943 103.93 33.402 105.71 33.315 106.57 32.014 108.01 32.23 110.87 31.048 114.42 29.898 115.18 32.019 115 34.97 116.1 36.998 118.41 37.551 118.41 38.934 119.33 39.764 119.51 41.884 122.74 42.069 123.2 43.913 124.58 43.913 124.68 47.232 126.89 51.381 132.55 52.252 132.97 54.147 131.13 57.558 128.37 56.729 128.3 58.216 126.06 58.02 125.14 58.757 121.45 58.836" class="fil5 str0"/>
    <polygon id="lubelskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="140.79 69.938 141.07 73.427 146.08 82.129 144.79 82.6 144.99 83.776 145.97 85.03 145.65 90.596 142.32 91.38 139.89 94.203 137.66 91.851 134.87 92.047 132.95 93.615 128.72 93.536 125.98 92.243 126.05 90.871 127.82 90.204 126.37 87.931 123.04 86.324 123.04 83.54 118.41 83.58 117.74 78.876 117.86 75.23 118.84 74.642 118.84 71.898 118.25 71.428 119 70.84 118.92 68.488 115.98 67.586 116.1 66.841 117.43 67.037 119.39 65.783 119.39 64.411 120.68 63.431 119.12 62.059 119.12 60.491 121.27 59.119 125.39 59.197 126.37 58.413 128.8 58.688 128.72 57.237 131.34 57.825 133.62 54.258 134.99 53.866 138.4 55.12 140.36 57.394 140.01 62.882 138.83 63.94 139.5 68.644" class="fil2 str0"/>
    <polygon id="podkarpackie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="128.91 94.04 133.22 94.118 135.11 92.548 137.49 92.343 139.45 94.306 134.56 100.04 128.46 109.22 129.87 113.15 129.48 116.68 131.29 118.25 131.05 119.03 121.87 115.34 120.06 112.44 118.1 112.44 115.74 111.03 114.17 111.58 113.39 111.26 113.15 109.61 112.45 108.91 112.45 105.53 110.17 104.72 109.86 103.57 111.82 102.16 110.09 100.66 110.09 93.364 112.21 91.008 114.8 89.438 116.29 89.046 116.29 87.633 118.26 86.298 118.49 84.179 122.63 84.123 122.63 86.582 126.06 88.388 127.16 89.937 125.56 90.773 125.56 92.578" class="fil1 str0"/>
    <polygon id="ma??opolskie" onclick="move(this)"  style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="109.73 93.493 109.73 100.77 111.41 102.23 109.52 103.28 109.86 105.03 112.14 105.82 112.08 108.8 112.76 109.85 113.14 111.28 112.38 110.93 109.28 111.63 108.71 113.07 107.11 113.77 104.88 111.81 100.12 112.05 97.061 114.24 96.512 116.52 95.334 115.5 93.529 115.5 93.215 112.28 91.409 111.97 89.29 108.51 88.897 105.53 86.307 103.57 84.238 101.21 86.432 97.95 89.052 95.432 91.32 92.92 91.267 91.794 94.03 91.132 94.805 89.927 98.505 90.583 99.466 92.578 99.416 94.148 100.47 96.111 103.04 96.394 105.93 94.432" class="fil2 str0"/>
    <polygon id="??wi??tokrzyskie" onclick="move(this)"style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="115.43 78.792 117.45 79.217 118.09 83.686 118.09 85.814 116.02 87.304 115.86 88.793 114.53 89.006 111.98 90.762 109.74 92.996 105.75 94.113 103.09 96.082 100.96 95.975 99.898 94.22 99.898 92.251 98.568 90.283 94.685 89.538 92.929 88.846 94.206 87.038 91.918 85.282 93.248 83.952 92.344 82.888 93.887 79.43 95.802 80.547 95.908 78.792 94.951 77.994 95.642 76.291 98.196 75.546 100 74.536 100.16 73.206 103.73 77.036 106.66 77.355 108.52 76.77 109.85 78.632 112.13 78.526 113.2 79.856" class="fil4"/>
    <polygon id="??l??skie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="90.961 81.93 91.12 82.835 92.025 82.835 92.823 84.005 91.28 85.388 93.78 87.25 92.344 89.059 94.312 90.017 93.94 90.921 90.854 91.613 90.961 92.783 85.8 97.997 83.779 101.03 85.96 104.06 88.46 105.76 88.726 108.32 86.226 110.02 85.375 111.94 83.034 112.52 83.034 109.97 81.172 109.91 80.587 107.25 78.246 106.03 77.927 102.41 75.426 102.31 70.958 99.486 71.277 97.518 75.16 95.709 75.16 92.038 76.118 89.698 77.82 89.166 77.82 88.474 76.224 87.144 77.129 85.548 77.288 83.58 78.193 82.516 78.193 80.228 78.778 79.004 81.145 78.738 82.821 78.313 83.832 79.749 85.534 80.122 86.971 79.377 88.992 82.303" class="fil5 str0"/>
    <polygon id="????dzkie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="97.93 57.565 97.132 58.948 98.462 61.236 100.22 61.608 101.65 62.246 101.65 64.321 103.25 65.332 102.77 66.077 98.834 65.758 101.55 70.333 100.11 71.45 99.632 74.482 97.664 75.44 95.589 75.919 94.632 78.206 95.696 78.951 95.536 80.228 93.887 78.898 92.238 82.462 91.386 82.462 91.12 81.558 89.152 81.93 87.024 78.898 85.694 79.696 84.098 79.43 82.874 77.94 80.48 78.419 78.033 78.792 77.076 77.834 72.128 77.142 72.447 75.546 71.543 74.536 71.436 72.886 72.873 71.45 74.548 71.131 74.792 67.24 75.375 64.044 76.756 62.991 78.618 63.151 79.602 61.422 78.991 60.225 79.044 58.735 81.119 58.203 81.438 55.703 83.619 55.49 83.992 54.745 82.821 54.479 82.768 53.043 85.534 52.724 87.716 53.096 91.014 54.586 93.674 54.16 95.217 54.639 95.004 55.809" class="fil1 str0"/>
    <polygon id="kujawsko-pomorskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="86.811 49.319 85.641 50.276 85.056 52.192 82.555 52.724 81.225 51.979 79.363 52.724 76.703 49.957 74.841 49.691 74.203 48.893 73.511 49.798 71.383 49.798 68.085 47.031 66.116 47.138 64.999 45.808 63.297 46.18 62.339 44.531 63.935 42.403 63.669 40.807 61.169 39.743 61.807 37.615 61.275 36.019 62.499 34.263 61.86 33.12 60.477 32.508 60.477 31.231 62.18 30.167 62.605 27.613 66.329 27.081 67.925 24.155 70.053 24.262 73.777 25.751 78.033 25.751 80.055 27.613 83.619 27.613 84.524 28.784 84.843 31.071 88.407 32.508 90.269 32.986 90.642 39.211 87.45 40.541 87.45 43.36 88.407 44.424 87.609 44.956 86.652 47.723" class="fil4 str0"/>
    <polygon id="wielkopolskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="61.754 33.518 62.126 34.157 60.85 35.912 61.382 37.615 60.69 39.902 63.19 41.126 63.616 41.871 62.02 44.584 63.244 46.818 64.946 46.286 66.276 47.616 68.032 47.51 71.436 50.276 73.564 50.276 74.256 49.372 74.788 50.117 76.65 50.436 79.204 53.309 81.172 52.351 82.342 53.149 82.236 54.586 83.672 54.905 83.3 55.384 81.172 55.277 80.8 57.778 78.512 58.735 78.512 60.438 79.31 61.395 78.672 62.725 76.544 62.725 74.948 63.736 74.362 67.194 74.15 70.865 72.394 71.131 71.064 72.886 71.064 74.589 72.128 75.812 71.756 77.249 69.628 78.472 68.032 77.94 68.032 76.504 67.074 76.504 66.542 72.248 64.414 71.67 64.68 69.056 60.85 67.194 59.2 69.162 56.328 69.056 52.87 66.768 52.71 65.172 50.156 64.8 49.252 62.672 46.752 62.619 45.954 60.916 44.464 60.544 44.73 58.788 43.24 57.99 43.4 50.489 41.698 47.191 43.666 45.329 44.092 39.477 46.06 40.381 48.826 38.945 49.252 37.615 51.54 36.019 53.242 33.199 50.582 31.869 50.848 30.433 53.668 29.369 54.04 27.666 54.838 27.4 57.232 29.794 61.488 29.528 61.222 30.326 60.158 30.965 60.052 32.827" class="fil2 str0"/>
    <polygon id="lubuskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="44.198 60.704 45.794 61.236 46.752 62.938 48.986 63.098 49.784 64.906 48.72 66.822 48.986 68.098 46.113 68.258 44.624 69.482 44.464 67.832 43.24 67.46 40.048 71.822 38.878 70.253 37.176 70.28 36.484 72.248 34.25 71.876 32.494 73.631 32.228 71.556 29.302 69.854 29.515 67.194 27.44 64.268 28.77 62.3 29.674 59.48 28.31 58.288 28.77 54.958 27.28 55.277 26.68 52.265 27.57 51.431 27.6 48.095 29.142 47.138 30.792 43.733 33.718 43.999 36.324 42.509 37.282 40.754 41.378 40.381 43.134 38.094 43.772 39.158 43.294 45.116 41.272 47.138 42.974 50.596 42.868 58.15 44.464 59.054" class="fil1 str0"/>
    <polygon id="dolno??l??skie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="37.761 84.963 43.134 85.867 43.932 87.197 45.368 88.527 49.039 87.357 51.114 89.538 48.028 92.73 50.954 94.645 53.614 98.954 56.008 96.667 58.03 95.656 55.955 92.411 57.126 92.304 58.775 90.921 59.041 88.793 62.392 83.048 64.52 80.547 64.893 76.61 66.702 76.557 66.116 72.727 63.988 71.929 64.361 69.269 60.956 67.673 59.36 69.535 56.168 69.428 52.55 67.141 52.444 65.545 50.156 65.279 49.199 66.715 49.358 68.471 46.326 68.63 44.57 69.96 44.198 68.098 43.347 67.779 40.155 72.195 38.559 70.599 37.495 70.492 36.59 72.62 34.356 72.354 32.494 74.057 32.707 77.515 30.366 83.367 31.962 83.473 32.866 80.441 35.899 80.813 36.324 83.633" class="fil5 str0"/>
    <polygon id="opolskie" onclick="move(this)" style="stroke:#1f1a17;stroke-width:.0762;fill:#ffffff" points="77.82 82.09 77.022 83.526 77.022 85.122 75.958 87.41 77.395 88.58 77.395 89.112 75.586 89.644 74.735 92.304 74.894 95.337 71.17 97.305 70.532 99.806 68.51 101.03 65.85 97.837 67.978 96.135 66.382 94.007 62.924 95.177 59.732 92.57 57.498 92.411 59.094 91.081 59.307 88.953 62.765 83.207 64.893 80.547 65.212 77.036 67.606 76.876 67.606 78.1 69.84 78.792 72.075 77.462 77.022 78.206 78.086 79.536" class="fil4 str0"/>
</svg>
<form action="admin_statystyki_users.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue m-2 w-75" value="U??ykownicy szczeg????owo">
</form>
<form action="admin_statystyki_powiaty.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue m-2 w-75" value="Powiaty szczeg????owo">
</form>
<form action="admin_statystyki_gminy.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue m-2 w-75" value="Gminy szczeg????owo">
</form>
<form action="admin_statystyki_kategorie.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue m-2 w-75" value="Rodzaje Aktywnosci">
</form>
<form action="admin_statystyki_wydarzenie_krajowe.php" method="get">
<input type="hidden" name="begin" required value="<?php echo $begin; ?>">
<input type="hidden" name="end" required value="<?php echo  $end; ?>">
<input type="submit"  class="btn blue m-2 w-75" value="Wydarzenia og??lnopolskie">
</form>
</div>
<script>
var squares=document.getElementById("scale").children;
squares[1].style.backgroundColor=cmax;
squares[2].style.backgroundColor=c8;
squares[3].style.backgroundColor=c7;
squares[4].style.backgroundColor=c6;
squares[5].style.backgroundColor=c5;
squares[6].style.backgroundColor=c4;
squares[7].style.backgroundColor=c3;
squares[8].style.backgroundColor=c2;
squares[9].style.backgroundColor=c1;
squares[10].style.backgroundColor=c0;
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
include('apply_settings.php');
?>
</body>
</html>