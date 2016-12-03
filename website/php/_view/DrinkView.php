<?php
include_once("./php/_model/DrinkModel.php");
class DrinkView {
    private $model;
    private $lang;
    
    public function __construct(DrinkModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/drink_".$this->lang.".php");
    }
}