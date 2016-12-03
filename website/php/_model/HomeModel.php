<?php
include_once("./php/db/DbHelper.php");
class HomeModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }
}

?>