<?php
require_once 'vendor/autoload.php';

// Create the Trasport
$transport = (new Swift_SmtpTransport('wtglaundrymanagement.com', 465, 'ssl'))
  ->setUsername("test@wtglaundrymanagement.com")
  ->setPassword("test2023!");


// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendEmail($userEmail,$message,$name,$subject)
{

    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Password Reset Mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>'.$name.'</p>
        '.$message.'
      </div>
    </body>

    </html>';


    // Create a message
    $message = (new Swift_Message($subject))
        ->setFrom('test@wtglaundrymanagement.com')
        ->setTo('wtg@wtglaundrymanagement.com')
        ->setReplyTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
      echo "message sent";
  } else {
      echo "an error occured";
  }
}









