<?php
include_once("./php/db/DbHelper.php");
class MixerModel {
    private $db;
    public $noNameSet;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    // Anpassen
    function createNewDrinkAndNavigateToIt($postInfo) {
        if (isset($postInfo["drinkName"]) && strlen($postInfo["drinkName"])>0) {
            $_SESSION["drinkName"] = htmlspecialchars($postInfo["drinkName"]);
            $_SESSION["drinkDescription"] = htmlspecialchars($postInfo["drinkDescription"]);
            $_SESSION["ingredients"] = $this->getPostedIngredients($postInfo);
            header("location: ".$_SESSION["baseURL"]."CreateDrink");

            //$id = $this->createDrink();
            //foreach ($this->getPostedIngredients($postInfo) as $key => $value) {
            //    $this->createDrinkIngredientConnection($id, $key, $value);
            //}
            //unset($_SESSION["usedIngredients"]);
           // setcookie("input_drinkDescription", "", time()-3600);
            //setcookie("input_drinkName", "", time()-3600);
            //header("location: ".$_SESSION["baseURL"]."Drink?id=$id");
        } else {
            header("location: ".$_SESSION["baseURL"]."Mixer/noNameSet");
        }
    }

    function getPostedIngredients($postInfo) {
        $result = array();
        foreach ($postInfo as $key => $value) {
            if (substr( $key, 0, 4 ) === "ing_")
                $result[substr($key, 4, strlen($key)-1)] = $value;
        }
        return $result;
    }

    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }

    function getUsedIngredients(){
        if (isset($_SESSION["usedIngredients"])){
            return $_SESSION["usedIngredients"];
        }
        return array();
    }

    public function addNewIngredientIfPresent($i) {
        $allIngredients = $this->getAllIngredientsFromDb();
        $usedIngredients = $this->getUsedIngredients();
        if ($this->isObjectWithIdInArray($allIngredients, $i)){
            if (! $this->isObjectWithIdInArray($usedIngredients, $i)) {
                $newIngredient = $this->findItemById($allIngredients, $i);
                $usedIngredients[] = $this->enrichIngredientWithUnitName($newIngredient);
                $_SESSION["usedIngredients"] = $usedIngredients;
                header("location: ".$_SESSION["baseURL"]."Mixer");
            }
        }
    }

    function removeNewIngredientIfPresent($i) {
        $allIngredients = $this->getAllIngredientsFromDb();
        $usedIngredients = $this->getUsedIngredients();
        if ($this->isObjectWithIdInArray($usedIngredients, $i)){
                $ingredient = $this->findItemById($allIngredients, $i);
                $_SESSION["usedIngredients"] = $this->removeItemWithIdFromArray($usedIngredients, $i);
                header("location: ".$_SESSION["baseURL"]."Mixer");
        }
    }
    
    function removeItemWithIdFromArray($array, $id) {
        $result = array();
        foreach($array as $item) {
            if ($id !== $item->getId()) {
                $result[] = $item;
            }
        }
        return $result;
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
}

?>