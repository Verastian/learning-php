<?php

$errors = '';
$sent = '';
$data = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($name)) {
        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
    } else {
        $errors .= "El nombre es necesario <br/>";
    }
    if (!empty($email)) {
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    } else {
        $errors .= "El correo es necesario <br/>";
    }
    if (!empty($message)) {
        $message = htmlspecialchars($message);
        $message = trim($message);
        $message = stripslashes($message);
    } else {
        $errors .= "Aún no has escrito un mensaje <br/>";
    }

    if (!$errors) {
        $send_to = 'email@email.com';
        $subject = 'Asunto';
        $prepared_message = "De: $name \n";
        $prepared_message .= "Correo: $email \n";
        $prepared_message .= "Mensaje: $message \n";

        // mail($send_to, $subject, $prepared_message);
        $data = $send_to . "<br>" . $subject . "<br>" . $prepared_message;
        $sent = 'true';
    }
}

require 'index.view.php';

// *END
?>