<?php
include_once("./php/_model/MixerModel.php");
class MixerView {
    private $model;
    private $lang;
    
    public function __construct(MixerModel $model, $lang) {
        $this->model = $model;
        $this->lang = $lang;
    }

    public function render() {
        include_once("./php/content/mixer_".$this->lang.".php");
    }
}