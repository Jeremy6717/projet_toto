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

  /*  validation des données
    *****************************************/
  $formOk = true;

  // L'email est-il rempli ?
  if(empty($checkEmail)){
        echo 'Veuillez indiquer votre email svp <br>';
        $formOk = false;
  }else if (filter_var($checkEmail, FILTER_VALIDATE_EMAIL)=== false) { // Email format adpaté ?
      echo 'Cet email a un format non adapté <br>';
      $formOk = false;
  }


  // Si aucune erreur de conditions
     if ($formOk) {

           // On fait une requête pour récupérer l'id de l'utilisateur
           $sql = "INSERT INTO usr_id
                        FROM `user`
                        WHERE usr_email = :idEmail";

           $pdostatement = $pdo->prepare( $sql);
           $pdostatement -> bindValue(':idEmail', $checkEmail, PDO::PARAM_STR);

           $pdostatement -> execute();






// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/forgotPassword.php';
require_once __DIR__.'/../view/footer.php';
