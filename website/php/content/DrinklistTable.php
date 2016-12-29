<?php
    class DrinklistTable {
        public function render($model) {
            ?>
                <div id="drinks">
                    <?php
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

                            print
                                "<div class='container'>
                                    <div class='row'>
                                        <div class='col-left'>
                                            <a href='{$link}'><h2>{$drink->getName()}</h2></a>
                                            <p>{$drink->getDescription()}</p>
                                            <p class='creator'>{$drink->getCreator()} {$drink->getCreatedAt()}</p>
                                        </div>
                                        <div class='col-small'>
                                            <p>$average_rate <img src='pic/recommend_drink.png' class='recommend_drink'/></p>
                                        </div>
                                        <div class='col-right'><p>Benötigte Zutaten:</p></div>
                                    </div>
                                </div>";
                        } 
                    ?>
                </div>
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

<?php
    function getDetailIngredientsFromDb($drink_id) {
    $dbRes = DbHelper::doQuery("SELECT ing.name as ing_name, ifd.quantity as quantity, uni.name as unit_name FROM ingredients_for_drink ifd INNER JOIN Ingredient ing on ing.id=ifd.ingredient_id INNER JOIN Unit uni on ing.unit = uni.id WHERE ifd.drink_id =2;");
    return $dbRes;
    }
?>