<?php

class Etudiant
{
    private $prenom;
    private $nom;
    private $age;
    private $formation;
    private $anneeFormation;


    public function __construct(array $arg)
    {
        $this->initProps($arg);
    }

public function getPrenom(){
    return $this->prenom;
}

public function sePresente(){
    echo 'Bonjour je m\'appelle ' . $this->prenom. ' et je suis étudiant(e).';
}


private function initProps(array $arg){

    if ( isset($arg['prenom'])&& is_string($arg['prenom'])) {
        $this->prenom = $arg['prenom'];
    }
    if (isset($arg['nom'])&& is_string($arg['nom'])) {
        $this->nom = $arg['nom'];
    }
    if (isset($arg['age'])&& is_integer($arg['age'])) {
        $this->age = $arg['age'];
    }
    if (isset($arg['formation'])&& is_string($arg['formation'])) {
        $this->formation = $arg['formation'];
    }
    if (isset($arg['anneeFormation'])&& is_integer($arg['anneeFormation'])) {
        $this->anneeFormation = $arg['anneeFormation'];
    }

}


    // avec un constructeur initialisant $prenom
    // je n'ai en principe plus besoin d'un setter
    // sauf si je veux pouvoir modifier le prenom // par la suite

    //     public function setPrenom($prenom){
    //         if(is_string($prenom)){
    //             $this->prenom = $prenom;
    //         }
    //     }
}
