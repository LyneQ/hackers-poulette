<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    require './Config/SMTP.php';

    require 'vendor/autoload.php';

    function sendEmail(SupportTicket $ticket) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = SMTPConfig::HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTPConfig::USERNAME;                     
            $mail->Password = SMTPConfig::PASSWORD;
            $mail->SMTPSecure = SMTPConfig::SMTPSecure;
            $mail->Port = SMTPConfig::PORT;
            
            $mail->setFrom(SMTPConfig::USERNAME, 'Poulette');
            $mail->addAddress($ticket->email, $ticket->name.' '.$ticket->firstName);

            if ($ticket->fileURL) $mail->addAttachment($ticket->fileURL);

            $mail->isHTML(true);
            $mail->Subject = 'Your support ticket';
            $mail->Body = 'Thank you for contacting the support. <br/>We are working on your demand and will answer as soon as we can.';
            $mail->AltBody = 'Thank you for contacting the support. We are working on your demand and will answer as soon as we can.';

            $mail->send();
        } catch(Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
?>