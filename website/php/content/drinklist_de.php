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
            $link = $_SESSION["baseURL"]."/pic/recommend_drink.png";
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
                    echo "    <td>".$average_rate."<img src='<?php echo $link; ?>' class='recommend_drink'/></td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">x</span>
            <h3>Empfehle diesen Drink einem Freund!</h3>
            <p>Einfach hier seine E-Mail-Adresse eintragen:</p>
            <input type="text">
            <p class="remark">Wir werden einzig diesen Drink verschicken, keinen Spam.</p>
        </div>

    </div>
</div>
<div class="rightBar">
    <h4>Beliebteste Drinks</h4>
</div>
<script>
    var modal = document.getElementById("modal");
    var elem = document.getElementsByClassName("recommend");
    var span = document.getElementsByClassName("close")[0];

    elem.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>