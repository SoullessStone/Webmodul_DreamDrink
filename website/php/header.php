<?php
    $sites = array(
        "home" => array("text_en" => "Home", "text_de" => "Zuhause"),
        "mixer" => array("text_en" => "Drink-Mixer", "text_de" => "Drink-Mischerl"),
        "drinklist" => array("text_en" => "Drink-List", "text_de" => "Drink-Liste"),
        "about" => array("text_en" => "About DreamDrink", "text_de" => "Über DreamDrink"),
        "login" => array("text_en" => "Login", "text_de" => "Einlöggerln"),
        "registration" => array("text_en" => "Registration", "text_de" => "Registrierung"),
        "admin" => array("text_en" => "Admin", "text_de" => "Administration")
    );
?>
<header>
    <nav>
        <div class="left">
            <?php
            echo "<a href='index.php?site=home&lang=$language'>";
            echo "<img src='../../pic/logo.gif' alt='Logo'></a>";

            foreach ($sites as $site => $value) {
                if ($site === "login" || $site === "registration") {
                    continue;
                }
                $cssClass = "";
                if ($pageId === $site) {
                    $cssClass = "class='active'";
                }
                if ($site==="admin") {
                    if(!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1)
                    { 
                        echo "<a href='index.php?site=$site&lang=$language' $cssClass>" . $sites[$site]["text_$language"] . "</a>";
                    }
                } else {
                    echo "<a href='index.php?site=$site&lang=$language' $cssClass>" . $sites[$site]["text_$language"] . "</a>";
                }
            }
            ?>
        </div>
        <div class="right">
            <?php
            $cssDe = $language === "de" ? "style='color:red'" : "";
            $cssEn = $language === "en" ? "style='color:red'" : "";
            echo "<a href='index.php?site=".$pageId."&lang=de' $cssDe>DE</a>";
            echo "<a href='index.php?site=".$pageId."&lang=en' $cssEn>EN</a>";

            $cssClass = "";
            if ($pageId === $site) {
                $cssClass = "class='active'";
            }

            if(!empty($_SESSION['loggedIn']) && !empty($_SESSION['username']))
            {  
                $username = $_SESSION['username'];
                echo "<a href='index.php?site=logout&lang=$language' $cssClass>Hallo " . $username . "!<br/>Logout</a>";
            } else
            {
                echo "<a href='index.php?site=login&lang=$language' $cssClass>" . $sites["login"]["text_$language"] . "</a>";
            }
            ?>
        </div>
    </nav>
</header>

<div class="blurrBox"></div>