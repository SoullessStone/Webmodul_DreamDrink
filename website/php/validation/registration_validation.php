<?php

$success = true;
$username = $error_username = $error_password = $error_password_repeat = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $error_username = 'Bitte geben Sie einen Benutzernamen ein.';
        $success = false;
    } /*else if (($_POST['name']) exists in DB) {
    $error_username = 'Dieser Benutzername ist bereits vergeben, bitte geben Sie einen anderen ein';
}*/
    else {
        $username = test_input($_POST['username']);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $error_username = "Spezialzeichen sind nicht erlaubt.";
        }
    }

    if (empty($_POST['password']) || !test_input($_POST['password'])) {
        $error_password = 'Sie haben nicht das richtige Passwort eingegeben. <a href="">Passwort vergessen?</a>';
        $success = false;
    } else {
        $password = test_input($_POST['password']);
    }

    if (empty($_POST['password_repeat']) || !test_input($_POST['password_repeat']) || ($_POST['password_repeat'] !== $_POST['password'])) {
        $error_password_repeat = 'Passwort stimmt nicht überein';
        $success = false;
    } else {
        $password_repeat = test_input($_POST['password_repeat']);
    }

    if ($success) {
        echo "<p>Sie haben sich erfolgreich registriert!</p>";
        exit;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>