<?php
include_once("./php/_model/DrinklistModel.php");
class DrinklistView {
    private $model;
    private $lang;
    
    public function __construct(DrinklistModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/drinklist_".$this->lang.".php");
    }
}