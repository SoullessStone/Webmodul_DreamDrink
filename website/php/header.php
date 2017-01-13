<?php
    $sites = array(
        "Mixer" => array("text_en" => "Drink-Mixer", "text_de" => "Drink-Mischer"),
        "Drinklist" => array("text_en" => "All drinks", "text_de" => "Alle Drinks"),
        "About" => array("text_en" => "About DreamDrink", "text_de" => "Über DreamDrink"),
        "Login" => array("text_en" => "Login", "text_de" => "Anmelden"),
        "Registration" => array("text_en" => "Registration", "text_de" => "Registrierung"),
        "Admin" => array("text_en" => "Admin", "text_de" => "Admin")
    );
?>
<header>
    <nav>
        <div class="left">
            <?php
                echo "<a href='./Home'>";
                echo "<img src='".$_SESSION["baseURL"]."pic/logo.png' alt='Logo'></a>";

                foreach ($sites as $site => $value) {
                    if ($site === "Login" || $site === "Registration") {
                        continue;
                    }
                    if ($site === "Mixer" && !isset($_SESSION["loggedIn"])) {
                        continue;
                    }
                    $cssClass = "";
                    if ($pageId === $site) {
                        $cssClass = "class='active'";
                    }
                    if ($site==="Admin") {
                        if(!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1)
                        { 
                            echo "<a href='".$_SESSION["baseURL"]."$site' $cssClass>" . $sites[$site]["text_$language"] . "</a>";
                        }
                    } else {
                        echo "<a href='".$_SESSION["baseURL"]."$site' $cssClass>" . $sites[$site]["text_$language"] . "</a>";
                    }
                }
            ?>
        </div>
        <div class="right">
            <?php
            $cssDe = $language === "de" ? "class='selectedLang'" : "";
            $cssEn = $language === "en" ? "class='selectedLang'" : "";
            $drinkid = "";
            if ($pageId === "Drink") {
                $drinkid = $_GET["id"];
            }
            echo "<a href='".$_SESSION['baseURL'].$pageId."?lang=de&id=$drinkid' $cssDe>DE</a>";
            echo "<a href='".$_SESSION['baseURL'].$pageId."?lang=en&id=$drinkid' $cssEn>EN</a>";

            $cssClass = "";
            if ($pageId === $site) {
                $cssClass = "class='active'";
            }

            if(!empty($_SESSION['loggedIn']) && !empty($_SESSION['username']))
            {  
                $username = $_SESSION['username'];
                echo "<a href='".$_SESSION["baseURL"]."Logout' $cssClass>Hallo " . $username . "!<br/>Logout</a>";
            } else
            {
                echo "<a href='".$_SESSION["baseURL"]."Login' $cssClass>" . $sites["Login"]["text_$language"] . "</a>";
            }
            ?>
        </div>
    </nav>
</header>

<div class="blurrBox"></div>