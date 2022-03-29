<?php
include('facecheck.php');
include('dbconfig.php');
//var_dump($_POST);
$sql = 'UPDATE users SET EMAIL = "'.$_POST['email'].'" WHERE ID="'.$_SESSION['USER'].'";'; 
$result = $conn->query($sql);
header("Location: profil.php");
?>