<?php 

class Panier 
{
    //DECLARATION DES PROPRIETE

    // pour declrarer une variable (PROPRIETES) dans une classe
    // la poo exige qu'on definisse au préalable sa VISIBILITD
    // public / private / protected 

    public $numeroPanier = 8;

    private $articles=[];

    protected $nbrArticles=0;


    // DECLARATION DES METHODS

    public function AjouterArticle($article){
        echo 'Ajout d\'un nouvel article: ' . $article. '<br />';
        $this->articles[]= $article;
        // on met a jour le nombre d'article
        $this-> nbrArticles = count($this->articles);
    }

    public function getArticles(){
        return $this->articles;
    }

    public function affichePanier(){
        echo '<pre>';
        print_r($this->getArticles());
        echo '</pre>';        
    }

    public function getNbrArticles(){
      return $this->nbrArticles;
      
    }
}