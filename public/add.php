<?php

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';



$listeVille = array();
$listeSession = array();

// récupération des villes
  $sql="SELECT cit_name
        FROM city";
  // Préparation de la requete
  $pdoStatement = $pdo->query($sql);
  // éxécution de la requete
  $pdoStatement->execute();
  // Si erreur
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

  // Je récupère tous les résultats
  $listeVille = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  //print_r($listeVille);


  // récupération des sessions
    $sql="SELECT ses_id, ses_number, tra_name
          FROM session
          INNER JOIN training ON training.tra_id = session.training_tra_id";
    // Préparation de la requete
    $pdoStatement = $pdo->query($sql);
    // Si erreur
    if ($pdoStatement === false) {
      print_r($pdo->errorInfo());
      exit;
    }

    // Je récupère tous les résultats
    $listeSession = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listeSession);



// Initialisations
$ajoutPrenom = '';
$ajoutNom = '';
$ajoutEmail = '';
$ajoutDateNaissance = '';
$ajoutSession = '';
$ajoutSympathie = '';
$ajoutVille = '';

/*  Vérification des données
*****************************************/
// Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
  /*  Récupération des données
    *****************************************/
  $ajoutPrenom = isset($_POST['prenom'])? $_POST['prenom']:'';
  $ajoutNom = isset($_POST['nom'])? $_POST['nom']:'';
  $ajoutEmail = isset($_POST['email'])? $_POST['email']:'';
  $ajoutDateNaissance = isset($_POST['dateNaissance'])? $_POST['dateNaissance']:'';
  $ajoutSession = isset($_POST ['session'])? $_POST['session']:'';
  $ajoutSympathie = isset($_POST['sympathie'])? $_POST['sympathie']:'';
  $ajoutVille = isset($_POST['ville'])? $_POST['ville']:'';

  /*  traitement des données
    *****************************************/
  $ajoutPrenom = trim(strip_tags($ajoutPrenom));   //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  $ajoutNom = trim(strip_tags($ajoutPrenom));     //strip_tags — Supprime les balises HTML et PHP d'une chaîne
  $ajoutEmail = trim(strip_tags($ajoutEmail));
  $ajoutDateNaissance = trim(strip_tags($ajoutDateNaissance));


  /*  validation des données
    *****************************************/
  $formOk = true;

  // Le prénom est-il rempli ?
  if(empty($ajoutPrenom)){
    echo 'Veuillez indiquer votre prenom svp';
    $formOk = false;
  }else if($ajoutPrenom <2){  // Le prénom a-il la longueur minimum ?
    echo'Votre prenom doit contenir plus de 1 caractère ';
    $formOk = false;
  }

  // Le nom est-il rempli ?
  if(empty($ajoutNom)){
    echo 'Veuillez indiquer votre nom svp';
    $formOk = false;
  }else if($ajoutNom <2){  // Le nom a-il la longueur minimum ?
    echo 'Votre nom doit contenir plus de 1 caractère';
    $formOk = false;
  }

  // L'email est-il rempli ?
  if(empty($ajoutEmail)){
    echo 'Veuillez indiquer votre email svp';
    $formOk = false;
  }

  // La date de naissance est-elle remplie ?
  if(empty($ajoutEmail)){
    echo 'Veuillez indiquer votre date de naissance svp';
    $formOk = false;
  }


  if (filter_var($ajoutEmail, FILTER_VALIDATE_EMAIL)=== false) {
    echo 'Cet email a un format non adapté.';
    $formOk = false;
  }


  // Si aucune erreur
	if ($formOk) {
  $sql='INSERT INTO student
        VALUES ($ajoutNom, $ajoutPrenom)';

  /*  Redirection vers student.php
  *****************************************/
  $lastId= $pdo->lastInsertId();
  header("Location: student.php?id={$lastId}");
  exit();
	}

}









// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';
