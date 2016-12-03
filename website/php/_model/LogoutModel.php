<?php
include_once("./php/db/DbHelper.php");
class LogoutModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }
}

?>