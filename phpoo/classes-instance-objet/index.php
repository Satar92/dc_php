<?php 
include_once ('./Panier.php');


$monPanier = new Panier();

echo $monPanier->numeroPanier;
echo '<pre>';
echo 'Avant l\'ajout dans le panier: <br/>';

// si la propriete est privé alors l'expression ci dessous generera une erreur 
// echo $monPanier->articles;

// echo $monPanier->nbrArticles 


print_r($monPanier->getArticles());
echo '<pre>';

$monPanier ->AjouterArticle('pomme');

echo 'Aprés l\'ajout dans le panier: <br/>';


echo '<pre>';
print_r($monPanier->getArticles());
echo '</pre>';

$monPanier ->AjouterArticle('orange');

echo 'Aprés l\'ajout dans le panier: <br/>';

echo '<pre>';
print_r($monPanier->getArticles());
echo '</pre>';

// déléguon l'affichage à l'objet $monPanier 


$monPanier ->AjouterArticle('carottes');

// affichons:

$monPanier->affichePanier();
$monPanier->getNbrArticles();
echo 'Mon panier contient ' . $monPanier->getNbrArticles() . ' article(s)<br>';


echo 'creation de ton Panier. <br/>';

$tonPanier = new Panier;
 
echo 'affichage de Ton Panier. <br/>';
$tonPanier ->affichePanier();

$tonPanier ->AjouterArticle('coco');

echo 'Aprés l\'ajout dans le panier: <br/>';


echo '<pre>';
print_r($tonPanier->getArticles());
echo '</pre>';
echo '<pre>';
print_r($monPanier->getArticles());
echo '</pre>';
