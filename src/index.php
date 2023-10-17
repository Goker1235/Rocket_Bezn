<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/PHPMailer/src/Exception.php';
require_once 'PHPMailer/PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/PHPMailer/src/SMTP.php';


$phone = $_POST['phone'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];

$email_template = "form.html";

$body = file_get_contents($email_template); // Сохраняем данные в $body
$body = str_replace('%name%', $name, $body); // Заменяем строку %name% на имя
$body = str_replace('%lastName%', $lastName, $body); // строку %email% на почту
$body = str_replace('%phone%', $phone, $body); // строку %phone% на телефон
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 587;
$mail->Username = 'Rud1k23@yandex.ru';
$mail->Password = 'sshbhppawvconkoz';

$mail->setFrom('Rud1k23@yandex.ru', 'Snipp.ru');


$mail->addAddress('rbru-metrika@yandex.ru', 'Руденко Александр');

// Тема письма
$mail->Subject = "ddd";
 
// Тело письма
$mail->msgHTML($body);

header("Location: http://localhost:8082/index.html");
 
$mail->send();
?>