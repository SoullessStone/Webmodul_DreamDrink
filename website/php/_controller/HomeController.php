<?php
include_once("./php/_model/HomeModel.php");
include_once("./php/_view/HomeView.php");
class HomeController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new HomeModel();
        $this->view = new HomeView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }
}

?>