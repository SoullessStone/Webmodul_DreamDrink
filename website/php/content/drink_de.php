<?php
    if (! isset($_GET["id"])) {
        header("location: index.php?site=drinklist");
    }
    $detail_drink_id = $_GET["id"];
    $res = DbHelper::doQuery("select * from Drink where id = $detail_drink_id;");
    $detail_drink = $res->fetch_object("Drink");
    $imageResult = DbHelper::doQuery("select path from Image where id = (select image_id from Images_for_Drink where drink_id = $detail_drink_id);");
    $imagePath = $imageResult->fetch_assoc()["path"];
    $detailIngredients = getDetailIngredientsFromDb($detail_drink_id);

    // TODO Sabine: Bewertung ermöglichen (sehr einfach halten am Anfang)
?>
<div class="leftBar">
    <h5>Benötigte Zutaten:</h5>
    <ul>
    <?php
        foreach ($detailIngredients as $ingredient) {
            $ing_name = $ingredient->getName();
            echo "<li>$ing_name</li>";
        }
    ?>
    </ul>
</div>
<div class="content">
    <h1><?php echo $detail_drink->getName(); ?></h1>
    <div class="big_image">
        <img src="../../pic/Drinks/<?php echo $imagePath; ?>" alt="<?php echo $detail_drink->getName(); ?>" />
    </div>
    <h3>Beschreibung</h3>
    <div class="drink_description"><?php echo $detail_drink->getDescription(); ?></div>
</div>
<div class="rightBar">
    <h5>Andere neue Drinks:</h5>
</div>

<?php
    function getDetailIngredientsFromDb($drink_id) {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient where id in (select ingredient_id from Ingredients_for_Drink where drink_id = $drink_id);");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }
?>