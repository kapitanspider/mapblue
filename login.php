<?php
include('facecheck.php');
include('dbconfig.php');
//echo "Connected successfully";
//$action = $_POST["action"];
if(isset($_POST["Login"]) and isset($_POST["Password"]))
{
	$db_data = array();
	$sql = "SELECT * From users Where Login='".$_POST["Login"]."' and PASSWORD='".hash('sha256', $_POST['Password'])."'";
	//$sql = "SELECT * From Users";
	$result = $conn->query($sql);
	//var_dump($result->num_rows);
	if($result->num_rows == 1)
	{
		while($row = $result->fetch_assoc()){
			$db_data = $row;
		}
		if($db_data["IS_ACTIVE"]=='1')
		{
		session_start();
		$_SESSION["USER"]=$db_data["ID"];
		$_SESSION["ADMIN"]=$db_data["ADMIN"];
		header("Location: main.php");
		}
		else
		{
			header("Location: index.php?login=notactive");
		}
	}
	else
	{
		header("Location: index.php?login=error");

	}
	$conn->close();
	return;
}
else 
{
	header("Location: index.php");
}
?>