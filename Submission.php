<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$comments = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);


if(empty($email)){

  header("location: services.html?nouser");
  exit();
}

if(empty($comments)){

  header("location: services.html?nouser");
  exit();
}

if(empty($_POST['email2'])) {

$mail = new PHPMailer(true);
try {

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'mail.smtp2go.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dsblade0@hotmail.com';
    $mail->Password = 'Tayler19';
    $mail->SMTPSecure = 'tls';
    $mail->Port = "2525";


    $mail->setFrom($email,$name);


    $mail->addAddress('dsblade0@hotmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Feedback from ' . $name;
    $mail->Body    = $comments;
    $mail->AltBody = strip_tags($comments);


    $mail->send();

    header("location:ThankYou.php");

  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
