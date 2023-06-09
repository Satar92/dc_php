<?php
class Pompe {
    private $essence;

    public function __construct() {
        $this->essence = 0;
    }

    public function setEssence($essence) {
        $this->essence = $essence;
    }

    public function getEssence() {
        return $this->essence;
    }

    public function donnerEssence($litres) {
        $this->essence -= $litres;
    }
}
?>
