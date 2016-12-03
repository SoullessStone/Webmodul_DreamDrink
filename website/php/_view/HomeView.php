<?php
include_once("./php/_model/HomeModel.php");
class HomeView {
    private $model;
    private $lang;
    
    public function __construct(HomeModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/home_".$this->lang.".php");
    }
}