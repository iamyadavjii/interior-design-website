<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "yogwebdev@gmail.com";
    $subject = "New contact form submission";
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    // Additional headers
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Send the email
    mail($to, $subject, $body, $headers);

    // Redirect to thank you page
    header("Location: index.php");
    exit;
}
?>