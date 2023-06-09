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
  showVar($employes);
}

// TITRE DE LA PAGE
$titrePrincipal = 'Accueil';

// ID DU BODY 
$bodyId = 'home';



// affichage de la page 
// header:
include_once("./includes/header.php");
?>
<!-- Contenu de la page -->
<a href="./create.php">
  <button type="button" class="btn btn-primary mt-5 ms-3">Ajouter un employé</button>
</a>
<table id="listeEmployes" class="table table-success table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Genre</th>
      <th scope="col">Service</th>
      <th scope="col">Date embauche</th>
      <th scope="col">Salaire</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employes as $k => $v) : ?>
      <tr>
        <th scope="row"><?= $v['id_employes'] ?></th>
        <td><?= $v['nom'] ?></td>
        <td><?= $v['prenom'] ?></td>
        <td><?= $v['sexe'] ?></td>
        <td><?= $v['service'] ?></td>
        <td><?= convertDateMysqlToFr($v['date_embauche']) ?></td>
        <td><?= $v['salaire'] ?>€</td>
        <td><a href="./update.php?id=<?= $v['id_employes'] ?>"><button type="button" class="btn btn-primary">Modifier</button></td></a>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href="./create.php">
  <button type="button" class="btn btn-primary mt-3 ms-3 mb-5">Ajouter un employé</button>
</a>
<!-- /Contenu de la page -->

<?php include_once("./includes/footer.php");
?>