<?php
include_once("./php/db/DbHelper.php");
class RegistrationModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function registrationFormSubmitted($postinfo) {
        var_dump($postinfo);    
    }
}

?>