<div class="leftBar">

</div>
<div class="content">
    <?php include('../validation/login_validation.php') ?>
    <h1>Login</h1>
    <form id='login' action='index.php?site=login' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <label for='username'>Benutzername:</label>
            <input type='text' name='username' id='username' maxlength="50"/>
            <mark><?php echo $error_username; ?></mark>
            <br />

            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50"/>
            <br />

            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
    <br/>
    <a href='index.php?site=registration&lang=de'>Noch kein Account? Hier registrieren!</a>
</div>
<div class="rightBar">

</div>
<?php
if (isset($_POST["submit"])) {
    $pw = $_POST["password"];
    $username = $_POST["username"];

    $db = DbHelper::getInstance();
    $stmt = $db->prepare(
        "SELECT * FROM User WHERE username=?"
    );
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result || $result->num_rows !== 1) {
        echo "Keine Daten gefunden.";
        return;
    }
    $row = $result->fetch_assoc();
    $validLogin = password_verify($pw, $row["password"]);
    if ($validLogin===true){
        // Check login (https://code.tutsplus.com/tutorials/user-membership-with-php--net-1523)
        $_SESSION["loggedIn"] = 1;
        $_SESSION["username"] = $_POST["username"];
        header( "Location: index.php?site=home&lang=de" );
    } else {
        echo "Keine Daten gefunden.";
        //header( "Location: index.php?site=about&lang=de" );
    }
} else {
}
?>