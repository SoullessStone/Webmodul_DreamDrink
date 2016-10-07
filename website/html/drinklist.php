<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drink Liste</title>
    <link rel="stylesheet" href="../css/alcoholi.css">
    <link rel="icon" href="../pic/favicon.ico" type="image/x-icon"/>
</head>
<body>

<?php require_once("header.php"); ?>

<div class="wrapper">

    <main>
        <div class="leftBar">
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
            Drink 1<br/>
        </div>
        <div class="content">
            Alle Drinks inkl. deiner Bewertung!
            <?php $drinks = array(
                "GinGin" => array("Beschreibung" => "Gin und Gingerale, ein Genuss", "Bewertung" => 1),
                "Tonica Mediteraneo" => array("Beschreibung" => "Tutto bene", "Bewertung" => 1),
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
        <div class="rightBar">Filteroptionen!
        </div>
    </main>


    <footer>
        <div class="flex">
            <div>
                <div class="title">Links</div>
                <a href="">Link1</a>
                <a href="">Link1</a>
            </div>
            <div>
                <div class="contact">Kontakt</div>
                <a href="">Mail 1</a>
                <a href="">Mail 2</a>
            </div>
        </div>

    </footer>

</div>

</body>
</html>