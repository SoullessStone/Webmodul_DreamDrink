<?php
include_once("./php/db/DbHelper.php");
class DrinkModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function getDetailIngredientsFromDb($drink_id) {
        $id = $this->db->escape_string($drink_id);
        $dbRes = DbHelper::doQuery("SELECT ing.name as ing_name, ifd.quantity as quantity, uni.name as unit_name FROM ingredients_for_drink ifd INNER JOIN Ingredient ing on ing.id=ifd.ingredient_id INNER JOIN Unit uni on ing.unit = uni.id WHERE ifd.drink_id =2;");
        return $dbRes;
    }

    public function getDrinkById($id) {
        $id = $this->db->escape_string($id);
        $res = DbHelper::doQuery("select * from Drink where id = $id;");
        $detail_drink = $res->fetch_object("Drink");
        return $detail_drink;
    }

    public function getImagePath($id) {
        $id = $this->db->escape_string($id);
        $imageResult = DbHelper::doQuery("select path from Image where id = (select image_id from Images_for_Drink where drink_id = $id);");
        $imagePath = $imageResult->fetch_assoc()["path"];
        return $imagePath;
    }

    public function getRatingSumForDrink($id) {
        $id = $this->db->escape_string($id);
        $rateRes = DbHelper::doQuery("select sum(rating) as summe from Rating where drink_id = $id");
        $summe = $rateRes->fetch_assoc()["summe"];
        return $summe;
    }

    public function getRatingForDrinkAndUser($id, $userid) {
        $id = $this->db->escape_string($id);
        $rateRes = DbHelper::doQuery("select * from Rating where drink_id = $id and user_id='$userid'");
        $summe = $rateRes->fetch_object("Rating");
        return $summe;
    }

    public function getRatingCountForDrink($id) {
        $id = $this->db->escape_string($id);
        $rateCountRes = DbHelper::doQuery("select COUNT(*) as rate_Count from Rating where drink_id = $id");
        $rateCount = $rateCountRes->fetch_assoc()["rate_Count"];
        return $rateCount;
    }

}

?>