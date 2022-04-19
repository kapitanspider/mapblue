<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
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
		lista+='<tr><td>'+event.nazwa+'</td><td>'+event.data+"</td><td>"+event.godzina+'</td><td><form action="kalendarz_user_szczegoly.php" method="post"><input type="hidden" name="ID" value="'+event.ID+'"><input type="submit" value="Szczegóły"></form></td></tr>';
	});
	lista_aktywnosci.innerHTML=lista;
}

 
function update()
{
	var dates=document.getElementById("cal_dates");
	var children = [].slice.call(dates.children);
	children.forEach(child=>{
		child.style.backgroundColor="#DDD";
		
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
<div style="margin:0,auto;">
<?php
include 'calendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
</div>
<br>
<table width="90%" id="lista_aktywnosci" style="margin:0 auto;">
</table>
<script>
update();
update_month();
</script>
</body>
</html>  