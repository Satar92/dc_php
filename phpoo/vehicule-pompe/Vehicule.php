
<?php 
class Vehicule 
{
    private $qteEssence;

    public function __construct(int $qte) {
        $this->qteEssence = $qte;
    }

    public function setQteEssence(int $qte){
        $this->qteEssence = $qte;
    }

    public function getQteEssence(){
        return $this->qteEssence;
    }

    public function afficherEssennceRestante() {
        echo "Il reste {$this->qteEssence} litre(s) dans le véhicule.<br>";
    }

}
