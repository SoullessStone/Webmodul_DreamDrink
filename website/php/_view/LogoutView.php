<?php
include_once("./php/_model/LogoutModel.php");
class LogoutView {
    private $model;
    private $lang;
    
    public function __construct(LogoutModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        unset($_SESSION);
        $_SESSION = array(); 
        session_destroy();
        header("location: ".$_SESSION["baseURL"]."Home");
    }
}