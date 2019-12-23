<?php
header('Refresh: 0; URL=https://vineet2420.github.io/');

   function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }
  function died($error) {
      echo '<script type="text/javascript">alert("' . $error . '")</script>';

    }


if (isset($_POST['email'])) {
  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "vineet.malhotra120@gmail.com";
  $email_subject = "Message From Your Site";


  // validation expected data exists
  if(!isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['message'])) {

  }
  $first_name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $error_message = "";

  if(!filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL)) {
    $error_message .= 'The Email Address you entered is invalid.\n';
  }

  $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The Name you entered is invalid.\n';
  }


  if(strlen($message) < 2) {
    $error_message .= 'Please enter a valid message. \n';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }
  else {
    $email_message = "New Message from VineetMalhotra Site:\n\n";


  $email_message .= "First Name: ".clean_string($first_name)."\n";

  $email_message .= "Email: ".clean_string($email)."\n";

  $email_message .= "Message: ".clean_string($message)."\n";

  // create email headers
  $headers = 'From: '.$email."\r\n".
  'Reply-To: '.$email."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);

?>

 echo '<script type="text/javascript">alert("Thank you for contacting me! I will try to get back with you as soon as I can.");</script>' exit ;

<?php

  }
}
?>
