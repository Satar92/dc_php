<?php

class Compteur 
{

public static $nbInstancesCrees = 0;
public $nbInstanceDObjet = 0;

public function __construct(){
    ++self::$nbInstancesCrees;
    ++$this->nbInstanceDObjet;
}


}