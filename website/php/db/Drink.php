<?php
    class Drink {
        private $id, $name, $description, $creator, $isPublic, $image_path;
        
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

        public function getImage_path() {
            return $this->image_path;
        }

        public function __toString(){
        return sprintf("%d, %s, %s, %s",$this->id, $this->name, $this->description, $this->image_path);
        }
}
?>