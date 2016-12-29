<?php
include_once("./php/db/DbHelper.php");
class LoginModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function loginFormSubmitted($postinfo) {
        if (isset($postinfo)) {
            $pw = $postinfo["password"];
            $username = $postinfo["username"];

            $param = DbHelper::getInstance()->escape_string($username);
            $dbRes = DbHelper::doQuery("SELECT * FROM User WHERE username='$param';");
            $row = $dbRes->fetch_assoc();
            $validLogin = password_verify($pw, $row["password"]);
            if ($validLogin===true){
                // Check login (https://code.tutsplus.com/tutorials/user-membership-with-php--net-1523)
                $_SESSION["loggedIn"] = 1;
                $_SESSION["username"] = $_POST["username"];
                if ($row["isAdmin"]==1) {
                    $_SESSION["isAdmin"] = $row["isAdmin"];
                }
                header("location: ".$_SESSION["baseURL"]."Home");
            } else {
                if (empty($username)) {
                    header("location: ".$_SESSION["baseURL"]."Login?noUsername");
                }
                else {
                    header("location: ".$_SESSION["baseURL"]."Login?wrongPW");
                }
            }
        } else {
        }
    }
}

?>