<?php
    $host_email = "ira_ryzhkova_2002@mail.ru";
	$name =  $_POST['fio'];
    $phone = $_POST['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $comment = isset($_POST['commentary']) ? $_POST['commentary'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;
    
    if (!empty($name)) {
        $output .= "<p><b>Имя:</b> " . $name . "</p>";
    }

    if (!empty($phone)) {
        $output .= "<p><b>Телефон:</b> " . $phone . "</p>";
    }

    if (!empty($email)) {
        $output .= "<p><b>Email:</b> " . $email . "</p>";
    }

    
    if (!empty($comment)) {
        $output .= "<p><b>Сообщение:</b> " . $comment . "</p>";
    }

    if ($message != null) {
        foreach ($message as $k => $v) {
            $output .= "<p><b>$k:</b> " . $v . "</p>";
        }
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