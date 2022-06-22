<?php
include('facecheck.php');
include('dbconfig.php');
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");
//echo "Connected successfully";
//$action = $_POST["action"];
if(isset($_POST["Login"]) and isset($_POST["Password"]))
{
	$sql = "SELECT count(id) as liczba FROM `bledne_logowania` WHERE login='".$_POST['Login']."' and data > (NOW() - INTERVAL 30 MINUTE);";
	$result = $conn->query($sql);
	$check = $result->fetch_assoc();
	if($check['liczba']<4)
	{
	$db_data = array();
	$sql = "SELECT * From users Where Login='".$_POST["Login"]."' and PASSWORD='".hash('sha256', $_POST['Password'])."'";
	$result = $conn->query($sql);
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
		$_SESSION["IMIE"]=$db_data["IMIE"];
		$_SESSION["NAZWISKO"]=$db_data["NAZWISKO"];
		$_SESSION["LOGIN"]=$db_data["LOGIN"];
		$_SESSION["Profilowe"]=$db_data["Profilowe"];
		header("Location: main.php");
		}
		else
		{
			header("Location: index.php?login=notactive");
		}
	}
	else
	{
		$sql = "INSERT INTO `bledne_logowania` (`id`, `login`) VALUES (NULL, '".$_POST["Login"]."');";
		$conn->query($sql);
		header("Location: index.php?login=error");

	}
	$conn->close();
	return;
	}
	else
	{
		$sql = "SELECT EMAIL From users Where Login='".$_POST["Login"]."';";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
		$row = $result->fetch_assoc();

		$mail = new PHPMailer\PHPMailer\PHPMailer();

		$mail->IsSMTP();
		$mail->CharSet="UTF-8";
		$mail->Host = "pronex.home.pl"; /* Zależne od hostingu poczty*/
		$mail->SMTPDebug = 1;
		$mail->Port = 465 ; /* Zależne od hostingu poczty, czasem 587 */
		$mail->SMTPSecure = 'ssl'; /* Jeżeli ma być aktywne szyfrowanie SSL */
		$mail->SMTPAuth = true;
		$mail->IsHTML(true);
		$mail->Username = "system@mapblue.pl"; /* login do skrzynki email często adres*/
		$mail->Password = "4qkDiZ4x"; /* Hasło do poczty */
		$mail->setFrom('system@mapblue.pl', 'Pronex'); /* adres e-mail i nazwa nadawcy */
		$mail->AddAddress($row["EMAIL"]); /* adres lub adresy odbiorców */
		$mail->Subject = "MapBlue Błąd Logowania"; /* Tytuł wiadomości */
		$mail->Body = "Uprzejmie informuję że z powodu czterech nieudanych prób logowania konto zostało zablokowane na 30 min.";
		$mail->Send();
		header("Location: index.php?login=error2");
		}
		else{
		header("Location: index.php?login=error");
		}
	}
}
else 
{
	header("Location: index.php");
}
?>