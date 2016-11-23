 <?php
    $ingredients = array();
    $res = DbHelper::doQuery("select * from ingredient;");
    while($ingredient = $res->fetch_object("Ingredient")){
        array_push($ingredients, $ingredient);
    }
 ?>
 <div class="leftBar">
    <?php
        foreach ($ingredients as $ingredient) {
            $id = $ingredient->getId();
            $text = $ingredient->getName();
            echo "<label draggable='true' ondragstart='drag(event)' id='ing$id'>$text</label><br/>";
        }
    ?>
</div>
<div class="content">
    <h1>Mixer</h1>
    <h3>Create your own drinks and share them!</h3>
    <div class="dragBox" ondrop="drop(event)" ondragover="allowDrop(event)">
        Drag ingredients here
    </div>
    
    <table id='mixing'>
        <tr>
            <th>Ingredient</th>
            <th>Unity</th>
        </tr>
    </table>
    <br/><br/><br/><br/><br/><br/>
 </div>
<div class="rightBar">
    
</div>