<?php
include('facecheck.php');
include('dbconfig.php');
var_dump($_POST);
$sql = "UPDATE `aktywnosci` SET `uwagi` = '".$_POST['uwagi']."' WHERE `aktywnosci`.`ID` = ".$_POST["id"].";";
$conn->query($sql);
header("Location: ".$_POST['orgin']);
?>
