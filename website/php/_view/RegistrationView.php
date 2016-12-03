<?php
include_once("./php/_model/RegistrationModel.php");
class RegistrationView {
    private $model;
    private $lang;
    
    public function __construct(RegistrationModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/registration_".$this->lang.".php");
    }
}