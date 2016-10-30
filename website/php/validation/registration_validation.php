<?php

$success = true;
$username = $email = $error_username = $error_password = $error_password_repeat = $error_email = '';
if(isset($_POST['Submit'])) {
    if (empty($_POST['username'])) {
        $error_username = 'Bitte geben Sie einen Benutzernamen ein';
        $success = false;
    } /*else if (($_POST['name']) exists in DB) {
    $error_username = 'Dieser Benutzername ist bereits vergeben, bitte geben Sie einen anderen ein';
}*/
    else {
        $name = $_POST['username'];
    }

    if (empty($_POST['password']) || !filter_var($_POST['password'])) {
        $error_password = 'Sie haben nicht das richtige Passwort eingegeben. <a href="">Passwort vergessen?</a>';
        $success = false;
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST['password_repeat']) || !filter_var($_POST['password_repeat']) || ($_POST['password_repeat'] !== $_POST['password'])) {
        $error_password_repeat = 'Passwort stimmt nicht überein';
        $success = false;
    } else {
        $password_repeat = $_POST['password_repeat'];
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error_email = 'Bitte geben Sie eine gültige E-Mail-Adresse an';
        $success = false;
    } else {
        $email = $_POST['email'];
    }

    if ($success) {
        echo "<p>Sie haben sich erfolgreich registriert!</p>";
        exit;
    }
}


?>