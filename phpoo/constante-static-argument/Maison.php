<?php 
class Maison
{
    private static $nbPieces = 7;
    public static $espaceTerrain = "500m²";
    public $couleur = "blanc";
    const HAUTEUR = "10m";
    private $nbPortes = 10;

    public static function getNbPieces() {
        return SELF::$nbPieces;
    }

    public function getNbPortes() {
        return $this->nbPortes;
    }
}