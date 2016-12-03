<?php
include_once("./php/_model/MixerModel.php");
include_once("./php/_view/MixerView.php");
class MixerController {
    private $model;
    private $view;

    public function __construct($lang) {
        $this->model = new MixerModel();
        $this->view = new MixerView($this->model, $lang);
    }

    public function renderView() {
        $this->view->render();
    }

    public function addIngredient($i) {
        $this->model->addNewIngredientIfPresent($i);
    }

    public function removeIngredient($i) {
        $this->model->removeNewIngredientIfPresent($i);
    }

    public function saveDrink() {
        $this->model->createNewDrinkAndNavigateToIt();
    }

    public function submitedForm($postInfo) {
        $this->model->createNewDrinkAndNavigateToIt($postInfo);
    }

    public function noNameSet() {
        $this->model->noNameSet = true;
    }
}

?>