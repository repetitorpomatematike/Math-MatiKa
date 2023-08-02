<?php
    // Получаем данные из POST-запроса
    $host_email = "veselmikhail04@yandex.ru";
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


    $to = $host_email;
    $subject = 'Заявка с сайта math&matika';
    $message = $output;
    $headers = "From: $host_email" . "\r\n" .
        "Reply-To: $host_email" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    $res = mail($to, $subject, $message, $headers);
    
    if ($res) {
        echo "Success";
    } else {
        echo "Error";
    }
    // if ($mail->send()) {
    //     $message = "success";
    // } else {
    //     $message ="error";
    // }

    // echo $message;
