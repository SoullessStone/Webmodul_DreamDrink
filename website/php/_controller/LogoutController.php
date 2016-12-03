<?php
include_once("./php/_model/LogoutModel.php");
include_once("./php/_view/LogoutView.php");
class LogoutController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new LogoutModel();
        $this->view = new LogoutView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }
}

?>