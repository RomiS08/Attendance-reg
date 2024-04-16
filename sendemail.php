<?php
    require 'vendor/autoload.php';
    

class SendEmail {

    public static function SendMail($to, $subject, $content) {
        // Get the API key from Heroku config vars when Deployed and Run top up the the Heroku
        $apiKey = $_ENV['API_KEY'];
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("shone58deal345@gmail.com", "Sathsara Karunarathne");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);
        //$email->addContent("text/html", $content);

        $sendgrid = new \SendGrid($apiKey);

        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch (Exception $e) {
            echo 'Email exception Caught : ' . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>