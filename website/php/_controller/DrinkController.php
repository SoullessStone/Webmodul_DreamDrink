<?php
include_once("./php/_model/DrinkModel.php");
include_once("./php/_view/DrinkView.php");
class DrinkController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new DrinkModel();
        $this->view = new DrinkView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }
}

?>