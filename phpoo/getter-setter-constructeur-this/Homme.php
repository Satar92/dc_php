<?php

class Homme
{
    private $age;
    private $nom;
    private $prenom;

    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->nom = $nom;
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        if (is_string($prenom)) {
            $this->prenom = $prenom;
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setAge($age){
        if($age>=0 && is_integer($age)){
            $this->age = $age;
        }
    }

    public function getAge(){
        return $this->age;
    }

}
