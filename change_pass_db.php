<?php
include('facecheck.php');
include('dbconfig.php');
//var_dump($_POST);
$sql = 'UPDATE users SET PASSWORD = "'.hash('sha256', $_POST['haslo']).'" WHERE ID="'.$_SESSION['USER'].'";'; 
$result = $conn->query($sql);
header("Location: profil.php");
?>