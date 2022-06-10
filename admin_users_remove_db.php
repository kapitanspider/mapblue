<?php
include('facecheck.php');
include('dbconfig.php');
$id=$_POST["id"];
$sql='DELETE FROM wspoluczestnicy WHERE `wspoluczestnicy`.`id_uzytkownika` = '.$id;
$conn->query($sql);
$sql='DELETE FROM powiadomienia WHERE `powiadomienia`.`id_osoby` = '.$id;
$conn->query($sql);
$sql='DELETE FROM `wspoluczestnicy` WHERE `id_aktywnosci` in (select ID FROM aktywnosci where ID_Organizatora = '.$id.')';
$conn->query($sql);
$sql='DELETE FROM `udostepnienia` WHERE `udostepnienia`.`id_usera` = '.$id;
$conn->query($sql);
$sql='DELETE FROM `aktywnosci` WHERE `aktywnosci`.`ID_Organizatora` = '.$id;
$conn->query($sql);
$sql='DELETE FROM `users` WHERE `users`.`ID` = '.$id;
$conn->query($sql);
header("Location: admin_users.php");
?>