<?php
// PAGE D'ACCUEIL
// inclusion initiale
include_once("./includes/init.inc.php");

// traitement de la suppression
if (isset($_GET['action']) && $_GET['action'] === "delete") {
  if (isset($_GET['id'])) {
    // validation de l'id passer dans l'url
    if (!is_numeric($_GET['id']) || !is_int((int)$_GET['id'])) {
      header('location:' . HTTP_SITE_URL);
      exit();
    }
  }
}
$idEmploye =(int)$_GET['id'];
// suppresion de l'employé
$stmt=$pdo->prepare("
    DELETE FROM employes WHERE id_employes = :id_employes"

);
$stmt->bindParam(':id_employes', $idEmploye, PDO::PARAM_INT);


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
<div class="container">
    <h1>Liste des éléments</h1>
    <!-- Contenu de la page -->
    <div class="row">
      <div class="col-12">
        <ul class="list-group">
          <!-- Éléments de la liste -->
          <li class="list-group-item">Élément 1</li>
          <li class="list-group-item">Élément 2</li>
          <li class="list-group-item">Élément 3</li>
          <li class="list-group-item">Élément 4</li>
          <li class="list-group-item">Élément 5</li>
          <li class="list-group-item">Élément 6</li>
          <li class="list-group-item">Élément 7</li>
          <li class="list-group-item">Élément 8</li>
          <li class="list-group-item">Élément 9</li>
          <li class="list-group-item">Élément 10</li>
        </ul>
      </div>
    </div>

    <!-- Pagination -->
    <div class="row">
      <div class="col-12">
        <nav aria-label="Pagination">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

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
        <td>
          <a href="./index.php?action=delete&id=<?= $v['id_employes'] ?>">
            <button type="button" class="btn btn-danger">Supprimer</button>
          </a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<nav>
  <ul class="pagination">

  </ul>
</nav>

<a href="./create.php">
  <button type="button" class="btn btn-primary mt-3 ms-3 mb-5">Ajouter un employé</button>
</a>
<!-- /Contenu de la page -->

<?php include_once("./includes/footer.php");
?>