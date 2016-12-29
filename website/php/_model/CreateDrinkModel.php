<?php
include_once("./php/db/DbHelper.php");
class CreateDrinkModel {
    private $db;
    public $noNameSet;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function findItemById($array, $id) {
        foreach($array as $item) {
            if ($id == $item->getId()) {
                return $item;
            }
        }
        return -1;
    }
    
    function isObjectWithIdInArray($array, $id) {
        foreach($array as $item) {
            if ($id == $item->getId()) {
                return true;
            }
        }
        return false;
    }

    function enrichIngredientWithUnitName($ingredient) {
        $res = array();
        $param = $this->db->escape_string($ingredient->getUnit());
        $dbRes = DbHelper::doQuery("select * from Unit where id = $param;");
        $unit = $dbRes->fetch_object("Unit");
        $ingredient->setUnitName($unit->getName());
        return $ingredient;
    }


    function createNewDrinkAndNavigateToIt() {
        if (!isset($_SESSION["drinkName"]) || !isset($_SESSION["drinkDescription"]) || !isset($_SESSION["ingredients"])) {
            header("location: ".$_SESSION["baseURL"]."Mixer/noNameSet");
        }
        
        $id = $this->createDrink();
        foreach ($_SESSION["ingredients"] as $key => $value) {
            $this->createDrinkIngredientConnection($id, $key, $value);
        }
        unset($_SESSION["usedIngredients"]);
        setcookie("input_drinkDescription", "", time()-3600);
        setcookie("input_drinkName", "", time()-3600);
        header("location: ".$_SESSION["baseURL"]."Drink?id=$id");
    }

    function createDrink() {
        $db = $this->db;
        $drinkName = $db->escape_string($_SESSION["drinkName"]);
        $description = $db->escape_string($_SESSION["drinkDescription"]);
        $username = $db->escape_string($_SESSION["username"]);
        $date = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
        echo "INSERT INTO Drink (name, description, creator, createdAt) VALUES ('$drinkName', '$description', '$username', '$date');";
        $res = DbHelper::doQuery("INSERT INTO Drink (name, description, creator, createdAt) VALUES ('$drinkName', '$description', '$username', '$date');");
        return $db->insert_id;
    }

    function createDrinkIngredientConnection($drinkid, $ingredientid, $amount) {
        $db = $this->db;
        $drinkid = $db->escape_string($drinkid);
        $ingredientid = $db->escape_string($ingredientid);
        $amount = $db->escape_string($amount);
        echo "INSERT INTO Ingredients_for_Drink (ingredient_id, drink_id, quantity) VALUES ($ingredientid, $drinkid, $amount);";
        $res = DbHelper::doQuery("INSERT INTO Ingredients_for_Drink (ingredient_id, drink_id, quantity) VALUES ($ingredientid, $drinkid, $amount);");
    }
}
?>