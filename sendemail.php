<?php

require 'vendor/autoload.php';

// Load environment variables conditionally
if (file_exists('.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

class SendEmail {
    public static function SendMail($to, $subject, $content) {
        // Access environment variables
        $apiKey = getenv('API_KEY');

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("shone58deal345@gmail.com", "Sathsara Karunarathne");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);

        $sendgrid = new \SendGrid($apiKey);

        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch(Exception $e) {
            echo 'Email exception Caught : '. $e->getMessage() ."\n";
            return false;
        }
    }
}


?>