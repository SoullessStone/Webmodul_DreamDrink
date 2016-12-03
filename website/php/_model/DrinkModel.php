<?php
include_once("./php/db/DbHelper.php");
class DrinkModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }
}

?>