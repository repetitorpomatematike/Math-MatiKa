<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    // Получаем данные из POST-запроса
    $host_email = "ira_ryzhkova_2002@mail.ru";
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : $host_email;
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $output = "";

    if (!empty($name)) {
        $output .= "<p><b>Имя:</b> " . $name . "</p>";
    }

    if (!empty($phone)) {
        $output .= "<p><b>Телефон:</b> " . $phone . "</p>";
    }

    if (!empty($email)) {
        $output .= "<p><b>Email:</b> " . $email . "</p>";
    }

    if (!empty($message)) {
        $output .= "<p><b>Сообщение:</b> " . $message . "</p>";
    }

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', '/ajax/language/');
    $mail->IsHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($host_email);
    $mail->Subject = "Заявка с сайта math&matika";
    $mail->Body = "$output";
    
    if ($mail->send()) {
        $message = "success";
    } else {
        $message ="error";
    }

    echo $message;