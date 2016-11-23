<div class="leftBar">

</div>
<div class="content">
    <h1>Alle Drinks</h1>
    <p>Alle Drinks inkl. deiner Bewertung!</p>

    Suche mit AJAX machen!
    <table id="drinks">
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td><b>Beschreibung</b></td>
                <td><b>Ersteller</b></td>
                <td><b>Bewertung</b></td>
            </tr>
            <?php
                foreach (getAllDrinksFromDb() as $drink) {
                    echo "<tr>";
                    echo "    <td>".$drink->getName()."</td>";
                    echo "    <td>".$drink->getDescription()."</td>";
                    echo "    <td>".$drink->getCreator()."</td>";
                    echo "    <td>TODO</td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>

</div>
<div class="rightBar">
    
</div>

<?php
    function getAllDrinksFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from drink;");
        while($drink = $dbRes->fetch_object("Drink")){
            array_push($res, $drink);
        }
        return $res;
    }
?>