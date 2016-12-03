<?php
include_once("./php/_model/AdminModel.php");
class AdminView {
    private $model;
    private $lang;
    
    public function __construct(AdminModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/admin_".$this->lang.".php");
    }
}