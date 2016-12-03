<?php
include_once("./php/db/DbHelper.php");
class DrinklistModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
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