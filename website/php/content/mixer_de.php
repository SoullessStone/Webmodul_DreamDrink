 <?php
 // TODO: Add saved information for drinkname, desc
    if (!isset($_SESSION["loggedIn"]))
        header("location: index.php?site=login");

    if (isset($_POST["submit"])) {
        createNewDrinkAndNavigateToIt();
    }
    $allIngredients = getAllIngredientsFromDb();
    $usedIngredients = getUsedIngredients();
    addNewIngredientIfPresent($allIngredients, $usedIngredients);
    removeNewIngredientIfPresent($allIngredients, $usedIngredients);
    //unset($_SESSION["usedIngredients"]);
 ?>
 <script>
    function saveInput(input){
        document.cookie = "input_"+input.id+"="+input.value;
        console.log(document.cookie);
    }
 </script>
 <div class="leftBar">
    <?php
        foreach ($allIngredients as $ingredient) {
            if (! isObjectWithIdInArray($usedIngredients, $ingredient->getId())) {
                $id = $ingredient->getId();
                $text = $ingredient->getName();
                echo "<label><a href='index.php?site=mixer&addIng=$id'>$text -></a></label><br/>";
            }
        }
    ?>
</div>
<div class="content">
    <h1>Mischer</h1>
    <h3>Hier kannst du eigene Drinks zusammenstellen.</h3>
    
    <form id='newDrink' action='index.php?site=mixer&saveDrink=1' method='post' accept-charset='UTF-8'>
        <?php
            if (isset($_GET["noNameSet"])) {
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
                        echo "<th><a href='index.php?site=mixer&removeIng=$id'>x</a></th>";
                        echo "</tr>";
                }
            ?>
        </table>
        <?php
            $content = isset($_COOKIE["input_drinkDescription"]) ? $_COOKIE["input_drinkDescription"] : "";
        ?>
        <label for='drinkDescription'>Beschreibe deinen Drink:</label>
        <textarea name="drinkDescription" id="drinkDescription" onkeyup="saveInput(drinkDescription)" maxlength="500" style="width: 100%; height: 100px;"><?php echo $content ?></textarea> <br/>
        <input type='submit' name='submit' value='Drink speichern'/>
    </form>
 </div>
<div class="rightBar">
    
</div>

<?php

    function createNewDrinkAndNavigateToIt() {
        if (isset($_POST["drinkName"]) && strlen($_POST["drinkName"])>0 
                && isset($_POST["drinkDescription"]) && strlen($_POST["drinkDescription"])>0) {
                $id = createDrink();
                foreach (getPostedIngredients() as $key => $value) {
                    createDrinkIngredientConnection($id, $key, $value);
                }
                unset($_SESSION["usedIngredients"]);
                header("location: index.php?site=drink&id=".$id);
            } else {
            header("location: index.php?site=mixer&noNameSet=true");
        }
    }

    function getPostedIngredients() {
        $result = array();
        foreach ($_POST as $key => $value) {
            if (substr( $key, 0, 4 ) === "ing_")
                $result[substr($key, 4, strlen($key)-1)] = $value;
        }
        return $result;
    }

    function createDrink() {
        $db = DbHelper::getInstance();
        $drinkName = $db->escape_string($_POST["drinkName"]);
        $description = $db->escape_string($_POST["drinkDescription"]);
        $username = $db->escape_string($_SESSION["username"]);
        $date = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
        echo "INSERT INTO Drink (name, description, creator, createdAt) VALUES ('$drinkName', '$description', '$username', '$date');";
        $res = DbHelper::doQuery("INSERT INTO Drink (name, description, creator, createdAt) VALUES ('$drinkName', '$description', '$username', '$date');");
        return $db->insert_id;
    }

    function createDrinkIngredientConnection($drinkid, $ingredientid, $amount) {
        $db = DbHelper::getInstance();
        $drinkid = $db->escape_string($drinkid);
        $ingredientid = $db->escape_string($ingredientid);
        $amount = $db->escape_string($amount);
        echo "INSERT INTO Ingredients_for_Drink (ingredient_id, drink_id, quantity) VALUES ($ingredientid, $drinkid, $amount);";
        $res = DbHelper::doQuery("INSERT INTO Ingredients_for_Drink (ingredient_id, drink_id, quantity) VALUES ($ingredientid, $drinkid, $amount);");
    }

    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }

    function getUsedIngredients(){
        if (isset($_SESSION["usedIngredients"])){
            return $_SESSION["usedIngredients"];
        }
        return array();
    }

    function addNewIngredientIfPresent($allIngredients, $usedIngredients) {
        if (isset($_GET["addIng"])) {
            if (isObjectWithIdInArray($allIngredients, $_GET["addIng"])){
                if (! isObjectWithIdInArray($usedIngredients, $_GET["addIng"])) {
                    $newIngredient = findItemById($allIngredients, $_GET["addIng"]);
                    $usedIngredients[] = enrichIngredientWithUnitName($newIngredient);
                    $_SESSION["usedIngredients"] = $usedIngredients;
                    header("location: index.php?site=mixer");
                }
            }
        }
    }

    function removeNewIngredientIfPresent($allIngredients, $usedIngredients) {
        if (isset($_GET["removeIng"])) {
            if (isObjectWithIdInArray($usedIngredients, $_GET["removeIng"])){
                    $ingredient = findItemById($allIngredients, $_GET["removeIng"]);
                    $_SESSION["usedIngredients"] = removeItemWithIdFromArray($usedIngredients, $_GET["removeIng"]);
                    header("location: index.php?site=mixer");
            }
        }
    }
    
    function removeItemWithIdFromArray($array, $id) {
        $result = array();
        foreach($array as $item) {
            if ($id !== $item->getId()) {
                $result[] = $item;
            }
        }
        return $result;
    }
    
    function findItemById($array, $id) {
        foreach($array as $item) {
            if ($id == $item->getId()) {
                return $item;
            }
        }
        return -1;
    }
    
    function isObjectWithIdInArray($array, $id) {
        foreach($array as $item) {
            if ($id == $item->getId()) {
                return true;
            }
        }
        return false;
    }

    function enrichIngredientWithUnitName($ingredient) {
        $res = array();
        $param = DbHelper::getInstance()->escape_string($ingredient->getUnit());
        $dbRes = DbHelper::doQuery("select * from Unit where id = $param;");
        $unit = $dbRes->fetch_object("Unit");
        $ingredient->setUnitName($unit->getName());
        return $ingredient;
    }