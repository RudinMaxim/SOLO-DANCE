<?php
if($_POST){
    $to = "rudin.maksimka@bk.ru";
    $subject = "Отправка новой формы";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $group = $_POST['group'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = "Name: $name\nAge: $age\nDirection: $group\nEmail: $email\nPhone: $phone";
    $headers = "From: $email";
    if(mail($to, $subject, $message, $headers)){
        echo "Спасибо за отправку заявки!";
    }
    else{
        echo "К сожалению, при отправке формы произошла ошибка. Пожалуйста, попробуйте еще раз.";
    }
}
?>