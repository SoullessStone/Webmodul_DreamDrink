<?php
include_once("./php/_model/DrinkModel.php");
class CreateDrinkView {
    private $model;
    private $lang;
    
    public function __construct(CreateDrinkModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/createDrink_".$this->lang.".php");
    }
}