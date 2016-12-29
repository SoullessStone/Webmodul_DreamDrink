<?php
    session_start();
    include_once("../db/DbHelper.php");

    $db = DbHelper::getInstance();
    
    $user = htmlspecialchars($_GET["user"]);
    $user = $db->escape_string($user);

    $rating = htmlspecialchars($_GET["rating"]);
    $rating = $db->escape_string($rating);

    $drinkid = htmlspecialchars($_GET["drinkId"]);
    $drinkid = $db->escape_string($drinkid);

    echo $user . $drinkid . $rating;

    if (isset($user) && $user!="" && isset($rating) && $rating!="" && isset($drinkid) && $drinkid!="") {
        
        $res = DbHelper::doQuery("INSERT INTO Rating (user_id, drink_id, rating) VALUES ('$user', $drinkid, $rating);");
        $dbRes = DbHelper::doQuery("select * from Drink where name like '%$searchword%';");
    }
?>