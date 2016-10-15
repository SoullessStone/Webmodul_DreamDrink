<div class="content">
    <h1>DE</h1>
    Alle Drinks inkl. deiner Bewertung!
    <?php $drinks = array(
        "GinGin" => array("Beschreibung" => "Gin und Gingerale, ein Genuss", "Bewertung" => 1),
        "Tonico Mediterraneo" => array("Beschreibung" => "Tutto bene", "Bewertung" => 1),
        "Moscow Mule" => array("Beschreibung" => "Ein Esel, wer den nicht gerne hat", "Bewertung" => 1),
        "Island Trading" => array("Beschreibung" => "Cola und Rum, wieso ist da noch keiner draufgekommen?", "Bewertung" => 1),
        "Eigenkreation" => array("Beschreibung" => "Cola und Rum, wieso ist da noch keiner draufgekommen?", "Bewertung" => 1),
        "Felsenau Bier" => array("Beschreibung" => "Nur Bier, das reicht.", "Bewertung" => 1)
    );
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Beschreibung</th>";
    echo "<th>Bewertung</th>";
    echo "</tr>";
    foreach ($drinks as $drinkname => $value) {
        echo "<tr>";
        echo "<td>";
        echo $drinkname;
        echo "</td>";
        foreach ($value as $key2 => $value2) {
            echo "<td>";
            echo $value2;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

</div>