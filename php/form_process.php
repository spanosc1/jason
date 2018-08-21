<?php

// define variables and set to empty values
$nameError = $emailError = $phoneError = $contactPreferenceError = "";
$name = $email = $phone = $message = $url = $success = $date = $hospitalName = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $fullNameError = "Your Name is required";
  } else {
    $fullName = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $fullNameError = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailError = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneError = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phoneError = "Invalid phone number";
    }
  }

  if (empty($_POST["contactPreference"])) {
    $contactPreferenceError = "Please pick which method of contact";
  } else {
    $contactPreference = test_input($_POST["contactPreference"]);
    if(!emailPreference || !phonePreference){
      $contactPreferenceError = "Please pick either Email or Phone";
    }
  }

  if (empty($_POST["date"])) {
    $date = "";
  } else {
    $date = test_input($_POST["date"]);
  }

  if (empty($_POST["hospitalName"])) {
    $hospitalName = "";
  } else {
    $hospitalName = test_input($_POST["hospitalName"]);
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if ($nameError == '' and $emailError == '' and $phoneError == '' and $contactPreferenceError == '' ){
      $messageBody = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $messageBody .=  "$key: $value\n";
      }

      $to = 'jgoncalves189@gmail.com';
      $subject = 'Contact Form Submit - Possible New Client!';
      if (mail($to, $subject, $messageBody)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $contactPreference = $date =  $hospitalName = $message = '';
      }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
