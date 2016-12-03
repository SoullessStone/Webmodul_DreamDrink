<?php
include_once("./php/_model/DrinklistModel.php");
include_once("./php/_view/DrinklistView.php");
class DrinklistController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new DrinklistModel();
        $this->view = new DrinklistView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }
}

?>