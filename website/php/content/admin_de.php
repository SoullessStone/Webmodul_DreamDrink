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
<br/><br/><br/><br/>
    <form id='addImage' action='' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Bild einem Drink zuordnen</legend>
            <input type='hidden' name='submittedAddimage' id='submittedAddimage' value='1'/>
                <?php
                    $getParam = isset($_GET["failed"]) ? htmlspecialchars($_GET["failed"]) : "";
                    if (isset($getParam) && $getParam != "") {
                        echo '<span id="downloadError" class="error">Fehler beim Download des Bildes von der URL</span>';
                    }
                ?>
                <table>
                    <tr>
                        <td>
                            <label for='url'>URL:</label>
                        </td>
                        <td>
                            <input type='text' name='url' id='url' placeholder="http://www.web.ch/image.png"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for='imageName'>Bild-Name:</label>
                        </td>
                        <td>
                            <input type='text' name='imageName' id='imageName' maxlength="45" placeholder="image.png"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Drink:</label>
                        </td>
                        <td>
                            <select name='drink' id='drink' >
                                <?php 
                                    $allDrinks = $this->model->getAllDrinksFromDb();
                                    usort($allDrinks, function($a, $b)
                                    {
                                        return strcmp(strtolower($a->getName()), strtolower($b->getName()));
                                    });
                                    foreach ($allDrinks as $drink) {
                                        echo "<option value='".$drink->getId()."'>'".$drink->getName()."' von " . $drink->getCreator() . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            <input type='submit' name='submit' value='Submit'/>
        </fieldset>
    </form>

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