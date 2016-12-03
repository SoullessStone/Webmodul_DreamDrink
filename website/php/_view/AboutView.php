<?php
include_once("./php/_model/AboutModel.php");
class AboutView {
    private $model;
    private $lang;
    
    public function __construct(AboutModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/about_".$this->lang.".php");
    }
}