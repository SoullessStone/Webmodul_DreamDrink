<?php
    class Ingredient {
        // from db
        private $id, $name, $image_path, $unit;
        // not from db
        private $unitName;
        
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

        public function getUnitName() {
            return $this->unitName;
        }

        public function setUnitName($newName) {
            $this->unitName = $newName;
        }

        public function __toString(){
        return sprintf("%d, %s, %s, %d",$this->id, $this->name, $this->image_path, $this->unit);
        }
}
?>