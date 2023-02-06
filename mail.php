<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $group = $_POST['group'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $errors = [];

  if (empty($name) || empty($age) || empty($group) || empty($email) || empty($phone)) {
    array_push($errors, "Все поля обязательны для заполнения");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Неверный адрес электронной почты");
  }

  if (count($errors) == 0) {
    $to = "solo.dancestudio@yandex.ru";
    $subject = "Отправка формы";
    $message = "Имя: " . $name . "\n" . "Возраст: " . $age . "\n" . "Группа: " . $group . "\n" . "Эл. адрес: " . $email . "\n" . "Телефон: " . $phone;
    $headers = "От: " . $email;

    if (mail($to, $subject, $message, $headers)) {
      echo "<h1>Успешно отправлено! Спасибо" . $name . ", Мы скоро с Вами свяжемся!</h1>";
    } else {
      echo "Что-то пошло не так!";
    }
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

?>