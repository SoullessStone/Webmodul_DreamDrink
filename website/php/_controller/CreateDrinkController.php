<?php
include_once("./php/_model/CreateDrinkModel.php");
include_once("./php/_view/CreateDrinkView.php");
class CreateDrinkController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new CreateDrinkModel();
        $this->view = new CreateDrinkView($this->model, $lang);
    }

    public function persist(){
        $this->model->createNewDrinkAndNavigateToIt();
    }

    public function renderView() {
        $this->view->render();
    }
}

?>