 <?php
    $ingredients = array();
    $res = DbHelper::doQuery("select * from ingredient;");
    while($ingredient = $res->fetch_object("Ingredient")){
        array_push($ingredients, $ingredient);
    }
 ?>
<script type="text/javascript" src="../../js/mixer.js"></script>
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
    <h1>Mischer</h1>
    <h3>Hier kannst du eigene Drinks zusammenstellen.</h3>
    <div class="dragBox" ondrop="drop(event)" ondragover="allowDrop(event)">
        Zutaten hier rein ziehen
    </div>
    
    <table id='mixing'>
        <tr>
            <th>Zutat</th>
            <th>Einheiten</th>
        </tr>
    </table>
    <br/><br/><br/><br/><br/><br/>
 </div>
<div class="rightBar">
    
</div>