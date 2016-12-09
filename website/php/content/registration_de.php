<div class="leftBar">

</div>
<div class="content">
    <form id='registration' method='post' action='' accept-charset='UTF-8'>
        <fieldset>
            <legend>Registrierung</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            
            <label for='username'>Benutzername:</label>
            <input type='text' name='username' id='username' maxlength="50" value="<?php isset($username) ? $username : ''; ?>" required />
            <span class="error"><?php echo $error_username; ?></span>

            <label for='password'>Passwort:</label>
            <input type='password' name='password' id='password' maxlength="50" required />
            <span class="error"><?php echo $error_password; ?></span>
        
            <label for='password_repeat'>Passwort wiederholen:</label>
            <input type='password' name='password_repeat' id='password_repeat' maxlength="50" required />
            <span class="error"><?php echo $error_password_repeat; ?></span>
    
            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
</div>
<div class="rightBar">
    
</div>