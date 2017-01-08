<?php
include_once("./php/db/DbHelper.php");
class AboutModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function getIdOfNewestDrinkWithImage() {
        $dbRes = DbHelper::doQuery("select drink_id from Images_for_Drink where drink_id = (select max(drink_id) from Images_for_Drink);");
        return $dbRes->fetch_assoc()["drink_id"];
    }

    public function getDrink($drink_id) {
        $id = htmlspecialchars($drink_id);
        $id = $this->db->escape_string($id);
        $res = DbHelper::doQuery("select * from Drink where id = $id;");
        return $res->fetch_object("Drink");
    }

    public function getImagePathForDrink($drink_id) {
        $id = htmlspecialchars($drink_id);
        $id = $this->db->escape_string($id);
        $imageResult = DbHelper::doQuery("select path from Image where id = (select image_id from Images_for_Drink where drink_id = $id);");
        return $imageResult->fetch_assoc()["path"];
    }
}

?>