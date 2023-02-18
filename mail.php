<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $group = $_POST['group'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $errors = [];

  if (empty($name) || empty($age) || empty($group) || empty($email) || empty($phone)) {
    array_push($errors, "All fields are required");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid email address");
  }

  if (count($errors) == 0) {
    $to = "solo.dancestudio@yandex.ru";
    $subject = "Form Submission";
    $message = "Name: " . $name . "\n" . "Age: " . $age . "\n" . "Group: " . $group . "\n" . "Email: " . $email . "\n" . "Phone: " . $phone;
    $headers = "From: " . $email;

    if (mail($to, $subject, $message, $headers)) {
      echo "<h1>Sent Successfully! Thank you" . $name . ", We will contact you shortly!</h1>";
    } else {
      echo "Something went wrong!";
    }
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

?>