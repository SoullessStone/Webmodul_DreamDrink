<?php
    $newestDrinkid = $this->model->getIdOfNewestDrinkWithImage();
    $recent_drink = $this->model->getDrink($newestDrinkid);
    $imagePath = $this->model->getImagePathForDrink($newestDrinkid);
    $link = $_SESSION["baseURL"]."Drink?id=".$newestDrinkid;
?>
<div class="leftBar">
    <h4>Neuster Drink</h4>
    <a href="<?php echo $_SESSION["baseURL"]."Drink?id=".$newestDrinkid; ?>"><h3><?php echo $recent_drink->getName(); ?></h3></a>
    <div class="side_image">
        <img src="<?php echo $_SESSION["baseURL"].'/pic/Drinks/'.$imagePath; ?>" alt="<?php echo $recent_drink->getName(); ?>" />
    </div>
</div>
<div class="content" id="wrapper">
    <h1>Willkommen bei DreamDrink!</h1>
  <p style="text-align:center">
  <img src="<?php echo $_SESSION["baseURL"].'/pic/drinks.jpg'; ?>" alt="Drinks" style="width:100%"/><br/><br/>
    <?php
        echo "Wir haben " . $this->model->getDrinkCount() . " Drinks!<br/><br/>";
        echo "Gemacht aus " . $this->model->getIngredientCount() . " Zutaten!<br/><br/>";
        echo "Erstellt von " . $this->model->getUserCount() . " Benutzer!<br/><br/>";
    ?>
  </p>


</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>