<?php
    class IngredientList {
        private $translate = array();

        function __construct() {
            $this->translate["Zucker"] = "Sugar";
            $this->translate["Zitrone"] = "Lemon";
            $this->translate["Rosmarin"] = "Rosemary";
            $this->translate["Orangensaft"] = "Orange juice";
            $this->translate["Rahm"] = "Cream";
            $this->translate["Pfirsichlikör"] = "Peach liqueur";
            $this->translate["Minze"] = "Mint";
            $this->translate["Limette"] = "Lime";
            $this->translate["Rohrzucker"] = "Raw sugar";
            $this->translate["Zitronensaft"] = "Lemon juice";
            $this->translate["Ananassaft"] = "Ananas juice";
            $this->translate["Cranberrysaft"] = "Cranberry juice";
        }

        public function render($model, $allIngredients, $usedIngredients, $lang) {            
            usort($allIngredients, function($a, $b)
            {
                return strcmp(strtolower($a->getName()), strtolower($b->getName()));
            });
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