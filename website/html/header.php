<?php
$sites = array(
    "index" => array("url" => "index.php", "text" => ""),
    "mixer" => array("url" => "mixer.php", "text" => "Drink-Mixer"),
    "drinklist" => array("url" => "drinklist.php", "text" => "Drink-Liste"),
    "about" => array("url" => "about.php", "text" => "Über DreamDrink"),
    "login" => array("url" => "login.php", "text" => "Login")
);

?>
<header>
    <nav>
        <div class="left">
            <a href="<?php echo $sites["index"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') === 'index') echo 'class="active"'; ?>>
                <img src="../pic/logo.gif" alt="Logo">
            </a>
            <a href="<?php echo $sites["mixer"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') ===  'mixer') echo 'class="active"'; ?>>Mixer</a>
            <a href="<?php echo $sites["drinklist"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') === 'drinklist') echo 'class="active"'; ?>>Drink
                Liste</a>
            <a href="<?php echo $sites["about"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') === 'about') echo 'class="active"'; ?>>Über
                DreamDrink</a>
        </div>
        <div class="right">
            <a href="<?php echo $sites["login"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') === 'login') echo 'class="active"'; ?>>Login</a>
        </div>
    </nav>
</header>


<div class="wrapper">
    <div class="blurrBox"></div>