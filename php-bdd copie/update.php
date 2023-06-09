<?php
// PAGE D'ACCUEIL
// inclusion initiale
include_once("./includes/init.inc.php");

// recuperation de tous les employés
try {
  $stmt = $pdo->query("SELECT * FROM employes");
} catch (PDOException $e) {
  afficheErreur($e->getMessage());
}
$employes = $stmt->fetchAll();

// debug

if ($env === 'dev') {
  incomingData();
}

// TITRE DE LA PAGE
$titrePrincipal = 'Accueil';

// ID DU BODY 
$bodyId = 'home';



// affichage de la page 
// header:
include_once("./includes/header.php");
?>

<?php include_once("./includes/footer.php");
?>