<?php
    class Unit {
        private $id, $name, $image_path;

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getImage_path() {
            return $this->image_path;
        }

        public function __toString(){
        return sprintf("%d -> %s",$this->id, $this->name);
        }
}
?>