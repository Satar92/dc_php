<?php
class Vehicule {
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

    public function faireLePlein($pompe) {
        $litresAPrendre = 50 - $this->essence;
        $litresDisponibles = $pompe->getEssence();

        if ($litresDisponibles >= $litresAPrendre) {
            $this->essence += $litresAPrendre;
            $pompe->donnerEssence($litresAPrendre);
        } else {
            $this->essence += $litresDisponibles;
            $pompe->donnerEssence($litresDisponibles);
        }
    }

    public function limiterReservoir($limite) {
        if ($this->essence > $limite) {
            $this->essence = $limite;
        }
    }
}
?>
