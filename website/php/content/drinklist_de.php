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
                <td><b>Erstelldatum</b></td>
                <td><b>Bewertung</b></td>
            </tr>
            <?php
                foreach ($this->model->getAllDrinksFromDb() as $drink) {
                    $link = "index.php?site=drink&id=".$drink->getId();
                    echo "<tr>";
                    echo "    <td><a href='$link'>".$drink->getName()."</a></td>";
                    echo "    <td>".$drink->getDescription()."</td>";
                    echo "    <td>".$drink->getCreatedAt()."</td>";
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