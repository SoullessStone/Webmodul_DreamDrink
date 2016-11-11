<?php
    class Unit {
        private $id, $name;

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function __toString(){
        return sprintf("%d -> %s",$this->id, $this->name);
        }
}
?>