<?php
if($_SESSION["ust_theme"]=="dark")
{
?>
<script>
function update_theme()
{
var collection = document.getElementsByClassName("blue");
for(var i=0;i<collection.length;i++){
    collection[i].classList.add("bg-dark");
}
document.body.style.backgroundColor = "gray";
var collection = document.getElementsByClassName("container-fluid")
if(collection.length>1)
{
collection[1].style.backgroundColor = "#A9A9A9";
}
var cards = document.getElementsByClassName("bi");
for(var i=0;i<cards.length;i++){
    cards[i].parentElement.style.backgroundColor = "#A9A9A9";
    cards[i].style.fill = "#000000";
    cards[i].parentElement.children[1].style.color='#000000';
}
}
</script>
<?php
}
if($_SESSION["ust_size"]=="small")
{
    ?>
<script>
function update_size()
{
document.body.style.fontSize="small"
}
</script>
<?php
}
if($_SESSION["ust_size"]=="big")
{
    ?>
<script>
function update_size()
{
document.body.style.fontSize="large"
}
</script>
<?php
}
if($_SESSION["ust_size"]=="normal")
{
    ?>
<script>
function update_size()
{

}
</script>
<?php
}
?>
<script>
function update_all_styles()
{
    update_theme();
    update_size();
}
update_all_styles();
</script>