<?php
    session_start();
    include_once("../db/DbHelper.php");
    include_once("../db/Drink.php");

    $searchword = htmlspecialchars($_GET["search"]);
    $db = DbHelper::getInstance();
    $searchword = $db->escape_string($searchword);

    if (isset($searchword) && $searchword!="") {
        $dbRes = DbHelper::doQuery("select * from Drink where name like '%$searchword%';");
        while($drink = $dbRes->fetch_object("Drink")){
            $link = $_SESSION["baseURL"]."Drink?id=".$drink->getId();
            echo "<a href='$link'>" . $drink->getName() . "</a><br/>";
        }
    }
?>