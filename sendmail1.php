<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-6.9.1/src/Exception.php';
    require 'PHPMailer-6.9.1/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'PHPMailer-6.9.1/language/');
    $mail->IsHTML(true);

    $mail->setFrom('proteybelbursite@gmail.com', 'Заявка с сайта');
    $mail->addAddress('belburprotej@gmail.com');

    $body = '<h1>Новая заявка на обратную связь с сайта!</h1>';

    $body.='<p><strong>Имя:</p></strong> '.$_POST['name'].'</p>';

    $body.='<p><strong>Электронная почта:</p></strong> '.$_POST['email'].'</p>';

    $body.='<p><strong>Номер телефона:</p></strong> '.$_POST['number'].'</p>';

    $body.='<p><strong>Сообщение оставленное пользователем:</p></strong> '.$_POST['message'].'</p>';

    $mail->Body = $body;

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');

    echo json_encode($response);
?>