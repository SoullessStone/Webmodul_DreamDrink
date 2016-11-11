<?php
    class Ingredient {
        private $id, $name, $image_path, $unit;
        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getImage_path() {
            return $this->image_path;
        }

        public function getUnit() {
            return $this->unit;
        }

        public function __toString(){
        return sprintf("%d, %s, %s, %d",$this->id, $this->name, $this->image_path, $this->unit);
        }
}
?>