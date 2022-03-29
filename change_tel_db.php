<?php
include('facecheck.php');
include('dbconfig.php');
//var_dump($_POST);
$sql = 'UPDATE users SET TELEFON = "'.$_POST['tel'].'" WHERE ID="'.$_SESSION['USER'].'";'; 
$result = $conn->query($sql);
header("Location: profil.php");
?>