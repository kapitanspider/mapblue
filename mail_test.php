<?php
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

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
$mail->AddAddress("witek.wiry@op.pl"); /* adres lub adresy odbiorców */
$mail->Subject = "Testowa wiadomość SMTP"; /* Tytuł wiadomości */
$mail->Body = "Witaj, Jeżeli to czytasz, to znaczy, że udało się poprawnie wysłać e-maila za pomocą SMTP!";

if(!$mail->Send()) {
echo "Błąd wysyłania e-maila: " . $mail->ErrorInfo;
} else {
echo "Wiadomość została wysłana!";
}
?>