<?php
require ("sendgrid-php/sendgrid-php.php"); // This folder's files help authentication SendGrid Library (if you don't understand, read the README.md file)
	
$from = new SendGrid\Email("Just a name", "NoReply@test.com"); // Replace 'Just a name' AND 'NoReply@test.com' with a custom name and email you like as sender's details
$subject = "Sending with SendGrid is Fun & Easy"; // This is the email's Subject
$to = new SendGrid\Email("Anyname", "test@mail.com"); // Here 'Anyname' can be the recipient's name AND 'test@mail.com' should be the recipient's email address which needs to be replaced
$content = new SendGrid\Content("text/plain", "Just so easy without composer, Thanks Stanyke"); // Here is the content of the email being sent
   
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = 'SendGrid_API_KEY'; // Replace SendGrid_API_KEY with your one time API key (if you don't understand, read the README.md file)

$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode(); // This help tell you the reponse status gotten from the server to know if the email was successful (400, 401, 201 etc) but the correct status to get is 200 or 201
print_r($response->headers()); // This help tell you the reponse message gotten from the server to know if the email was successful
echo $response->body();
	
?>