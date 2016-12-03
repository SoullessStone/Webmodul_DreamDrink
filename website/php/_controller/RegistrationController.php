<?php
include_once("./php/_model/RegistrationModel.php");
include_once("./php/_view/RegistrationView.php");
class RegistrationController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new RegistrationModel();
        $this->view = new RegistrationView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }

    public function submitedForm($postInfo) {
        $this->model->registrationFormSubmitted($postInfo);
    }
}

?>