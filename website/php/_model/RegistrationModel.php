<?php
include_once("./php/db/DbHelper.php");
class RegistrationModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function registrationFormSubmitted($postinfo) {
        if (isset($postinfo)) {
            $this->saveInputInSession($postinfo);
            $this->validateInput($postinfo);
            $username = htmlspecialchars($postinfo["username"]);
            $password = htmlspecialchars($postinfo["password"]);
            $email = htmlspecialchars($postinfo["email"]);
            $firstname = htmlspecialchars($postinfo["firstname"]);
            $lastname = htmlspecialchars($postinfo["lastname"]);
            $this->validateUsernameNotAlreadyTaken($username);
            $aff_rows = $this->createUser($username, $password, $email, $firstname, $lastname);
            if ($aff_rows == 1) {
                $this->sendMail(htmlspecialchars($postinfo["email"]), htmlspecialchars($postinfo["homeNation"]), htmlspecialchars($postinfo["username"]));
                unset($_SESSION["registration_data"]);
                header("location: ".$_SESSION["baseURL"]."Login?thanks");
            }else {
                header("location: ".$_SESSION["baseURL"]."Registration?error");
            }
        }
    }

    private function sendMail($email, $nation, $username) {
        $empfaenger = $email;
        $betreff = "Willkommen bei Dreamdrink";
        $from = "From: DoNotReply Dreamdrink <donoreply@hara.kiwi>";
        $text = "Hallo " . $username . " (" . $nation . ")\nWillkommen bei Dreamdrink!\nFreundliche Gruesse\DreamDrink Team";
        
        mail($empfaenger, $betreff, $text, $from);
    }

    private function createUser($username, $password, $email, $firstname, $lastname) {
            $username = DbHelper::getInstance()->escape_string($username);
            $password = DbHelper::getInstance()->escape_string($password);
            $password = password_hash($password,PASSWORD_BCRYPT);
            $email = DbHelper::getInstance()->escape_string($email);
            $firstname = DbHelper::getInstance()->escape_string($firstname);
            $lastname = DbHelper::getInstance()->escape_string($lastname);

            $res = DbHelper::doQuery("INSERT INTO User (username, password, email, firstname, lastname, isAdmin) VALUES ('$username', '$password', '$email', '$firstname', '$lastname', 0);");
            return DbHelper::getInstance()->affected_rows;
    }

    private function validateUsernameNotAlreadyTaken($username) {
            $param = DbHelper::getInstance()->escape_string($username);
            $dbRes = DbHelper::doQuery("SELECT count(*) as anzahl FROM User WHERE username='$param';");
            $row = $dbRes->fetch_assoc();
            if ($row["anzahl"]>0) {
                header("location: ".$_SESSION["baseURL"]."Registration?usernameAlreadyExists");
                exit;
            }
    }

    private function validateInput($postinfo) {
        $username = htmlspecialchars($postinfo["username"]);
        if (empty($username)) {
            header("location: ".$_SESSION["baseURL"]."Registration?noUsername");
            exit;
        }
        $firstname = htmlspecialchars($postinfo["firstname"]);
        if (empty($firstname)) {
            header("location: ".$_SESSION["baseURL"]."Registration?noFirstname");
            exit;
        }
        $lastname = htmlspecialchars($postinfo["lastname"]);
        if (empty($lastname)) {
            header("location: ".$_SESSION["baseURL"]."Registration?noLastname");
            exit;
        }
        $homeNation = htmlspecialchars($postinfo["homeNation"]);
        if (empty($homeNation)) {
            header("location: ".$_SESSION["baseURL"]."Registration?noHomeNation");
            exit;
        }
        $email = htmlspecialchars($postinfo["email"]);
        if (empty($email)) {
            header("location: ".$_SESSION["baseURL"]."Registration?invalidMail");
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ".$_SESSION["baseURL"]."Registration?invalidMail");
            exit;
        }
        $password = htmlspecialchars($postinfo["password"]);
        if (empty($password)) {
            header("location: ".$_SESSION["baseURL"]."Registration?passwordEmpty");
            exit;
        }
        $passwordRepeat = htmlspecialchars($postinfo["passwordRepeat"]);
        if (empty($passwordRepeat)) {
            header("location: ".$_SESSION["baseURL"]."Registration?passwordRepeatEmpty");
            exit;
        }
        
        if ($password != $passwordRepeat) {
            header("location: ".$_SESSION["baseURL"]."Registration?passwordsNotEqual");
            exit;
        }
    }

    private function saveInputInSession($postinfo) {
        $_SESSION["registration_data"] = $postinfo;
    }

}

?>