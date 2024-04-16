<?php

// Check if running on Heroku
$isHeroku = getenv('IS_HEROKU');

if ($isHeroku === 'true') {
    // Running on Heroku, environment variables are already set
    require 'vendor/autoload.php';
} else {
    // Running locally, load environment variables from .env file
    require_once 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

class SendEmail {
    public static function SendMail($to, $subject, $content) {
        // Access environment variables directly, they will be available regardless of environment
        $apiKey = $_ENV['API_KEY'];

        // Initialize SendGrid mail object
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("shone58deal345@gmail.com", "Sathsara Karunarathne");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);
        //$email->addContent("text/html", $content);

        // Create SendGrid object with API key
        $sendgrid = new \SendGrid($apiKey);

        // Send email
        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch (Exception $e) {
            echo 'Email exception caught: ' . $e->getMessage() . "\n";
            return false;
        }
    }
}

// Example usage
// $response = SendEmail::SendMail("recipient@example.com", "Test Email", "This is a test email.");
// if ($response) {
//     echo "Email sent successfully. Response: " . print_r($response, true);
// } else {
//     echo "Failed to send email.";
// }

?>