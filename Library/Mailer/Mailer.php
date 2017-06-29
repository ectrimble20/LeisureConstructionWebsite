<?php

namespace Leisure\Library\Mailer;

use Leisure\Library\Common\Settings;
use Leisure\Library\Log\Log;

class Mailer {

    public static function SendEmailToPrimary( $name, $email, $message )
    {
        $fmessage = "Contact Name: ". $name ." <br/>";
        $fmessage .= "Contact Email: ". $email ."<br />";
        $fmessage .= "Message:<br />". $message ."<br />";

        $mail = new \PHPMailer();

        $mail->Host = "email-smtp.us-east-1.amazonaws.com";
        $mail->SMTPAuth = true;

        //not sure if I'm required to use this
        //$mail->Username = Config::getEmailUser();
        //$mail->Password = Config::getEmailPass();

        $mail->IsHTML(true);

        //over-ride until I have a reason to not over-ride it
        $mail->setFrom("no-reply@leisureconstruction.com", "no-reply@leisureconstruction.com");

        $mail->Subject = "Contact Form Submission";
        //who we're sending to
        $mail->AddAddress( Settings::PRIMARY_CONTACT_EMAIL_ADDRESS );

        $mail->Body = $fmessage;

        if( ! $mail->Send() )
        {
            Log::Get()->error("Send Mail Failed: ". $mail->ErrorInfo);
            return false;
        }
        return true;
    }

}