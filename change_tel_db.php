<?php
include('input_check.php');
include('facecheck.php');
include('dbconfig.php');
//var_dump($_POST);
if(mainInputCheck()){
$sql = 'UPDATE users SET TELEFON = "'.$_POST['tel'].'" WHERE ID="'.$_SESSION['USER'].'";'; 
$result = $conn->query($sql);
header("Location: profil.php");
}
else{
	header("Location: forcelogout.php");
}
?>