<?php
    $res = DbHelper::doQuery("select * from Drink where id = 1;");
    $recent_drink = $res->fetch_object("Drink");
    $recent_drink_id = $recent_drink->getId();
    $imageResult = DbHelper::doQuery("select path from Image where id = (select image_id from Images_for_Drink where drink_id = 1);");
    $imagePath = $imageResult->fetch_assoc()["path"];
    $link = $_SESSION["baseURL"]."Drink?id=".$recent_drink_id;
?>
<div class="leftBar">
    <h4>Neuster Drink:</h4>
    <a href="<?php echo $_SESSION["baseURL"]."Drink?id=".$recent_drink_id; ?>"><h3><?php echo $recent_drink->getName(); ?></h3></a>
    <div class="side_image">
        <img src="<?php echo $_SESSION["baseURL"].'/pic/Drinks/'.$imagePath; ?>" alt="<?php echo $recent_drink->getName(); ?>" />
    </div>

</div>
<div class="content">
    <h1>DE</h1>
  <p>Homehomehome</p>


</div>
<div class="rightBar">
    
</div>