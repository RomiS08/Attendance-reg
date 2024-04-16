<?php

require 'vendor/autoload.php';
require_once 'sendemail.php';  // Including sendemail file

// Test data
$recipient = 'californiadiscover528@gmail.com';
$subject = 'Test Email';
$content = 'This is a test email sent using SendGrid from a PHP script.';

// Send the email
$response = SendEmail::SendMail($recipient, $subject, $content);

// Check if the email was sent successfully
if ($response) {
    echo "Email sent successfully. Response: " . print_r($response, true);
} else {
    echo "Failed to send email.";
}