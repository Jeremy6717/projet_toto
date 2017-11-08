<?php




//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';



// Initialisations
$forgotPassword = '';



/*  Vérification des données
*****************************************/
// Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
  /*  Récupération des données
    *****************************************/
  $forgotPassword = isset($_POST['forgotPassword'])? $_POST['forgotPassword']:'';

  /*  traitement des données
    *****************************************/
  $forgotPassword = trim(strip_tags( $forgotPassword ));   //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne






// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/forgotPassword.php';
require_once __DIR__.'/../view/footer.php';
