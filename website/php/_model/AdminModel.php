<?php
include_once("./php/db/DbHelper.php");
class AdminModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function formSubmitted($postinfo) {
        if (isset($postinfo)) {
            $name = $this->db->escape_string($_POST["name"]);
            $image_path = $this->db->escape_string($_POST["imagepath"]);
            $unit_id = $this->db->escape_string($_POST["unit"]);
            echo "INSERT INTO ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);";
            $res = DbHelper::doQuery("INSERT INTO Ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);");   
            header("Location: ".$_SESSION["baseURL"]."Admin");
        }
    }

    function getAllUnitsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Unit;");
        while($ingredient = $dbRes->fetch_object("Unit")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function isIngredientUsed($id) {
        $dbRes = DbHelper::doQuery("SELECT id FROM Ingredient where id IN (SELECT DISTINCT ingredient_id FROM Ingredients_for_Drink) and id=$id;");
        return ! ($dbRes->num_rows === 0);        
    }

    function removeNewIngredientIfPresent($id) {
        if ($this->isIngredientUsed($id)) {
            return;
        }
        $ingId = $this->db->escape_string($id);
        $db = DbHelper::getInstance();
        $res = DbHelper::doQuery("delete from Ingredient where id = '$ingId';");
        if ($res instanceof DbError) {
            echo $res.getError();
        } else {
            echo "noerror";
        }
        header("Location: ".$_SESSION["baseURL"]."Admin");
    }
}

?>