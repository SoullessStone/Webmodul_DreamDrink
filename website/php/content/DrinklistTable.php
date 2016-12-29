<?php
    class DrinklistTable {
        public function render($model) {
            ?>
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
                            $imglink = $_SESSION["baseURL"]."/pic/recommend_drink.png";
                            foreach ($model->getAllDrinksFromDb() as $drink) {
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
                                echo "    <td>".$average_rate."<img src='$imglink' class='recommend_drink'/></td>";
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
            <?php 
        }
}
?>