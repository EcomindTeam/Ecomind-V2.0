<?php
/*
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
date_default_timezone_set('Etc/UTC');

//Carrega as bibliotecas de classes
require './PHPMailer/PHPMailerAutoload.php';

//Cria uma nova instância da classe PHPMailer
$mail = new PHPMailer;

//Diz ao PHPMailer para usar SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'cti.ecommerce@gmail.com'; //Preencher com o usuário da sua conta Gmail

//Password to use for SMTP authentication
$mail->Password = '@cti1234'; //Preencher com a senha do usuário da sua conta Gmail

//Set who the message is to be sent from
$mail->From='cti.ecommerce@gmail.com'; //Preencher com a sua conta Gmail

$mail->FromName='E-commerce CTI'; //Preencher com o nome do remetente

//Set who the message is to be sent to
$mail->addAddress('victor.assis-rodrigues@gmail.com'); //Preencher com o email e nome de quem receberá a mensagem

//Set the subject line
$mail->Subject = 'Teste PHPMailer 5.2 com Gmail'; //Preencher com o assunto do email

$mail->isHTML(true); //Configurar mensagem como HTML

$mail->CharSet='UTF-8'; //Configurar conjunto de caracteres da mensagem em HTML

//Replace the plain text body with one created manually
$mail->Body = '<html><head><meta charset="utf-8"></head><body> Parabéns! Você recebeu uma mensagem do Victor! </body></html>'; //Mensagem em HTML

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}