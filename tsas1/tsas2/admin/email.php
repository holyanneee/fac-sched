<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$rn = rand(10000,999999);
$code = 0;
    $code .= $rn;
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);    

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'pup201files@gmail.com';                     //SMTP username
        $mail->Password   = 'vwqp ossp jzfz jkpu';                               //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pup201files@gmail.com', 'TSAS');
        $mail->addAddress("joshuasapin2@gmail.com");     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New enquiry - Funda of web it Contact Form';

        $bodyContent =$code;

        $mail->Body = $bodyContent; 
        $mail->send();

        
       
    } catch (Exception $e) {
    }
