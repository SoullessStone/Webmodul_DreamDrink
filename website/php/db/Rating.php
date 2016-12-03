<?php
    class Rating {
        private $drink_id, $user_id, $rating;

        public function getId() {
            return $this->drink_id;
        }

        public function getCreatorName() {
            return $this->user_id;
        }

        public function getRating() {
            return $this->rating;
        }

        public function __toString(){
        return sprintf("%d -> %s",$this->id, $this->username);
        }
}
?>