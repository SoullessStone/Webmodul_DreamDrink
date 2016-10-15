<?php
$sites = array(
    "index" => array("url" => "index.php", "text" => "Home"),
    "mixer" => array("url" => "mixer.php", "text" => "Drink-Mixer"),
    "drinklist" => array("url" => "drinklist.php", "text" => "Drink-Liste"),
    "about" => array("url" => "about.php", "text" => "Über DreamDrink"),
    "login" => array("url" => "login.php", "text" => "Login")
);

?>
<header>
    <nav>
        <div class="left">
            <a href="index.php?site=index">
                <img src="../pic/logo.gif" alt="Logo">
            </a>
            <?php
            foreach ($sites as $site => $value) {
                $cssClass = "";
                if ($_GET["site"] === $site) {
                    $cssClass = "class='active'";
                }
                echo "<a href='index.php?site=$site' $cssClass>" . $sites[$site]["text"] . "</a>";
            }
            ?>
        </div>
        <div class="right">
            <a href="<?php echo $sites["login"]["url"]; ?>" <?php if (basename($_SERVER['REQUEST_URI'], '.php') === 'login') echo 'class="active"'; ?>>Login</a>
        </div>
    </nav>
</header>

<div class="blurrBox"></div>
