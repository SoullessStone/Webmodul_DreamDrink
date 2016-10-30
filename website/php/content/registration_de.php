<div class="content">
    <?php include('registration_validation.php') ?>
    <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <label for='username'>UserName:</label>
            <input type='text' name='username' id='username' maxlength="50" value="<?php echo $name; ?>"/>
            <mark><?php echo $error_username; ?></mark>
            <br />
            <label for='email'>E-Mail:</label>
            <input type='text' name='email' id='email' maxlength="50" value="<?php echo $email; ?>"/>
            <mark><?php echo $error_email; ?></mark>
            <br />
            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50"/>
            <br />
            <input type='submit' name='Submit' value='Submit'/>
        </fieldset>
    </form>
</div>