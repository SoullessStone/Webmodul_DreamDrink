<?php
    class Drink {
        private $id, $name, $description, $creator, $isPublic, $createdAt;
        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getCreator() {
            return $this->creator;
        }

        public function getStatus() {
            return $this->isPublic;
        }

        public function getCreatedAt() {
            return $this->createdAt;
        }

        function getDetailIngredientsFromDb() {
            $dbRes = DbHelper::doQuery("SELECT ing.name as ing_name, ifd.quantity as quantity, uni.name as unit_name FROM Ingredients_for_Drink ifd INNER JOIN Ingredient ing on ing.id=ifd.ingredient_id INNER JOIN Unit uni on ing.unit = uni.id WHERE ifd.drink_id = $this->id;");
            return $dbRes;
        }

        public function __toString(){
        return sprintf("%d, %s, %s, %s",$this->id, $this->name, $this->description, $this->image_path);
        }
}
?>