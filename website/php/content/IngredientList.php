<?php
    class IngredientList {
        private $translate = array();

        function __construct() {
            $this->translate["Zucker"] = "Sugar";
            $this->translate["Zitrone"] = "Lemon";
            $this->translate["Rosmarin"] = "Rosemary";
            $this->translate["Orangensaft"] = "Orange juice";
            $this->translate["Rahm"] = "Cream";
        }

        public function render($model, $allIngredients, $usedIngredients, $lang) {
            foreach ($allIngredients as $ingredient) {
                if (! $model->isObjectWithIdInArray($usedIngredients, $ingredient->getId())) {
                    $id = $ingredient->getId();
                    $text = $ingredient->getName();
                    if ($lang == "en" && isset($this->translate[$text])) {
                        $text = $this->translate[$text];
                    }
                    echo "<label class='choose_ingredient'><a href='".$_SESSION["baseURL"]."Mixer/addIngredient=$id'>$text -></a></label><br/>";
                }
            }
        }
    }
?>