 <?php
    $allIngredients = getAllIngredientsFromDb();
    $usedIngredients = getUsedIngredients();
    addNewIngredientIfPresent($allIngredients, $usedIngredients);
    removeNewIngredientIfPresent($allIngredients, $usedIngredients);
    //unset($_SESSION["usedIngredients"]);
 ?>
 <script>
    function saveNumber(i){
        var count = document.getElementById("ing_"+i).value;
        document.cookie = "count_"+i+"="+count;
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
    
    <table id='mixing'>
        <?php
            foreach ($usedIngredients as $ingredient) {
                    $id = $ingredient->getId();
                    $name = $ingredient->getName();
                    $unit = $ingredient->getUnitName();
                    $content = isset($_COOKIE["count_$id"]) ? $_COOKIE["count_$id"] : "1";
                    echo "<tr>";
                    echo "<th>$name</th>";
                    echo "<th><input type='number' id='ing_$id' onkeyup='saveNumber($id)' value='$content' /></th>";
                    echo "<th>$unit</th>";
                    echo "<th><a href='index.php?site=mixer&removeIng=$id'>x</a></th>";
                    echo "</tr>";
            }
        ?>
    </table>
    <br/><br/><br/><br/><br/><br/>
 </div>
<div class="rightBar">
    
</div>

<?php

    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from ingredient;");
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
        $dbRes = DbHelper::doQuery("select * from unit where id = $param;");
        $unit = $dbRes->fetch_object("Unit");
        $ingredient->setUnitName($unit->getName());
        return $ingredient;
    }