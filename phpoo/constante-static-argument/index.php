
<?php 
include_once('./Compteur.php');
include_once('./Maison.php');

$c1 = new Compteur();
$c2 = new Compteur();
$c3 = new Compteur();
$c4 = new Compteur();
$c5 = new Compteur();

echo 'Nombre de fois que la classe Compteur a été instancée: ' . Compteur::$nbInstancesCrees . '<br>';

echo "numéro d'instanciation de c1: " . $c1->nbInstanceDObjet .'<br>';
echo "numéro d'instanciation de c2: " . $c2->nbInstanceDObjet .'<br>';
echo "numéro d'instanciation de c3: " . $c3->nbInstanceDObjet .'<br>';
echo "numéro d'instanciation de c4: " . $c4->nbInstanceDObjet .'<br>';
echo "numéro d'instanciation de c5: " . $c5->nbInstanceDObjet .'<br>';

echo 'La/les propriétés/méthodes static d\'une classe ne sont JAMAIS transmises aux objets fabriqués à partir de cette classe <br>';

echo '<pre>';
print_r($c1);
echo '</pre>';

echo 'Testons la classe Maison<br>';

$maMaison = new Maison;


echo 'nbPieces: ' . Maison::getNbPieces() . '<br>';
// ca fonctionne car j'appelle une méthode qui est publique
// mais depuis la classe directement car elle est également statique.

//echo 'nbPieces: ' . Maison::nbPieces . '<br>';
// Ne fonctionnera pas car bie  qu'elle soit static 
// ce qui justifie l'utilisation de ''Maison::'' elle est également
// PRIVATE ce qui la rend inaccessible à partir du code situé hors de la
// classe.

echo 'nbPieces: ' . $maMaison->getNbPieces() . '<br>';
// Ceyte méthod est STATIC mais on peu l'appeler depuis un objet aussi bien
// que depuis la classe. C'est une erreur d'implementation des regles de la POO
// par PHP.