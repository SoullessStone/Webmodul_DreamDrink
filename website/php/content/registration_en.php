<div class="leftBar">

</div>
<div class="content">
    <form id='registration' method='post' action='' accept-charset='UTF-8'>
        <fieldset>
            <legend>Registration</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            
            <label for='username'>Username:</label>
    
            <input type='text' name='username' id='username' maxlength="50" value="<?php isset($username) ? $username : ''; ?>" required />
            <mark><?php echo $error_username; ?></mark>
        
            <label for='email'>Mail:</label>

            <input type='email' name='email' id='email' maxlength="50" value="<?php isset($email) ? $email : ''; ?>" required />
            <mark><?php echo $error_email; ?></mark>
    
            <label for='password'>Password:</label>
    
            <input type='password' name='password' id='password' maxlength="50" required />
            <mark><?php echo $error_password; ?></mark>
        
            <label for='password_repeat'>Repeat Password:</label>
        
            <input type='password' name='password_repeat' id='password_repeat' maxlength="50" required />
            <mark><?php echo $error_password_repeat; ?></mark>
    
            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>