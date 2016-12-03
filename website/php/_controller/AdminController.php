<?php
include_once("./php/_model/AdminModel.php");
include_once("./php/_view/AdminView.php");
class AdminController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new AdminModel();
        $this->view = new AdminView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }

    public function submitedForm($postInfo) {
        $this->model->formSubmitted($postInfo);
    }
}

?>