<div class="leftBar">
    <?php
    ?>
</div>
<div id="wrapper" class="content registration">
    <h1>Registration</h1>
    <?php
        if (isset($_GET["error"])) {
    ?>
        <span id="error" class="error">General error, retry later...</span>
    <?php
        }
    ?>
    <form id='login' name="regForm" action='' method='post' accept-charset='UTF-8'>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="row">
            <div class="col-left">
                <label for='username'>Username:</label>
                <input type='text' name='username' id='username' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['username'] : ""; ?>"/>
                <span id="usernameError" class="error">
                    <?php
                        if(isset($_GET['noUsername'])) echo 'Type in username';
                        if(isset($_GET['usernameAlreadyExists'])) echo 'Username is already taken. Chose another one.';
                    ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-left">
                <label for='firstname'>Firstname:</label>
                <input type='text' name='firstname' id='firstname' maxlength="30" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['firstname'] : ""; ?>"/>
                <span id="firstnameError" class="error">
                    <?php
                        if(isset($_GET['noFirstname'])) echo '<br />Type in firstname<br /><br />';
                    ?>
                </span>
            </div>

            <div class="col-right">
                <label for='lastname'>Lastname:</label>
                <input type='text' name='lastname' id='lastname' maxlength="45" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['lastname'] : ""; ?>"/>
                <span id="lastnameError" class="error">
                    <?php
                        if(isset($_GET['noLastname'])) echo '<br />Type in lastname<br /><br />';
                    ?>
                </span>
            </div>
        </div>
        <div class="row">
        <div class="col-left">
            <label for='email'>Mail:</label>
            <input type='text' name='email' id='email' maxlength="254" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['email'] : ""; ?>"/>
            <span id="emailError" class="error">
                <?php
                if(isset($_GET['invalidMail'])) echo '<br />This was not a valid e-mail<br /><br />';
                ?>
            </span>
        </div>
        <div class="col-right">
            <label for='homeNation'>Home state:</label>
            <select name="homeNation">
                <option value="Schweiz" selected>Schweiz</option>
                <option value="Deutschland">Deutschland</option>
                <option value="Frankreich">Frankreich</option>
                <option value="USA">USA</option>
                <option value="Sonstwo">Sonstwo</option>
            </select>
            <span id="homeNationError" class="error">
                <?php 
                    if(isset($_GET['noHomeNation'])) echo 'Chose state...'; 
                ?>
            </span>
        </div>
        </div>

        <div class="row">
            <div class="col-left">
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['password'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo '<br />Passwords did not match';
                    if(isset($_GET['passwordEmpty'])) echo '<br />Password must not be empty';
                ?>
            </span>
            </div>
        </div>
        <div class="row">
            <div class="col-left">
            <label for='passwordRepeat'>Repeat password:</label>
            <input type='password' name='passwordRepeat' id='passwordRepeat' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['passwordRepeat'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo '<br />Passwords did not match';
                    if(isset($_GET['passwordRepeatEmpty'])) echo '<br />Password must not be empty';
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