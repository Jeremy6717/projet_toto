<?php

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';

$student = array();

//page saisie dans l'url
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//Je calcule automatiquement l'offset
$offset = ($page-1) * 5; //*le nombre de résultats par page
 if ($offset <= 0){ // condition pour ne pas avoir un résultat vide
    $offset =0;
}

//Requête permettant de récupérer tous les étudiants, et les stocker dans un array
  $sql =" SELECT *
  	      FROM student
          LIMIT 5 OFFSET $offset /*détermine le nombre de résultats ainsi que le nombre de page de décalage à la page suivante */
  ";
    // Execution de la requete
  $pdoStatement = $pdo->query($sql);

    // Si erreur
  if ($pdoStatement === false) {
  	print_r($pdo->errorInfo());
  	exit;
  }

    // Je récupère tous les résultats
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);



// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';
