 <?php
    $ingredients = array(
        1 => array(
            "id"=> 1,
            "de"=> "Vodka",
            "en"=> "Vodka",
            "kat"=> "alk"
        ),
        2 => array(
            "id"=> 2,
            "de"=> "Gin",
            "en"=> "Gin",
            "kat"=> "alk"
        ),
        3 => array(
            "id"=> 3,
            "de"=> "Whiskey",
            "en"=> "Whiskey",
            "kat"=> "alk"
        ),
        4 => array(
            "id"=> 4,
            "de"=> "Zitrone",
            "en"=> "Lemon",
            "kat"=> "veg"
        ),
        5 => array(
            "id"=> 5,
            "de"=> "Rosmarin",
            "en"=> "rosemary",
            "kat"=> "veg"
        ),
        6 => array(
            "id"=> 6,
            "de"=> "Ginger Ale",
            "en"=> "Ginger Ale",
            "kat"=> "noalk"
        ),
        7 => array(
            "id"=> 7,
            "de"=> "Tonic",
            "en"=> "Tonic Water",
            "kat"=> "noalk"
        )
    );
 ?>
<script type="text/javascript" src="../../js/mixer.js"></script>
 <div class="leftBar">
    <?php
        foreach ($ingredients as $key=>$value) {
            echo "<label draggable='true' ondragstart='drag(event)' id='ing$key'>$value[$language]</label><br/>";
        }
    ?>
</div>
<div class="content">
    <h1>Mixer</h1>
    Create your own drinks and share them!<br/>
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