<?php

if (isset($_POST['email']) && !empty($_POST['email'])) {

    require 'php-mail/PHPMailerAutoload.php';

    $to = "carlyseitz817@gmail.com";   // ADMIN email
    $from = $_POST['email'];
    $fromName = $_POST['name'];
    $subject = "Contact Form: " . $_POST['name'];
    $message = $_POST['comment'];

    $smtp = false;
    $smtp_host = 'smtp.gmail.com';   // SMTP host
    $smtp_port = 587;            // SMTP Port
    $smtp_ssl = 'ssl';             // SSL or nothing
    $smtp_username = 'carlyseitz817@gmail.com';        // SMTP username
    $smtp_password = 'FuckP@$$w0rdstealers682549';        // SMTP password

    $mail = new PHPMailer();

    if ($smtp) {
        $mail->IsSMTP();
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port;
        $mail->SMTPSecure = $smtp_ssl;
        $mail->SMTPDebug = false;

        if (!empty($smtp_username)) {
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
        } else {
            $mail->SMTPAuth = false;
        }
    }

    $mail->From = $from;
    $mail->FromName = $fromName;
    $mail->AddAddress($to);
    $mail->AddReplyTo($from);

    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(false);

    $mail->Subject  = $subject;
    $mail->Body = $message;

    if ($mail->Send()) {
        echo "Message Sent";
    } else {
        echo "Message Not Sent<br>";
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Mail not sent.";
}


echo "<script>
    setTimeout(function(){
        window.location = 'contacts.html';
    }, 4000);
    </script>";
?>