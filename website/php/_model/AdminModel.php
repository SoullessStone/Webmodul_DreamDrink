<?php
include_once("./php/db/DbHelper.php");
class AdminModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function formSubmitted($postinfo) {
        if (isset($postinfo)) {
            $escape = htmlspecialchars($postinfo["submittedAddimage"]);
            if (isset($escape) && $escape != "") {
                $url = htmlspecialchars($postinfo["url"]);
                $imageName = htmlspecialchars($postinfo["imageName"]);
                $drink = htmlspecialchars($postinfo["drink"]);
                $img = "./pic/drinks/$imageName";
                $fileContent = file_get_contents($url);
                if ($fileContent === FALSE) {
                    header("Location: ".$_SESSION["baseURL"]."Admin?failed");
                } else {$saveResult = file_put_contents($img, $fileContent);
                    if ($saveResult === FALSE) {
                        header("Location: ".$_SESSION["baseURL"]."Admin?failed");
                    } else {
                        $imageName = $this->db->escape_string($postinfo["imageName"]);
                        $drink = $this->db->escape_string($postinfo["drink"]);
                        $imageId = $this->getMaxImageId() + 1;
                        echo "INSERT INTO Image (id, `path`) VALUES ($imageId, '$imageName');";
                        $res = DbHelper::doQuery("INSERT INTO Image (id, `path`) VALUES ($imageId, '$imageName');");
                        echo "INSERT INTO Images_for_Drink (drink_id, image_id) VALUES ($drink, $imageName);";
                        $res = DbHelper::doQuery("INSERT INTO Images_for_Drink (drink_id, image_id) VALUES ($drink, $imageId);");
                        header("Location: ".$_SESSION["baseURL"]."Admin");
                    }
                }
                
            } else {
                $name = htmlspecialchars($_POST["name"]);
                $image_path = htmlspecialchars($_POST["imagepath"]);
                $unit_id = htmlspecialchars($_POST["unit"]);
                $name = $this->db->escape_string($name);
                $image_path = $this->db->escape_string($image_path);
                $unit_id = $this->db->escape_string($unit_id);
                echo "INSERT INTO ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);";
                $res = DbHelper::doQuery("INSERT INTO Ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);");   
                header("Location: ".$_SESSION["baseURL"]."Admin");
            }
        }
    }

    function getMaxImageId() {
        $dbRes = DbHelper::doQuery("select max(id) as maximum from Image;");
        return $dbRes->fetch_assoc()["maximum"];
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
        $ingId = htmlspecialchars($id);
        $ingId = $this->db->escape_string($ingId);
        $db = DbHelper::getInstance();
        $res = DbHelper::doQuery("delete from Ingredient where id = '$ingId';");
        if ($res instanceof DbError) {
            echo $res.getError();
        } else {
            echo "noerror";
        }
        header("Location: ".$_SESSION["baseURL"]."Admin");
    }

    public function getAllDrinksFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Drink;");
        while($drink = $dbRes->fetch_object("Drink")){
            array_push($res, $drink);
        }
        return $res;
    }
}

?>