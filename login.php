<?php
include('dbconfig.php');
//echo "Connected successfully";
//$action = $_POST["action"];
if(isset($_POST["Login"]) and isset($_POST["Password"]))
{
	$db_data = array();
	$sql = "SELECT * From Users Where Login='".$_POST["Login"]."' and PASSWORD='".$_POST["Password"]."'";
	//$sql = "SELECT * From Users";
	$result = $conn->query($sql);
	//var_dump($result->num_rows);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()){
			$db_data = $row;
		}
		//var_dump($db_data["ID"]);
		session_start();
		$_SESSION["USER"]=$db_data["ID"];
		header("Location: main.php");
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