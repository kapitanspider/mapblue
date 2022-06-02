<?php
include('facecheck.php');
include('dbconfig.php');
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

$sql = "SELECT * From users Where ID='".$_SESSION["USER"]."'";
$result = $conn->query($sql);
$user = null;
while($row = $result->fetch_assoc()){
			$user = $row;
		}

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->Host = "smtp.poczta.onet.pl"; /* Zależne od hostingu poczty*/
$mail->SMTPDebug = 1;
$mail->Port = 465 ; /* Zależne od hostingu poczty, czasem 587 */
$mail->SMTPSecure = 'ssl'; /* Jeżeli ma być aktywne szyfrowanie SSL */
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username = "witek.wiry@op.pl"; /* login do skrzynki email często adres*/
$mail->Password = "2banany"; /* Hasło do poczty */
$mail->setFrom('witek.wiry@op.pl', 'WB'); /* adres e-mail i nazwa nadawcy */
$mail->AddAddress("witek.wiry@op.pl"); /* adres lub adresy odbiorców */
$mail->Subject = "Uwaga dotycząca aplikacji od: " .$user["IMIE"]." ".$user["NAZWISKO"]; /* Tytuł wiadomości */
$mail->Body = $_POST["uwaga"];;

if(!$mail->Send()) {
header('Location: pomoc.php');
} else {
    header('Location: pomoc.php');
}
?>