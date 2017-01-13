<?php
    $newestDrinkid = $this->model->getIdOfNewestDrinkWithImage();
    $recent_drink = $this->model->getDrink($newestDrinkid);
    $imagePath = $this->model->getImagePathForDrink($newestDrinkid);
    $link = $_SESSION["baseURL"]."Drink?id=".$newestDrinkid;
?>
<div class="leftBar">
    <h4>Neuster Drink:</h4>
    <a href="<?php echo $_SESSION["baseURL"]."Drink?id=".$newestDrinkid; ?>"><h3><?php echo $recent_drink->getName(); ?></h3></a>
    <div class="side_image">
        <img src="<?php echo $_SESSION["baseURL"].'/pic/Drinks/'.$imagePath; ?>" alt="<?php echo $recent_drink->getName(); ?>" />
    </div>
</div>
<div id="wrapper" class="content">
    <h1>Über uns</h1>
    <p>Wir wollen die besten Drinks!
    </p>
    
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
    consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
    diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
    sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
    duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
    nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
    duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
</div>

<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>