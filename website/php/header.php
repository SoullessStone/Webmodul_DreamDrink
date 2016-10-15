<?php
$sites = array(
    "home" => array("text_en" => "Home", "text_de" => "Zuhause"),
    "mixer" => array("text_en" => "Drink-Mixer", "text_de" => "Drink-Mischerl"),
    "drinklist" => array("text_en" => "Drink-List", "text_de" => "Drink-Liste"),
    "about" => array("text_en" => "About DreamDrink", "text_de" => "Über DreamDrink"),
    "login" => array("text_en" => "Login", "text_de" => "Einlöggerln")
);

?>
<header>
    <nav>
        <div class="left">
            <?php
            echo "<a href='index.php?site=home&lang=$language'>";
            echo "<img src='../../pic/logo.gif' alt='Logo'></a>";
            
            foreach ($sites as $site => $value) {
                if ($site === "login") {
                    continue;
                }
                $cssClass = "";
                if ($pageId === $site) {
                    $cssClass = "class='active'";
                }
                echo "<a href='index.php?site=$site&lang=$language' $cssClass>" . $sites[$site]["text_$language"] . "</a>";
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
                echo "<a href='index.php?site=login&lang=$language' $cssClass>" . $sites["login"]["text_$language"] . "</a>";
            ?> 
        </div>
    </nav>
</header>

<div class="blurrBox"></div>
