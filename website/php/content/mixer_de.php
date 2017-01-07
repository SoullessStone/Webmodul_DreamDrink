 <?php
    if (!isset($_SESSION["loggedIn"]))
        header("location: ".$_SESSION["baseURL"]."Home");

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

    $allIngredients = $this->model->getAllIngredientsFromDb();
    $usedIngredients = $this->model->getUsedIngredients();
    //unset($_SESSION["usedIngredients"]);
 ?>
 <script>
    function saveInput(input){
        console.log("input_"+input.id+"="+input.value);
        document.cookie = "input_"+input.id+"="+input.value;
        console.log(document.cookie);
    }
 </script>
 <div class="leftBar">
    <?php
        $ingredientList = new IngredientList();
        $ingredientList->render($this->model, $allIngredients, $usedIngredients, $this->lang);
    ?>
</div>
<div id="mixwrapper" class="content">
    <h1>Mischer</h1>
    <h3>Hier kannst du eigene Drinks zusammenstellen.</h3>
    
    <form id='newDrink' action='' method='post' accept-charset='UTF-8'>
        <?php
            if (isset($this->model->noNameSet)) {
               echo "<p style='color:red'>Du hast vergessen, dem Drink einen Namen zu geben.</p>";
            }
            
            $content = isset($_COOKIE["input_drinkName"]) ? $_COOKIE["input_drinkName"] : "";
        ?>
        <label for='drinkName'><h4>Name deines Drinks:</h4></label>
        <input type='text' name='drinkName' id='drinkName' maxlength='45' onkeyup='saveInput(drinkName)' value="<?php echo $content ?>" /><br/><br/>
        <h4>Zutaten (links auswählen):</h4>
        <table id='mixing'>
            <?php
                foreach ($usedIngredients as $ingredient) {
                        $id = $ingredient->getId();
                        $name = $ingredient->getName();
                        $unit = $ingredient->getUnitName();
                        if ($this->lang == "en" && isset($translate[$name])) {
                            $name = $translate[$name];
                        }
                        if ($this->lang == "en" && isset($translateUnit[$unit])) {
                            $unit = $translateUnit[$unit];
                        }

                        $inputId = "ing_$id";
                        $content = isset($_COOKIE["input_".$inputId]) ? $_COOKIE["input_".$inputId] : "1";
                        echo "<tr>";
                        echo "<th>$name</th>";
                        echo "<th><input type='number' name='$inputId' id='$inputId' onkeyup='saveInput($inputId)' value='$content' /></th>";
                        echo "<th>$unit</th>";
                        echo "<th><a href='".$_SESSION["baseURL"]."Mixer/removeIngredient=$id'>x</a></th>";
                        echo "</tr>";
                }
            ?>
        </table>
        <?php
            $content = isset($_COOKIE["input_drinkDescription"]) ? $_COOKIE["input_drinkDescription"] : "";
        ?>
        <label for='drinkDescription'><h4>Beschreibe deinen Drink:</h4></label>
        <textarea name="drinkDescription" id="drinkDescription" onkeyup="saveInput(drinkDescription)" maxlength="500"><?php echo $content ?></textarea> <br/>
        <input type='submit' name='submit' value='Vorschau anschauen'/>
    </form>
    

 </div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>