<?php
include_once("./php/_model/LoginModel.php");
include_once("./php/_view/LoginView.php");
class LoginController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new LoginModel();
        $this->view = new LoginView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }

    public function submitedForm($postInfo) {
        $this->model->loginFormSubmitted($postInfo);
    }
}

?>