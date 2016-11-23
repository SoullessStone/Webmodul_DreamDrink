<?php
    removeNewIngredientIfPresent();
?>

<div class="leftBar">

</div>
<div class="content">
    <h1>Admin</h1>
    <p>Administriere alles!</p>

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
        }
    }
?>