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


function generatePassword() {

    $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
    $_alphaCaps  = strtoupper($_alphaSmall);                // CAPITAL LETTERS
    $_numerics   = '1234567890';                            // numerics
    $_specialChars = '`~!@#$%^&*()-_=+]}[{;:,<.>/?\'"\|';   // Special Characters

    $_container = $_alphaSmall.$_alphaCaps.$_numerics.$_specialChars;   // Contains all characters
    $passbam = '';         // will contain the desired pass

    for($i = 0; $i < 10; $i++) {                                 // Loop till the length mentioned
        $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
        $passbam .= substr($_container, $_rand, 1);                // returns part of the string [ high tensile strength ;) ] 
    }

    return $passbam;       // Returns the generated Pass
}

//Create an instance; passing `true` enables exceptions

function sendmail($email ,$last_name,$subject, $body ){

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
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


