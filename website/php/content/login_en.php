<script>
    function validateForm() {
        var form = document.forms["loginForm"];
        var username = form["username"].value;
        if (!username) {
            document.getElementById("usernameError").innerHTML = "Bitte Benutzername eingeben";
            var password = form["password"].value;
            if (!password) {
                document.getElementById("passwordError").innerHTML = "Bitte Passwort eingeben";
            }
            return false;
        }
        var password = form["password"].value;
        if (!password) {
            document.getElementById("passwordError").innerHTML = "Bitte Passwort eingeben";
            return false;
        }
        return true;
    }
</script>
<div class="leftBar">

</div>
<div class="content">
    <h1>Login</h1>
    <form id='login' name="loginForm" action='' method='post' accept-charset='UTF-8' onsubmit="return validateForm();">
        <fieldset>
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>
            <p>
                <label for='username'>Benutzername:</label>
                <input type='text' name='username' id='username' maxlength="50"/>
                <span id="usernameError" class="error"><?php if(isset($_GET['noUsername'])) echo 'Bitte Benutzername eingeben'; ?></span>
            </p>
            <p>
                <label for='password'>Passwort:</label>
                <input type='password' name='password' id='password' maxlength="50"/>
                <span id="passwordError" class="error"><?php if(isset($_GET['wrongPW'])) echo 'Falsches Passwort'; ?></span>
            </p>

            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
    <br/>
    <a href="<?php echo $_SESSION['baseURL'].'Registration'; ?>">Noch kein Account? Hier registrieren!</a>
</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>