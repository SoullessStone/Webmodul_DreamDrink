<?php
    checkIfUserIsAdmin();
?>

<div class="leftBar">

</div>
<div class="content">
    <h1>Admin</h1>
    <p>Administriere alles!</p>

    <form id='addIngredient' action='' method='post' accept-charset='UTF-8'>
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
                                    foreach ($this->model->getAllUnitsFromDb() as $unit) {
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
                foreach ($this->model->getAllIngredientsFromDb() as $drink) {
                    $used = $this->model->isIngredientUsed($drink->getId());
                    echo "<tr>";
                    echo "    <td>".$drink->getName()."</td>";
                    echo "    <td>".$drink->getUnit()."</td>";
                    if ($used) {
                        echo "    <td>Nicht löschbar: Wird verwendet</td>";
                    } else {
                        echo "    <td><a href='".$_SESSION["baseURL"]."Admin/removeIng=".$drink->getId()."'>Löschen</a></td>";
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
        if (! (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]==1)) {
            header("Location: ./Login");
        }
    }

?>