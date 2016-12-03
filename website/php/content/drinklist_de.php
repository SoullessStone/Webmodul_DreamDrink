<div class="leftBar">
    <h4>Suche Drinks nach Inhalt:</h4>
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
                    $drink_id = $drink->getId();
                    $link = $_SESSION["baseURL"]."Drink?id=".$drink_id;
                    $rateRes = DbHelper::doQuery("select * from Rating where drink_id = $drink_id");
                    $ratingObj = $rateRes->fetch_object("Rating");
                    $rateCountRes = DbHelper::doQuery("select COUNT(*) as rate_Count from Rating where drink_id = $drink_id");
                    $rateCount = $rateCountRes->fetch_assoc()["rate_Count"];
                    if (!empty($ratingObj)) {
                        $rating = $ratingObj->getRating();
                        $average_rate = $rating / $rateCount;
                    }
                    else
                        $average_rate = 'keine';

                    echo "<tr>";
                    echo "    <td><a href='$link'>".$drink->getName()."</a></td>";
                    echo "    <td>".$drink->getDescription()."</td>";
                    echo "    <td>".$drink->getCreator()."</td>";
                    echo "    <td>".$drink->getCreatedAt()."</td>";
                    echo "    <td>".$average_rate."</td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>

</div>
<div class="rightBar">
    <h4>Beliebteste Drinks</h4>
</div>