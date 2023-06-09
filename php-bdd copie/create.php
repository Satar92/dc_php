<?php
// PAGE D'ACCUEIL
// inclusion initiale
include_once("./includes/init.inc.php");

// debug
if ($env === 'dev') {
    incomingData();
}

// titre de la page
$titrePrincipal = 'Ajouter';

// id du body
$bodyId = 'addEmploye';

// tableau des genres:
$tabGenre = [
    'm' => 'Masculin',
    'f' => 'Féminin',
];

// tableau des nom des champs de formulaire
$formFieldNames = [
    "nom",
    "prenom",
    "sexe",
    "service",
    "date_embauche",
    "salaire",
];

// traitement du formulaire
// récupération des données:
if (isset($_POST['addEmployeeSubmitBtn'])) {
    // le bouton de soumission du formulaire a été cliqué
    extract($_POST);

    // Validation des données
    // le nom:
    if (!validateData($nom, TYPE_STRING)) {
        $errors['nom'] = "Le champs 'nom' n'est pas valide!";
    }

    if (!validateData($prenom, TYPE_STRING)) {
        $errors['prenom'] = "Le champs 'prenom' n'est pas valide!";
    }

    if (!validateData($sexe, TYPE_STRING)) {
        $errors['sexe'] = "Le champs 'genre' n'est pas valide!";
    }

    if (empty($sexe)) {
        $errors['sexe'] = "Le champs 'genre' est obligatoire!";
    }

    if (!in_array($sexe, ['m', 'f'], true)) {
        $errors['sexe'] = "Le champs 'genre' n'est pas valide!";
    }

    if (!validateData($service, TYPE_STRING)) {
        $errors['service'] = "Le champs 'service' n'est pas valide!";
    }

    if (!validateDate($date_embauche)) {
        $errors['date'] = "Le champs 'date' n'est pas valide!";
    }

    if (!is_numeric($salaire)) {
        $errors['salaire'] = "Le champs 'salaire' doit obligatoirement être un entier!";
    }

    if (!count($errors)) {
        // pas d'erreur de validation trouvées
        $date_enreg = convertDateFrToMysql($date_embauche);

        // on prepare la requete
        $stmt = $pdo->prepare("
            INSERT INTO employes (
                id_employes,
                prenom,
                nom,
                sexe,
                service,
                date_embauche,
                salaire
            )
            VALUES (
                null,
                :prenom,
                :nom,
                :sexe,
                :service,
                :date_embauche,
                :salaire
            )
        ");

        // on relie les marqueurs de position aux valeurs à vérifier puis inserer
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':sexe', $sexe, PDO::PARAM_STR);
        $stmt->bindParam(':service', $service, PDO::PARAM_STR);
        $stmt->bindParam(':date_embauche', $date_enreg, PDO::PARAM_STR);
        $stmt->bindParam(':salaire', $salaire, PDO::PARAM_INT);

        // on execute la requete
        try {
            $stmt->execute();
            $lastInsertedId = $pdo->lastInsertId();
        } catch (PDOException $e) {
            if ($env === 'dev') {
                $errors[] = $e->getMessage();
            } else {
                $errors[] = "Une erreur inattendue est survenue";
            }
        }
    }

    checkVar($errors);
}

// Affichage de la page
// Header:
include_once("./includes/header.php");
?>
<!-- Contenu de la page -->
<div class="container-col">
    <div class="container-struct form-container">
        <h3>Ajouter un employé</h3>
        <form method="post" id="createForm">
            <div class="input-group mb-3">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" aria-label="nom" aria-describedby="nom" name="nom" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control" aria-label="prenom" aria-describedby="prenom" name="prenom" required>
            </div>

            <select class="form-select mb-3" aria-label="choix" name="sexe" required>
                <option value="" selected>Sexe: veuillez choisir une option</option>

                <?php foreach ($tabGenre as $k => $v) : ?>
                    <option value="<?= $k ?>"><?= $v ?></option>
                <?php endforeach ?>
            </select>

            <div class="input-group mb-3">
                <span class="input-group-text" id="service">Service</span>
                <input type="text" class="form-control" aria-label="service" aria-describedby="service" name="service" required>
            </div>

            <div class="form-group mb-3">
                <span class="input-group-text" id="date">Date embauche</span>
                <input type="date" class="form-control" id="date" name="date_embauche" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="salaire">Salaire €</span>
                <input type="text" class="form-control" aria-label="salaire" aria-describedby="salaire" name="salaire" required>
            </div>

            <button type="submit" class="btn btn-primary" name="addEmployeeSubmitBtn">Envoyer</button>
        </form>
    </div>
</div>

<!-- /Contenu de la page -->
<?php
include_once("./includes/footer.php");
?>