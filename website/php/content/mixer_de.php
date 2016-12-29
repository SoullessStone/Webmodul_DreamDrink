 <?php
 // TODO: Add saved information for drinkname, desc
    if (!isset($_SESSION["loggedIn"]))
        header("location: ".$_SESSION["baseURL"]."Home");

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
        $ingredientList->render($this->model, $allIngredients, $usedIngredients);
    ?>
</div>
<div class="content">
    <h1>Mischer</h1>
    <h3>Hier kannst du eigene Drinks zusammenstellen.</h3>
    
    <form id='newDrink' action='' method='post' accept-charset='UTF-8'>
        <?php
            if (isset($this->model->noNameSet)) {
               echo "<p style='color:red'>Du hast vergessen, dem Drink einen Namen zu geben.</p>";
            }
            
            $content = isset($_COOKIE["input_drinkName"]) ? $_COOKIE["input_drinkName"] : "";
        ?>
        <label for='drinkName'>Name deines Drinks:</label>
        <input type='text' name='drinkName' id='drinkName' maxlength='45' onkeyup='saveInput(drinkName)' value="<?php echo $content ?>" /><br/><br/>
        <table id='mixing'>
            <?php
                foreach ($usedIngredients as $ingredient) {
                        $id = $ingredient->getId();
                        $name = $ingredient->getName();
                        $unit = $ingredient->getUnitName();

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
        <label for='drinkDescription'>Beschreibe deinen Drink:</label>
        <textarea name="drinkDescription" id="drinkDescription" onkeyup="saveInput(drinkDescription)" maxlength="500" style="width: 100%; height: 100px;"><?php echo $content ?></textarea> <br/>
        <input type='submit' name='submit' value='Vorschau anschauen'/>
    </form>
    

 </div>
<div class="rightBar">
    
</div>