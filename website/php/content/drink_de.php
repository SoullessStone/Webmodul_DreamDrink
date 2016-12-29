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
<div id="wrapper" class="content">
    <h1><?php echo $detail_drink->getName(); ?></h1>
    <?php if(!empty($imagePath)) { ?>
        <div class="big_image">
            <img src="<?php echo $_SESSION["baseURL"].'/pic/Drinks/'.$imagePath ?>" alt="<?php echo $detail_drink->getName(); ?>" class="lightbox_trigger" />
        </div>
    <?php } ?>
    <h3>Beschreibung</h3>
    <div class="drink_description"><p><?php echo $detail_drink->getDescription(); ?></p></div>

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
        <fieldset id='demo1' class="rating">
            <input class="stars" type="radio" id="star5" name="rating" value="5" />
            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input class="stars" type="radio" id="star4" name="rating" value="4" />
            <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input class="stars" type="radio" id="star3" name="rating" value="3" />
            <label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input class="stars" type="radio" id="star2" name="rating" value="2" />
            <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input class="stars" type="radio" id="star1" name="rating" value="1" />
            <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        </fieldset>
    </div>

    <script>
        jQuery(document).ready(function($) {

            $('.lightbox_trigger').click(function(e) {

                //prevent default action (hyperlink)
                e.preventDefault();

                //Get clicked link href
                var image_ref = $(this).attr("src");

                /*
                 If the lightbox window HTML already exists in document,
                 change the img src to to match the href of whatever link was clicked

                 If the lightbox window HTML doesn't exists, create it and insert it.
                 (This will only happen the first time around)
                 */

                if ($('#lightbox').length > 0) { // #lightbox exists

                    //place href as img src value
                    $('#content').html('<img src="' + image_ref + '" />');

                    //show lightbox window - you could use .show('fast') for a transition
                    $('#lightbox').show();
                }

                else { //#lightbox does not exist - create and insert (runs 1st time only)

                    //create HTML markup for lightbox window
                    var lightbox =
                        '<div id="lightbox">' +
                        '<p>X</p>' +
                        '<div id="lightbox_content">' + //insert clicked link's href into img src
                        '<img src="' + image_ref +'" />' +
                        '</div>' +
                        '</div>';

                    //insert lightbox HTML into page
                    $('body').append(lightbox);
                }

            });

            //Click anywhere on the page to get rid of lightbox window
            $('#lightbox').live('click', function() { //must use live, as the lightbox element is inserted into the DOM
                $('#lightbox').hide();
            });

        });


        $(document).ready(function () {
            $("#demo1 .stars").click(function () {

                $.post('rating.php',{rate:$(this).val()},function(d){
                    if(d>0)
                    {
                        alert('You already rated');
                    }else{
                        alert('Thanks For Rating');
                    }
                });
                $(this).attr("checked");
            });
        });
    </script>

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


