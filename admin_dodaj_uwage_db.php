<?php
include('input_check.php');
include('facecheck.php');
include('dbconfig.php');
if(mainInputCheck()){
$sql = "UPDATE `aktywnosci` SET `uwagi` = '".$_POST['uwagi']."' WHERE `aktywnosci`.`ID` = ".$_POST["id"].";";
$conn->query($sql);
header("Location: ".$_POST['orgin']);
}
else{
	header("Location: forcelogout.php");
}
?>
