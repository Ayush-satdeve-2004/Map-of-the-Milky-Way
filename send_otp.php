<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$user_email = "satdeveayush2004@gmail.com";
$otp = rand(100000, 999999);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'satdeveayush2004@gmail.com';
    $mail->Password = 'nlgleraihbheczir';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('satdeveayush2004@gmail.com', 'Galaxy Map OTP');
    $mail->addAddress($user_email);

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "Your OTP code is: <b>$otp</b>";

    $mail->send();
    echo "OTP sent successfully to $user_email";
} catch (Exception $e) {
    echo "OTP could not be sent. Mailer Error: {$e->getMessage()}";
}
?>
