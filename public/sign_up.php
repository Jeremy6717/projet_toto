<?php

//Démarrage de la session
session_start();


// Création de variables de session dans $_SESSION
//$_SESSION['prenom'] = '';
//$_SESSION['nom'] = '';



//setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true);


//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';


// Initialisations
$identifiantEmail = '';
$identifiantPassword1 = '';
$identifiantPassword2 = '';


/*  Vérification des données
*****************************************/
// Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
  /*  Récupération des données
    *****************************************/
  $identifiantEmail = isset($_POST['emailInscription'])? $_POST['emailInscription']:'';
  $identifiantPassword1 = isset($_POST['passwordInscription1'])? $_POST['passwordInscription1']:'';
  $identifiantPassword2 = isset($_POST['passwordInscription2'])? $_POST['passwordInscription2']:'';

  /*  traitement des données
    *****************************************/
  $identifiantEmail = trim(strip_tags( $identifiantEmail));   //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  $identifiantPassword1 = trim(strip_tags($identifiantPassword1));     //strip_tags — Supprime les balises HTML et PHP d'une chaîne
  $identifiantPassword2 = trim(strip_tags($identifiantPassword2));



  /*  validation des données
    *****************************************/
  $formOk = true;

  // L'email est-il rempli ?
  if(empty($identifiantEmail)){
        echo 'Veuillez indiquer votre email svp <br>';
        $formOk = false;
  }else if (filter_var($identifiantEmail, FILTER_VALIDATE_EMAIL)=== false) { // Email format adpaté ?
       echo 'Cet email a un format non adapté <br>';
       $formOk = false;
  }


   // MDP rempli ?
  if(empty($identifiantPassword1)){
    echo 'Veuillez remplir le champ mot de passe svp <br>';
    $formOk = false;
  }else if(strlen($identifiantPassword1) < 8 ){  // Le MDP a-il la longueur minimum ?
    echo'Votre mot de passe doit contenir au minimum 8 caractères <br>';
    $formOk = false;
  }



  // Confirmation MDP rempli ?
  if(empty($identifiantPassword2)){
    echo 'Veuillez remplir le champ de confirmation de mot de passe svp <br>';
    $formOk = false;
  }else if(strlen($identifiantPassword2) < 8){  // Le MDP a-il la longueur minimum ?
    echo'Votre mot de passe doit contenir au minimum 8 caractères <br>';
    $formOk = false;
  }



  // MDP identique ?
  if( $identifiantPassword1 !== $identifiantPassword2){
        echo 'Veuillez indiquer le même mot de passe svp <br>';
        $formOk = false;
  }



 // On vérifie que l'email n'est pas déjà présente dans la DB


   $emailExist  = "SELECT (usr_email)  FROM `user` WHERE usr_email = :idEmail";


   $pdostatement = $pdo->prepare( $emailExist);
   $pdostatement -> bindValue(':idEmail', $identifiantEmail, PDO::PARAM_STR);

   $pdostatement -> execute();

   $existOuPas = $pdostatement -> rowCount();

 // On averti l'utilisateur que l'email existe déjà
   if($existOuPas != 0 ){
       echo 'Cette adresse email est déjà utilisée';
       $formOk = false;
   }



  // Si aucune erreur
	if ($formOk) {

            // On crypte le MDP + de sécurité, pas besoin de le faire sur les deux
            $identifiantPassword1 = password_hash($identifiantPassword1, PASSWORD_BCRYPT);

            // On insère les données dans la DB avec un PREPARE()
            $signup='INSERT INTO user (usr_email, usr_password)
            VALUES (:idIdentifiantEmail, :idIdentifiantPassword1)';


            $pdostatement = $pdo->prepare($signup);
            $pdostatement -> bindValue(':idIdentifiantEmail', $identifiantEmail, PDO::PARAM_STR);
            $pdostatement -> bindValue(':idIdentifiantPassword1', $identifiantPassword1, PDO::PARAM_STR);

            $pdostatement -> execute();

            echo 'Inscription validée';
      }



}











// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/sign_up.php';
require_once __DIR__.'/../view/footer.php';
