<div class="leftBar">

</div>
<div class="content">
    <h1>Login</h1>
    <form id='login' action='' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <label for='username'>Username:</label>
            <input type='text' name='username' id='username' maxlength="50"/>
            <mark><?php echo $error_username; ?></mark>
            <br />

            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' maxlength="50"/>
            <br />

            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>
    <br/>
    <a href="<?php echo $_SESSION['baseURL'].'Registration'; ?>">Not a member yet? Register here!</a>
</div>
<div class="rightBar">

</div>