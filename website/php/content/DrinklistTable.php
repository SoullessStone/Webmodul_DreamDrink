<?php
    class DrinklistTable {
        private $translate = array();

        function __construct() {
            $this->translate["Zucker"] = "Sugar";
            $this->translate["Zitrone"] = "Lemon";
            $this->translate["Rosmarin"] = "Rosemary";
            $this->translate["Orangensaft"] = "Orange juice";
            $this->translate["Rahm"] = "Cream";
            $this->translate["Pfirsichlikör"] = "Peach liqueur";
            $this->translate["Minze"] = "Mint";
            $this->translate["Limette"] = "Lime";
            $this->translate["Rohrzucker"] = "Raw sugar";
            $this->translate["Zitronensaft"] = "Lemon juice";
            $this->translate["Ananassaft"] = "Ananas juice";
            $this->translate["Cranberrysaft"] = "Cranberry juice";
        }
        
        public function render($model, $lang) {
            ?>
                <div id="drinks">
                    <?php
                        foreach ($model->getAllDrinksFromDb() as $drink) {
                            $drink_id = $drink->getId();
                            $ingredients = $drink->getDetailIngredientsFromDb();
                            $link = $_SESSION["baseURL"]."Drink?id=".$drink_id;
                            $rateRes = DbHelper::doQuery("select * from Rating where drink_id = $drink_id");
                            $ratingObj = $rateRes->fetch_object("Rating");
                            $rateCountRes = DbHelper::doQuery("select COUNT(*) as rate_Count from Rating where drink_id = $drink_id");
                            $rateCount = $rateCountRes->fetch_assoc()["rate_Count"];
                            $rateSumRes = DbHelper::doQuery("select sum(rating) as rate_sum from Rating where drink_id = $drink_id");
                            $rateSum = $rateSumRes->fetch_assoc()["rate_sum"];
                            if (!empty($ratingObj)) {
                                $rating = $ratingObj->getRating();
                                $average_rate = $rateSum / $rateCount;
                            }
                            else
                                $average_rate = 'keine';

                            print
                                "<div class='container'>
                                    <div class='row'>
                                        <div class='col-left'>
                                            <a href='{$link}'><h2>{$drink->getName()}</h2></a>
                                            <p>".shortenString($drink->getDescription())."</p>
                                            <p class='creator'>{$drink->getCreator()} {$drink->getCreatedAt()}</p>
                                        </div>
                                        <div class='col-small'>
                                            <p>"
                            ;
                                             for($i = 1; $average_rate >= $i; $i++) {
                                                 print "<img src='".$_SESSION["baseURL"]."/pic/Rating/star_full.png' alt='.$average_rate.' class='img_small'/>";

                                             }
                                    print "</p>
                                        </div>
                                        <div class='col-right'>
                                            <ul>";
                                            foreach ($ingredients as $ingredient) {
                                            $text = $ingredient["ing_name"];
                                            if ($lang == "en" && isset($this->translate[$text])) {
                                                $text = $this->translate[$text];
                                            }
                                                print "<li>$text</li>";
                                            }
                                            print
                                            "</ul>
                                        </div>
                                    </div>
                                </div>";
                        } 
                    ?>
                    <br/>
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
function shortenString($input) {
    if (strlen($input)>=100) {
        return substr( $input, 0 , 100 ) . "...";
    }
    return $input;
}

?>