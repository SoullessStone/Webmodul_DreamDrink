<div class="leftBar">

</div>
<div class="content">
    <h1>Login</h1>
    <form id='login' action='' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <label for='username'>Benutzername:</label>
            <input type='text' name='username' id='username' maxlength="50"/>
            <span class="error"><?php echo $error_username; ?></span>
            <br />

            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50"/>
            <span class="error"><?php echo $error_password; ?></span>
            <br />

            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
    <br/>
    <a href="<?php echo $_SESSION['baseURL'].'Registration'; ?>">Noch kein Account? Hier registrieren!</a>
</div>
<div class="rightBar">

</div>