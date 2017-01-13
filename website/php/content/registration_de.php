<div class="leftBar">
    <?php
    ?>
</div>
<div id="wrapper" class="content registration">
    <h1>Registration</h1>
    <?php
        if (isset($_GET["error"])) {
    ?>
        <span id="error" class="error">Es ist ein allgemeiner Fehler aufgetreten, bitte versuche es später nochmals.</span>
    <?php
        }
    ?>
    <form id='login' name="regForm" action='' method='post' accept-charset='UTF-8'>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="row">
            <div class="col-left">
                <label for='username'>Benutzername:</label>
                <input type='text' name='username' id='username' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['username'] : ""; ?>"/>
                <span id="usernameError" class="error">
                    <?php
                        if(isset($_GET['noUsername'])) echo 'Bitte Benutzernamen eingeben';
                        if(isset($_GET['usernameAlreadyExists'])) echo 'Der gewählte Benutzername ist bereits vergeben, versuch es mit einem anderen.';
                    ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-left">
                <label for='firstname'>Vorname:</label>
                <input type='text' name='firstname' id='firstname' maxlength="30" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['firstname'] : ""; ?>"/>
                <span id="firstnameError" class="error">
                    <?php
                        if(isset($_GET['noFirstname'])) echo '<br />Bitte Vornamen eingeben<br /><br />';
                    ?>
                </span>
            </div>

            <div class="col-right">
                <label for='lastname'>Nachname:</label>
                <input type='text' name='lastname' id='lastname' maxlength="45" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['lastname'] : ""; ?>"/>
                <span id="lastnameError" class="error">
                    <?php
                        if(isset($_GET['noLastname'])) echo '<br />Bitte Nachnamen eingeben<br /><br />';
                    ?>
                </span>
            </div>
        </div>
        <div class="row">
        <div class="col-left">
            <label for='email'>E-Mail:</label>
            <input type='text' name='email' id='email' maxlength="254" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['email'] : ""; ?>"/>
            <span id="emailError" class="error">
                <?php
                if(isset($_GET['invalidMail'])) echo '<br />Bitte gültige Email-Adresse eingeben<br /><br />';
                ?>
            </span>
        </div>
        <div class="col-right">
            <label for='homeNation'>Heimatland:</label>
            <select name="homeNation">
                <option value="Schweiz" selected>Schweiz</option>
                <option value="Deutschland">Deutschland</option>
                <option value="Frankreich">Frankreich</option>
                <option value="USA">USA</option>
                <option value="Sonstwo">Sonstwo</option>
            </select>
            <span id="homeNationError" class="error">
                <?php 
                    if(isset($_GET['noHomeNation'])) echo 'Bitte Land auswählen'; 
                ?>
            </span>
        </div>
        </div>

        <div class="row">
            <div class="col-left">
            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['password'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo '<br />Die Passwörter stimmen nicht überein, bitte gib sie nochmals ein.';
                    if(isset($_GET['passwordEmpty'])) echo '<br />Das Passwort darf nicht leer sein.';
                ?>
            </span>
            </div>
        </div>
        <div class="row">
            <div class="col-left">
            <label for='passwordRepeat'>Passwort wiederholen:</label>
            <input type='password' name='passwordRepeat' id='passwordRepeat' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['passwordRepeat'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo '<br />Die Passwörter stimmen nicht überein, bitte gib sie nochmals ein.';
                    if(isset($_GET['passwordRepeatEmpty'])) echo '<br />Das Passwort darf nicht leer sein.';
                ?>
            </span>
            </div>
        </div>

        <input type='submit' name='submit' value='Submit'/>
    </form>
    <br/>
 </div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>