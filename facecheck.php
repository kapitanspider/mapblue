<?php
session_start();
if(!isset($_SESSION["USER"])){
	header("Location: index.php");
}
?>