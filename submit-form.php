<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $captcha = $_POST["captcha"];
  
  if (!preg_match("/^[0-9]*$/",$phone)) {
    echo "Error: Phone number must contain only numbers!";
    exit;
  }
  
  if(isset($_SESSION["captcha"]) && $_SESSION["captcha"] !== $captcha) {
    echo "Error: Captcha code is invalid!";
    exit;
  }
  unset($_SESSION["captcha"]); // remove the captcha code from the session

  // Do something with the data, e.g. send an email
  mail("yogwebdev@gmail.com", $subject, $message, "From: $name <$email>");

 // Additional headers
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Send the email
    mail($to, $subject, $body, $headers);

    // Redirect to thank you page
    header("Location: thank-you.html");
    exit;
}
?>