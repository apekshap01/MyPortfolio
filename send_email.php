<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
    // Set a 400 (bad request) response code and exit
    http_response_code(400);
    echo "Oops! All fields are required.";
    exit;
}

// Sanitize input fields
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Set a 400 (bad request) response code and exit
    http_response_code(400);
    echo "Oops! Invalid email format.";
    exit;
}

// Set the recipient email address
$to = 'apeksha.s.patil1@gmail.com'; // Replace with your email address

// Set the email subject
$subject = 'New message from '.$name;

// Set the email message
$body = 'Name: ' . $name . "\r\n";
$body .= 'Email: ' . $email . "\r\n";
$body .= 'Message: ' . $message;

// Set the email headers
$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Attempt to send the email
if(mail($to, $subject, $body, $headers)) {
    // Set a 200 (okay) response code
    http_response_code(200);
    echo "Thank you! Your message has been sent successfully.";
} else {
    // Set a 500 (internal server error) response code
    http_response_code(500);
    echo "Oops! An error occurred and your message could not be sent.";
}
?>
