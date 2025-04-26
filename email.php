<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  // Set email settings
  $to = "fatinaelomar3@gmail.com"; // YOUR EMAIL
  $headers = "From: $name <$email>\r\n";
  $fullMessage = "You received a new message:\n\n";
  $fullMessage .= "Name: $name\n";
  $fullMessage .= "Email: $email\n";
  $fullMessage .= "Subject: $subject\n\n";
  $fullMessage .= "Message:\n$message\n";

  // Send the email
  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "<script>alert('Thank you! Your message has been sent.'); window.history.back();</script>";
  } else {
    echo "<script>alert('Oops! Something went wrong. Please try again later.'); window.history.back();</script>";
  }
} else {
  // Not a POST request
  echo "<script>alert('Something went wrong!'); window.history.back();</script>";
}
?>
