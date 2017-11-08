<?php




//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';



// Initialisations
$checkEmail = '';
$checkPassword = '';
$successList = array();


/*  Vérification des données
*****************************************/
// Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
  /*  Récupération des données
    *****************************************/
  $checkEmail = isset($_POST['emailLogin'])? $_POST['emailLogin']:'';
  $checkPassword = isset($_POST['passwordLogin'])? $_POST['passwordLogin']:'';

  /*  traitement des données
    *****************************************/
  $checkEmail = trim(strip_tags( $checkEmail));   //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  $checkPassword = trim(strip_tags($checkPassword));     //strip_tags — Supprime les balises HTML et PHP d'une chaîne



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


   // MDP rempli ?
  if(empty($checkPassword)){
    echo 'Veuillez remplir le champ mot de passe svp <br>';
    $formOk = false;
  }else if(strlen($checkPassword) < 8 ){  // Le MDP a-il la longueur minimum ?
    echo'Votre mot de passe doit contenir au minimum 8 caractères <br>';
    $formOk = false;
  }


  // Si aucune erreur de conditions
	if ($formOk) {
            $loginOkBd = true;

            // On stock l'email dans une variable
            $sql = "SELECT usr_email, usr_password, usr_id, usr_role
                        FROM `user`
                        WHERE usr_email = :idEmail";

            $pdostatement = $pdo->prepare( $sql);
            $pdostatement -> bindValue(':idEmail', $checkEmail, PDO::PARAM_STR);

            $pdostatement -> execute();

            // On vérifie que l'email entré par l'utilisateur est dans la DB
            $emailDansBdOuPas = $pdostatement -> rowCount();
            if($emailDansBdOuPas == 0 ){
                  echo 'Email inexistant <br>';
                  $loginOkBd = false;
            }else{
                  $result = $pdostatement->fetch(PDO::FETCH_ASSOC);
                  $hash = $result['usr_password'];
                  //print_r($hash);


                  // On vérifie le MDP entré par l'utilisateur et celui dand la DB
                  if (password_verify($checkPassword, $hash)) {
                        echo 'Le mot de passe est valide ! <br>';
                        // On affiche au visiteur les données suivantes
                        $successList[] = 'User connecté !!!!';
				$successList[] = 'UserID = '.$result['usr_id'];
				$successList[] = 'IP = '.$_SERVER['REMOTE_ADDR'];
                        //on met en session l'ID du visiteur si il peut se connecter et ensuite afficher dans le header le bouton déconnexion
                        $_SESSION["ID"] = $result['usr_id'];
                        $_SESSION["Role"] = $result['usr_role'];
                        $_SESSION["Email"] = $result['usr_email'];
                        $_SESSION["IP"] = $_SERVER['REMOTE_ADDR'];

                  } else {
                        echo 'Le mot de passe est invalide <br>';
                        $loginOkBd = false;
                  }
            }
      }
}

// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/sign_in.php';
require_once __DIR__.'/../view/footer.php';
