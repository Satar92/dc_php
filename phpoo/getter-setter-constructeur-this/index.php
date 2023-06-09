<?php
include_once('./Homme.php');
include_once('./Etudiant.php');
echo '<h3>Getters-Setters-Constructor</h3>';

$julien = new Homme;

// on essaie d'acceder aux propriété nom et prenom:
echo $julien->getNom();
echo ' ';
echo $julien->getPrenom();
echo '<br>';

// on initialise les propriété nom et prenom de l'objet
// $julien en utilisant les Setters
$julien->setNom('Dupond');
$julien->setPrenom('Julien');

// on essaie de nouveau d'afficher le nom et le prénom
// et on voit qu'elles s'affichent.
echo $julien->getNom();
echo ' ';
echo $julien->getPrenom();
echo '<br>';

// on affiche l'objet Julien
echo '<pre>';
print_r($julien);
echo '</pre>';

$julien->setAge(34);

// on affiche l'objet Julien
echo '<pre>';
print_r($julien);
echo '</pre>';


// instanciation d'un nouvel etudiant.

$anne = new Etudiant([
    'prenom' => 'Anne',
  

]);

// on affiche l'étudoant:
echo '<pre>';
print_r($anne);
echo '</pre>';

// on fait se présenter Anne:
$anne->sePresente();

$pedro = new Etudiant([
    'prenom' => 'Pedro',
    'nom' => 'Dos Santos',
    'age' => 23,
    'formation' => 'Master',
    'anneeFormation' => 2,
]);

// on affiche l'étudoant:
echo '<pre>';
print_r($pedro);
echo '</pre>';

// on fait se présenter Pedro:
$pedro->sePresente();