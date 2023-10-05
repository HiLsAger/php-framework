<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');

$method = $_SERVER['REQUEST_METHOD'];
$privateKey = trim($_POST["p_key"]);

// Recaptcha verification
if ($method === 'POST') {
    $secret_key = $privateKey;
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&remoteip=$remoteip";

    $recaptcha = json_decode(file_get_contents($url));
    if (!$recaptcha->success) {
        http_response_code(400);
        echo "Recaptcha verification failed.";
        exit();
    }
}

// SMTP configuration
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.yandex.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = 'noreply-to-mail@yandex.ru';
$mail->Password = 'igduvvwwkzlbbhpj';
$mail->CharSet = 'UTF-8';

// Sender and recipient details
$project_name = trim($_POST["project_name"]);
$admin_email = trim($_POST["admin_email"]);
$form_subject = trim($_POST["form_subject"]);

$mail->setFrom('noreply-to-mail@yandex.ru', $project_name);
$mail->addAddress($admin_email);

// Email content
$message = '<table style="border-border-radius: 10px; width: 100%; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd;">';
$message .= '<tr><td colspan="2" style="background-color: #fff; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 10px;"><h1 style="color: #333; margin: 0;">' . $form_subject . '</h1></td></tr>';

foreach ($_POST as $key => $value) {
    if ($key != "project_name" && $key != "admin_email" && $key != "form_subject" && $key != "g-recaptcha-response" && $key != "checkbox" && $key != "p_key") {
        $message .= '<tr>';
        $message .= '<td style="background-color: #fff; width: 30%; padding: 10px; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; color: #555; border-radius: 10px;"><strong>' . $key . ':</strong></td>';
        $message .= '<td style="background-color: #fff; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 10px;">' . $value . '</td>';
        $message .= '</tr>';
    }
}

$message .= '</table>';

// Add hidden fields to message
preg_match_all('/<input type="hidden" name="([^"]+)" value="([^"]+)"/', $_POST['_form'], $matches, PREG_SET_ORDER);
if (!empty($matches)) {
    $message .= '<table style="border-radius: 10px; collapse; width: 100%; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">';
    $message .= '<tr><td colspan="2" style="background-color: #fff; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 10px;"><h2 style="color: #333;">Hidden Fields:</h2></td></tr>';
    
    foreach ($matches as $match) {
        $key = htmlspecialchars($match[1]);
        $value = htmlspecialchars($match[2]);
        if ($key != "checkbox") {
            $message .= '<tr>';
            $message .= '<td style="background-color: #fff; width: 30%; padding: 10px; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; border-radius: 10px;"><strong>' . $key . ':</strong></td>';
            $message .= '<td style="background-color: #fff; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 10px;">' . $value . '</td>';
            $message .= '</tr>';
        }
    }
    
    $message .= '</table>';
}

$mail->Subject = $form_subject;
$mail->msgHTML($message);

// Send the message
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>
