<html>
<head>  
<title>MapBlue - Kalendarz</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link href="calendar.css" type="text/css" rel="stylesheet" />
<script>
var events=[];

function dayclick(x)
{
	update();
	x.style.backgroundColor="yellow";
	var card_date=x.id
	card_date=card_date.replace('li-', '');
	var day_events=[];
	events.forEach(event => {
		if(event.data==card_date)
		{
		day_events.push(event);
		}
	});
	var lista_aktywnosci=document.getElementById("lista_aktywnosci");
	var lista="";
	day_events.forEach(event => {
		lista+='<tr><td style="width:25%;">'+event.nazwa+'</td><td style="width:25%;">'+event.data+'</td><td style="width:25%;">'+event.godzina+'</td><td style="width:25%;"><form action="kalendarz_user_szczegoly.php" method="post"><input type="hidden" name="ID" value="'+event.ID+'"><input class="btn btn-primary m-2" type="submit" value="Szczegóły"></form></td></tr>';
	});
	lista_aktywnosci.innerHTML=lista;
}

 
function update()
{
	var dates=document.getElementById("cal_dates");
	var children = [].slice.call(dates.children);
	children.forEach(child=>{
		child.style.backgroundColor="#DDD";
		child.style.cursor="pointer";
		
	});
	events.forEach(event => {
		var element = document.getElementById("li-"+event.data);
		element.style.backgroundColor="lightblue";
		});
}

function update_month(){
	var cal_title = document.getElementById("cal_title");
	var date = cal_title.innerHTML.split(" - ");
	switch (date[0])
	{
	case '01':
    date[0]="Styczeń";
    break;
	case '02':
    date[0]="Luty";
    break;
	case '03':
    date[0]="Marzec";
    break;
	case '04':
    date[0]="Kwiecień";
    break;
	case '05':
    date[0]="Maj";
    break;
	case '06':
    date[0]="Czerwiec";
    break;
	case '07':
    date[0]="Lipiec";
    break;
	case '08':
    date[0]="Sierpień";
    break;
	case '09':
    date[0]="Wrzesień";
    break;
	case '10':
    date[0]="Październik";
    break;
	case '11':
    date[0]="Listopad";
    break;
	case '12':
    date[0]="Grudzień";
    break;
	}
	cal_title.innerHTML = date[0]+" - "+date[1];
}

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
	  <li class="nav-item" >
        <a class="nav-link" href="map.php">Dodaj aktywność</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="kalendarz_user.php">Kalendarz</a>
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
  </div>
</nav>
<div class="container-fluid p-1">
<?php
include 'calendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
</div>
<br>
<div class="container-fluid w-75">
<table  class="table table-striped" id="lista_aktywnosci" style="margin:0 auto;">
</table>
</div>
<script>
update();
update_month();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  