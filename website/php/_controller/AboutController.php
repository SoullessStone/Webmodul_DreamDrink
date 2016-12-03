<?php
include_once("./php/_model/AboutModel.php");
include_once("./php/_view/AboutView.php");
class AboutController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new AboutModel();
        $this->view = new AboutView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }
}

?>