<?php
    $id = htmlspecialchars($_GET["id"]);
    if (! isset($id)) {
        header("location: ".$_SESSION["baseURL"]."Drinklist");
    }
   $detail_drink = $this->model->getDrinkById($id);
   if (!isset($detail_drink)) {
        header("location: ".$_SESSION["baseURL"]."Drinklist");
   }
   $imagePath = $this->model->getImagePath($detail_drink->getId());
   

    // TODO Sabine: Bewertung ermöglichen (sehr einfach halten am Anfang)
?>
<div class="leftBar">
    <h5>Benötigte Zutaten:</h5>
    <ul>
    <?php

    $detailIngredients = $this->model->getDetailIngredientsFromDb($detail_drink->getId());
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

    <?php 
        if (isset($_SESSION["username"])) {
            $userrating = $this->model->getRatingForDrinkAndUser($detail_drink->getId(), $_SESSION["username"]);
            if (isset($userrating)) {
                echo "<p>Du hast den Drink bewertet: " . $userrating->getRating() . "/5 Sternen</p>";
            } else {
    ?>
                <div class='drink_rating'>
                    <h5>Bewerte diesen Drink</h5>
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
            <br/>
    <?php 
            }
        }
    ?>
    <?php 
        $sumOfAllRatings =  $this->model->getRatingSumForDrink($id);
        $rateCount =  $this->model->getRatingCountForDrink($id);
        if ($rateCount != 0){
            $average_rate = $sumOfAllRatings / $rateCount;
            print "<p>Im Durchschnitt geben unsere User dem Drink: $average_rate von fünf Punkten.</p>";
        } else {
            echo "<br/><p>Noch keine Bewertungen abgegeben.</p>";
        }
    ?>
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

                var path = document.getElementById("ajaxurl").value + $(this).val();
                $.get(path, function(data){
                    location.reload();
                });
                $(this).attr("checked");
            });
        });
    </script>
    <input hidden id="ajaxurl" type="text" value="<?php echo $_SESSION["baseURL"]."php/ajax/createRating.php?user=".$_SESSION['username']."&drinkId=".$_GET["id"]."&rating="; ?>">

</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>


