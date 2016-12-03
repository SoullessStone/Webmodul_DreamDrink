<?php
    if (! isset($_GET["id"])) {
        header("location: index.php?site=drinklist");
    }
    $detail_drink_id = $_GET["id"];
    $res = DbHelper::doQuery("select * from Drink where id = $detail_drink_id;");
    $detail_drink = $res->fetch_object("Drink");
    $imageResult = DbHelper::doQuery("select path from Image where id = (select image_id from Images_for_Drink where drink_id = $detail_drink_id);");
    $imagePath = $imageResult->fetch_assoc()["path"];

    $rateRes = DbHelper::doQuery("select * from Rating where drink_id = $detail_drink_id");
    $ratingObj = $rateRes->fetch_object("Rating");
    $rateCountRes = DbHelper::doQuery("select COUNT(*) as rate_Count from Rating where drink_id = $detail_drink_id");
    $rateCount = $rateCountRes->fetch_assoc()["rate_Count"];
    if (!empty($ratingObj)) {
        $rating = $ratingObj->getRating();
    }

    // TODO Sabine: Bewertung ermöglichen (sehr einfach halten am Anfang)
?>
<div class="leftBar">
    <h5>Benötigte Zutaten:</h5>
    <ul>
    <?php

    $detailIngredients = getDetailIngredientsFromDb($detail_drink_id);
        while($ingredient = $detailIngredients->fetch_assoc()) {
            $ing_name = $ingredient["ing_name"];
            $quantity = $ingredient["quantity"];
            $unit_name = $ingredient["unit_name"];
            echo "<li>$ing_name: $quantity $unit_name</li>";
        }
    ?>
    </ul>
</div>
<div class="content">
    <h1><?php echo $detail_drink->getName(); ?></h1>
    <?php if(!empty($imagePath)) { ?>
        <div class="big_image">
            <img src="<?php echo $_SESSION["baseURL"].'/pic/Drinks/'.$imagePath ?>" alt="<?php echo $detail_drink->getName(); ?>" />
        </div>
    <?php } ?>
    <h3>Beschreibung</h3>
    <div class="drink_description"><?php echo $detail_drink->getDescription(); ?></div>

    <?php if(!empty($rating)) {
        $average_rate = $rating / $rateCount;
    print
    "<h4 >Bewertung</h4 >
    <p>Im Durchschnitt geben unsere User dem Drink: $average_rate von fünf Punkten.</p>";
    }
    ?>

    <h5>Drink bewerten</h5>
    <div class='drink_rating'>
        <h6>Bewerte diesen Drink</h6>
        <div id="rating" class="rate_widget">
            <div class="star_1 ratings_stars"></div>
            <div class="star_2 ratings_stars"></div>
            <div class="star_3 ratings_stars"></div>
            <div class="star_4 ratings_stars"></div>
            <div class="star_5 ratings_stars"></div>
            <div class="total_votes">vote data</div>
        </div>
    </div>

    <script>$('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote');
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                set_votes($(this).parent());
            }
        $('.rate_widget').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };
            $.post(
                'ratings.php',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            );
        });
        );</script>
</div>
<div class="rightBar">
    <h5>Andere neue Drinks:</h5>
</div>

<?php
    function getDetailIngredientsFromDb($drink_id) {
        $dbRes = DbHelper::doQuery("SELECT ing.name as ing_name, ifd.quantity as quantity, uni.name as unit_name FROM ingredients_for_drink ifd INNER JOIN Ingredient ing on ing.id=ifd.ingredient_id INNER JOIN Unit uni on ing.unit = uni.id WHERE ifd.drink_id =2;");
        return $dbRes;
    }
?>


