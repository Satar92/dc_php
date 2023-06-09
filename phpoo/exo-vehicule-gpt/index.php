<?php
require_once 'Vehicule.php';
require_once 'Pompe.php';

// 1. Création du véhicule 1
$vehicule1 = new Vehicule();

// 2. Attribution d'un nombre de litres d'essence au véhicule 1 : 5
$vehicule1->setEssence(5);

// 3. Affichage du nombre de litres d'essence du véhicule 1
echo "Nombre de litres d'essence du véhicule 1 : " . $vehicule1->getEssence() . "L<br>";

// 4. Création d'une pompe
$pompe = new Pompe();

// 5. Attribution d'un nombre de litres d'essence à la pompe : 800
$pompe->setEssence(800);

// 6. Affichage du nombre de litres d'essence de la pompe
echo "Nombre de litres d'essence de la pompe : " . $pompe->getEssence() . "L<br>";

// 7. La pompe donne de l'essence en faisant le plein (50L) à la voiture 1
$vehicule1->faireLePlein($pompe);

// 8. Affichage du nombre de litres d'essence pour la voiture 1 après ravitaillement
echo "Nombre de litres d'essence pour la voiture 1 après ravitaillement : " . $vehicule1->getEssence() . "L<br>";

// 9. Affichage du nombre de litres d'essence restant pour la pompe
echo "Nombre de litres d'essence restant pour la pompe : " . $pompe->getEssence() . "L<br>";

// 10. Limite du réservoir du véhicule à 50L
$vehicule1->limiterReservoir(50);
