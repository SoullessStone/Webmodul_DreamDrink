<?php
include_once("./php/_model/LoginModel.php");
class LoginView {
    private $model;
    private $lang;
    
    public function __construct(LoginModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/login_".$this->lang.".php");
    }
}