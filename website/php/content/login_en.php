<script>
    function validateForm() {
        var form = document.forms["loginForm"];
        var username = form["username"].value;
        if (!username) {
            document.getElementById("usernameError").innerHTML = "Type in username";
            var password = form["password"].value;
            if (!password) {
                document.getElementById("passwordError").innerHTML = "Type in password";
            }
            return false;
        }
        var password = form["password"].value;
        if (!password) {
            document.getElementById("passwordError").innerHTML = "Type in password";
            return false;
        }
        return true;
    }
</script>
<div class="leftBar">

</div>
<div id="wrapper" class="content">
    <h1>Login</h1>
    <?php
        if (isset($_GET["thanks"])) {
            echo "<p>Thank you!</p>";
        }
    ?>
    <form id='login' name="loginForm" action='' method='post' accept-charset='UTF-8' onsubmit="return validateForm();">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <p>
            <label for='username'>Benutzername:</label>
            <input type='text' name='username' id='username' maxlength="50"/>
            <span id="usernameError" class="error"><?php if(isset($_GET['noUsername'])) echo 'Type in username'; ?></span>
            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50"/>
            <span id="passwordError" class="error"><?php if(isset($_GET['wrongPW'])) echo 'Wrong password'; ?></span>

            <input type='submit' name='submit' value='Submit'/>
        </p>

    </form>
    <p><a href="<?php echo $_SESSION['baseURL'].'Registration'; ?>">No account yet - register!</a></p>
</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>