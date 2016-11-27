<?php
    removeNewIngredientIfPresent();
    addNewIngredientIfPossible();
    checkIfUserIsAdmin();
?>

<div class="leftBar">

</div>
<div class="content">
    <h1>Admin</h1>
    <p>Administriere alles!</p>

    <form id='addIngredient' action='index.php?site=admin&add=true' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Neue Zutat hinzufügen</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>

                <table>
                    <tr>
                        <td>
                            <label for='name'>Name:</label>
                        </td>
                        <td>
                            <input type='text' name='name' id='name' maxlength="25"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for='imagepath'>Bild-Name:</label>
                        </td>
                        <td>
                            <input type='text' name='imagepath' id='imagepath' maxlength="45"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Einheit:</label>
                        </td>
                        <td>
                            <select name='unit' id='unit' >
                                <?php 
                                    foreach (getAllUnitsFromDb() as $unit) {
                                        echo "<option value='".$unit->getId()."'>".$unit->getName()."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>

    <br/><br/>
    <table id="ingredients">
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td><b>Einheit</b></td>
                <td><b>Aktionen</b></td>
            </tr>
            <?php
                foreach (getAllIngredientsFromDb() as $drink) {
                    $used = isIngredientUsed($drink->getId());
                    echo "<tr>";
                    echo "    <td>".$drink->getName()."</td>";
                    echo "    <td>".$drink->getUnit()."</td>";
                    if ($used) {
                        echo "    <td>Nicht löschbar: Wird verwendet</td>";
                    } else {
                        echo "    <td><a href='index.php?site=admin&removeIng=".$drink->getId()."'>Löschen</a></td>";
                    }
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>

</div>
<div class="rightBar">
    
</div>

<?php
    function checkIfUserIsAdmin() {
        if (! (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]===1)) {
            header("Location: index.php?site=home");
        }
    }

    function addNewIngredientIfPossible() {
        if (isset($_GET["add"])) {
            $db = DbHelper::getInstance();
            $name = $db->escape_string($_POST["name"]);
            $image_path = $db->escape_string($_POST["imagepath"]);
            $unit_id = $db->escape_string($_POST["unit"]);
            echo "INSERT INTO ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);";
            $res = DbHelper::doQuery("INSERT INTO ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);");    
        }
    }

    function getAllUnitsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from unit;");
        while($ingredient = $dbRes->fetch_object("Unit")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function isIngredientUsed($id) {
        $dbRes = DbHelper::doQuery("SELECT id FROM ingredient where id IN (SELECT DISTINCT ingredient_id FROM ingredients_for_drink) and id=$id;");
        return ! ($dbRes->num_rows === 0);        
    }

    function removeNewIngredientIfPresent() {
        if (isset($_GET["removeIng"])) {
            if (isIngredientUsed($_GET["removeIng"])) {
                return;
            }
            $db = DbHelper::getInstance();
            $ingId = $db->escape_string($_GET["removeIng"]);
            $db = DbHelper::getInstance();
            $res = DbHelper::doQuery("delete from ingredient where id = '$ingId';");
            if ($res instanceof DbError) {
                echo $res.getError();
            } else {
                echo "noerror";
            }
            header("Location: index.php?site=admin");
        }
    }
?>