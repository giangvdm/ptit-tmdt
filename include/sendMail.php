<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
function smtpmailer($to, $from, $from_name, $subject, $body) { 
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'tls://smtp.gmail.com:587';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'vankiennguyen182@gmail.com';                 // SMTP username
        $mail->Password = 'anhkien1997';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
        );
     
        //Recipients
        $mail->setFrom($from, $from_name);
        $mail->addAddress($to);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($from, $from_name);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
     
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
     
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'Email from PTIT books';
     
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return false;
    }    
    // global $error;
    // $mail = new PHPMailer();  // create a new object
    // $mail->IsSMTP(); // enable SMTP
    // $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    // $mail->SMTPAuth = true;  // authentication enabled
    // $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 465; 
    // $mail->Username = GUSER;  
    // $mail->Password = GPWD;           
    // $mail->SetFrom($from, $from_name);
    // $mail->Subject = $subject;
    // $mail->Body = $body;
    // $mail->AddAddress($to);
    // if(!$mail->Send()) {
    // $error = 'Mail error: '.$mail->ErrorInfo; 
    // return false;
    // } else {
    // $error = 'Message sent!';
    // return true;
    // }
}
