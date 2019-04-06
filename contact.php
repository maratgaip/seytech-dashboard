<?php

require 'vendor/autoload.php';

$name     = $_POST['name'];
$email    = $_POST['email'];
$comments = $_POST['comments'];

// Send Grid
$from = new SendGrid\Email(null, $email);
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "marattig@gmail.com");
$content = new SendGrid\Content("text/plain", $comments);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = $SENDGRID_API_KEY;
$apiKey = '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';
echo $apiKey;

$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

