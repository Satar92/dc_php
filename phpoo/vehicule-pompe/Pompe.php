<?php 
class Pompe 
{
    private $qteEssence;

    public function __construct(int $qte) {
        $this->qteEssence = $qte;
    }

    public function afficherEssennceRestante() {
        echo "Il reste {$this->qteEssence} litre(s) dans la pompe.<br>";
    }

    public function setQteEssence(int $qte) {
        $this->qteEssence = $qte;
    }

    public function fairePlein(Vehicule $v) {
        // on met a jour la quantité restante dans la pompe
        $this->setQteEssence($this->qteEssence - (50 - $v->getQteEssence()));
        
        // on rajoute dans le véhicule la quantité necessaire pour
        // atteindre 50 litres
        $v->setQteEssence(50);

        
    }
}