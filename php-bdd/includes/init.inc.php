<?php 

define ('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']. '/php-bdd/');

// Inclusion des fichier de fonction et de connection 
// a la bdd
include_once (ROOT_DIR."includes/functions/functions.php");
include_once (ROOT_DIR."includes/functions/constants.php");
include_once (ROOT_DIR."config/DB/dbdata.inc.php");

// demarrage de la session
session_start();

// creation d'un interrupteur de debug
$env= 'dev';

// tableau des formats d'images authorisé
$allowedImgFormats = ['jpg', 'jpeg', 'gif', 'png','svg'];

// tableau destinés a contenir les messages d'erreur ou de succes 
$errors = [];
$success = [];
$fieldErrors = [];
$parPage = 10;
// recuperation d'un objet PDO
$pdo = getPDO($dbdata);

// Nettoyage des donné si elles existent 
sanitizeGetPostData();
