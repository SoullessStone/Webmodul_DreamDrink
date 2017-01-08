<?php
    $translate = array();
    $translate["Zucker"] = "Sugar";
    $translate["Zitrone"] = "Lemon";
    $translate["Rosmarin"] = "Rosemary";
    $translate["Orangensaft"] = "Orange juice";
    $translate["Rahm"] = "Cream";
    $translate["Pfirsichlikör"] = "Peach liqueur";
    $translate["Minze"] = "Mint";
    $translate["Limette"] = "Lime";
    $translate["Rohrzucker"] = "Raw sugar";
    $translate["Zitronensaft"] = "Lemon juice";
    $translate["Ananassaft"] = "Ananas juice";
    $translate["Cranberrysaft"] = "Cranberry juice";
    $translateUnit = array();
    $translateUnit["Einheit"] = "unit";
    $translateUnit["Stück"] = "piece";
    $translateUnit["Gramm"] = "gram";
    $translateUnit["Deziliter"] = "deciliter";
    $translateUnit["Zentiliter"] = "centiliter";
?>
<div class="leftBar">
    <h5>Ingredients:</h5>
    <ul>
    <?php
        $allIngredients = $this->model->getAllIngredientsFromDb();

        foreach ($_SESSION["ingredients"] as $key=>$value) {
            if ($this->model->isObjectWithIdInArray($allIngredients, $key)) {
                $curIngredient = $this->model->findItemById($allIngredients, $key);
                $this->model->enrichIngredientWithUnitName($curIngredient);
                $ingname = $curIngredient->getName();
                if ($this->lang == "en" && isset($translate[$ingname])) {
                    $ingname = $translate[$ingname];
                }
                $unitname = $curIngredient->getUnitName();
                if ($this->lang == "en" && isset($translateUnit[$unitname])) {
                    $unitname = $translateUnit[$unitname];
                }
                echo $ingname . " - " . $value . " " . $unitname . "<br/>";
            }
        }
    ?>
    </ul>
</div>
<div id="wrapper" class="content">

     <?php
        echo "<p><img src='".$_SESSION["baseURL"]."pic/save.png' alt='Save' style='width:2%;'> <a href='".$_SESSION["baseURL"]."CreateDrink?action=persist"."'>All rigth - save!</a><br/>";
        echo "<a href='".$_SESSION["baseURL"]."Mixer"."'>Something's missing, back to the mixer!</a></p>";
    ?>

    <h1><?php echo $_SESSION["drinkName"]; ?></h1>
    <h3>Description</h3>
    <div class="drink_description"><p><?php echo $_SESSION["drinkDescription"]; ?></p></div>


    <div class='drink_rating'>
        <h5>Rate this drink</h5>
        <fieldset id='demo1' class="rating">
            <input class="stars" type="radio" id="star5" name="rating" value="5" />
            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input class="stars" type="radio" id="star4" name="rating" value="4" />
            <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input class="stars" type="radio" id="star3" name="rating" value="3" />
            <label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input class="stars" type="radio" id="star2" name="rating" value="2" />
            <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input class="stars" type="radio" id="star1" name="rating" value="1" />
            <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        </fieldset>
    </div><br/><br/>
    <p>On average, this drink is rated: 5/5 Stars.</p>
</div>
<div class="rightBar">
</div>


