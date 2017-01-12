<div class="leftBar">
    <?php
    ?>
</div>
<div class="content">
    <h1>Registration</h1>
    <?php
        if (isset($_GET["error"])) {
    ?>
        <span id="error" class="error">A general error occurred, please try again later.</span>
    <?php
        }
    ?>
    <form id='login' name="regForm" action='' method='post' accept-charset='UTF-8'>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <p>
            <label for='username'>User Name:</label>
            <input type='text' name='username' id='username' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['username'] : ""; ?>"/>
            <span id="usernameError" class="error">
                <?php 
                    if(isset($_GET['noUsername'])) echo 'Please insert a user name';
                    if(isset($_GET['usernameAlreadyExists'])) echo 'The name is already in use, please choose another.';
                ?>
            </span>
        </p>
        <p>
            <label for='firstname'>First Name:</label>
            <input type='text' name='firstname' id='firstname' maxlength="30" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['firstname'] : ""; ?>"/>
            <span id="firstnameError" class="error">
                <?php 
                    if(isset($_GET['noFirstname'])) echo 'Please insert your first name';
                ?>
            </span>
        </p>
        <p>
            <label for='lastname'>Last Name:</label>
            <input type='text' name='lastname' id='lastname' maxlength="45" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['lastname'] : ""; ?>"/>
            <span id="lastnameError" class="error">
                <?php 
                    if(isset($_GET['noLastname'])) echo 'Please insert your last name';
                ?>
            </span>
        </p>
        <p>
            <label for='homeNation'>Home Country:</label>
            <select name="homeNation">
                <option value="Schweiz" selected>Switzerland</option>
                <option value="Deutschland">Germany</option>
                <option value="Frankreich">France</option>
                <option value="USA">USA</option>
                <option value="Sonstwo">Somewhere else</option>
            </select>
            <span id="homeNationError" class="error">
                <?php 
                    if(isset($_GET['noHomeNation'])) echo 'Please choose your home country';
                ?>
            </span>
        </p>
        <p>
            <label for='email'>E-Mail:</label>
            <input type='text' name='email' id='email' maxlength="254" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['email'] : ""; ?>"/>
            <span id="emailError" class="error">
                <?php 
                    if(isset($_GET['invalidMail'])) echo 'Please insert a valid E-Mail Address';
                ?>
            </span>
        </p>
        <p>
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['password'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo "The passwords didn't match, please try again.";
                    if(isset($_GET['passwordEmpty'])) echo "Please insert a password.";
                ?>
            </span>
        </p>
        <p>
            <label for='passwordRepeat'>Password repeat:</label>
            <input type='password' name='passwordRepeat' id='passwordRepeat' maxlength="50" value="<?php echo isset($_SESSION['registration_data']) ? $_SESSION['registration_data']['passwordRepeat'] : ""; ?>"/>
            <span id="passwordError" class="error">
                <?php 
                    if(isset($_GET['passwordsNotEqual'])) echo "The passwords didn't match, please try again.";
                    if(isset($_GET['passwordRepeatEmpty'])) echo "Please insert a password.";
                ?>
            </span>
        </p>

        <input type='submit' name='submit' value='Submit'/>
    </form>
    <br/>
    <p><a href="<?php echo $_SESSION['baseURL'].'Registration'; ?>">No account yet? Register here!</a></p>
</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>