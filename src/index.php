<?php
use PHPMailer\PHPMailer;
use PHPMailer\Exception;
require_once 'D:/WEB-Projects/Rocket_B/PHPMailer/src/Exception.php';
require_once 'D:/WEB-Projects/Rocket_B/PHPMailer/src/PHPMailer.php';
require_once 'D:/WEB-Projects/Rocket_B/PHPMailer/src/SMTP.php';

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


$mail->addAddress('rudenko_aleks@list.ru', 'Иванов Иван');

$mail->Subject = 'Форма с сайта';

$mail->msgHTML($body);

//header("Location: http://127.0.0.1:5500/Rocket%20B/index.html#");

$mail->send();

?>