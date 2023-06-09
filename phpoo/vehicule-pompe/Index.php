<?php 
include_once('./Vehicule.php');
include_once('./Pompe.php');

// 1. Creation d'un vehicule 1
// 2. Attribuer un nombre de litres d'essence au vehicule 1 : 5
// 3. Afficher le nombre de litres d'essence du vehicule 1
// 4. Creation d'une pompe
// 5. Attribuer un nombre de litres d'essencea la pompe : 800
// 6. Afficher le nombre de litres d'essence de la pompe
// 7. la pompe donne de l'essence en faisant le plein (50L) a la voiture1
// 8. Afficher le nombre de litres d'essence pour la voiture1 apres ravitaillement
// 9. Afficher nombre de litres d'essence restant pour la pompe
// 10. Faire en sorte que le vehicule ne puisse pas contenir plus de 50L d'essence (limite reservoir).







$vehicule1 = new Vehicule(5);
$vehicule1->afficherEssennceRestante();

$pompe = new Pompe(800);
$pompe->afficherEssennceRestante();


// debug
echo '<pre>';
print_r($vehicule1);
echo '</pre>';

echo '<pre>';
print_r($pompe);
echo '</pre>';

$pompe->fairePlein($vehicule1);
$vehicule1->afficherEssennceRestante();
$pompe->afficherEssennceRestante();

// debug
echo '<pre>';
print_r($vehicule1);
echo '</pre>';

echo '<pre>';
print_r($pompe);
echo '</pre>';