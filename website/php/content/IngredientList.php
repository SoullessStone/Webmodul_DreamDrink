<?php
    class IngredientList {        
        public function render($model, $allIngredients, $usedIngredients) {
            foreach ($allIngredients as $ingredient) {
                if (! $model->isObjectWithIdInArray($usedIngredients, $ingredient->getId())) {
                    $id = $ingredient->getId();
                    $text = $ingredient->getName();
                    echo "<label class='choose_ingredient'><a href='".$_SESSION["baseURL"]."Mixer/addIngredient=$id'>$text -></a></label><br/>";
                }
            }
        }
    }
?>