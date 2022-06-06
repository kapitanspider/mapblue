<?php
include('facecheck.php');
include('dbconfig.php');
//var_dump($_POST);
$sql = 'UPDATE users SET PASSWORD = "'.hash('sha256', $_POST['haslo']).'" WHERE ID="'.$_POST['id'].'";'; 
$result = $conn->query($sql);
header("Location: admin_users.php");
?>