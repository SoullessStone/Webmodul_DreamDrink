<?php
if (isset($_POST["submit"])) {

    $pw = $_POST["password"];
    $username = $_POST["username"];

    $db = DbHelper::getInstance();
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
        header( "Location: index.php?site=home&lang=de" );
    } else {
        echo "Keine Daten gefunden.";
        //header( "Location: index.php?site=about&lang=de" );
    }
} else {
}
?>