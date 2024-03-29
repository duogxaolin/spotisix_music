<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendCSM($subject, $body, $bcc)
{
    global $duogxaolin;
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = $duogxaolin->site('web_mail');
        $mail->SMTPAuth = true;
        $mail->Username = $duogxaolin->site('email');
        $mail->Password = $duogxaolin->site('pass_email');
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($duogxaolin->site('email'));
        foreach ($bcc as $bcc_email) {
            $mail->addBCC($bcc_email);
        }
        $mail->addReplyTo($duogxaolin->site('email'));
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->CharSet = 'UTF-8';
        $mail->send();
        $return['status'] = true;
        $return['msg']   = 'Gửi thành công';
    } catch (Exception $e) {
        $return['status'] = true;
        $return['msg']   = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    return (json_encode($return));
}