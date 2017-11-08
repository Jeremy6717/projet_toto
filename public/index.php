<?php


//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';


$nomSessions = array();
$infoSessions = array();

// récupération des informations sur les sessions
  $sql="SELECT tra_name, loc_name, loc_id
        FROM training
        INNER JOIN session ON training.tra_id = session.training_tra_id
        INNER JOIN location ON location.loc_id = session.location_loc_id";
  // Préparation de la requete
  $pdoStatement = $pdo->query($sql);
  // Si erreur
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

  // Je récupère tous les résultats
  $infoSessions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  //print_r($nomSessions);

  // récupération des informations sur les sessions
    $sql="SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name, loc_name, loc_id
          FROM session
          INNER JOIN training ON training.tra_id = session.training_tra_id
          INNER JOIN location ON location.loc_id = session.location_loc_id";
    // Préparation de la requete
    $pdoStatement = $pdo->query($sql);
    // Si erreur
    if ($pdoStatement === false) {
      print_r($pdo->errorInfo());
      exit;
    }

    // Je récupère tous les résultats
    $infoSessions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($infoSessions);


// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/home.php';
require_once __DIR__.'/../view/footer.php';
