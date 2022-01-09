<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader


require '../../documents/PHPMailer/Exception.php';
require '../../documents/PHPMailer/PHPMailer.php';
require '../../documents/PHPMailer/SMTP.php';




//Create an instance; passing `true` enables exceptions

function sendmail($email ,$last_name){

    $mail = new PHPMailer(true);
    $username= 'huynamnn1@gmail.com';
    $password = 'vfqrrgseejtdsvsr';

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $username;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;      
        $mail->CharSet = 'UTF-8';                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('huynamnn1@gmail.com','Tran Huy Nam');
        // $mail->addAddress('1951060882@e.tlu.edu.vn','ABC');   
        $mail->addAddress($email, $last_name);     //Add a recipient

        
        //Attachments
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Chào mừng';
        $mail->Body    = 'Chúc mừng bạn đã đăng kí thành công';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


