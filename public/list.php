<?php


//Démarrage de la session
session_start();





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

//Récupération du terme rechercher dans le barre de recherche
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
//Si recherche, ma requête effectue une rehcerche et ne fait pas de pagination
if (!empty($search)){
  $sql='SELECT *
        FROM student
        WHERE stu_lastname LIKE "%:search%"
        OR stu_firstname LIKE :search
        OR stu_email LIKE :search
  ';
  $pdoStatement = $pdo->prepare($sql); /* on effectue un prépare pour sécuriser la recherche et éviter une injection sql*/
  $pdoStatement->bindValue(':search', '%'.$search.'%'); /* étant donné un prépare, il doit y avoir un bindValue*/
  $pdoStatement->execute(); /*après la préparation on execute*/
}else{
  //SI pas de recherche, on fait une Requête permettant de récupérer tous les étudiants et faire une pagination
  $sql =" SELECT *
  FROM student
  LIMIT 5 OFFSET $offset /*détermine le nombre de résultats ainsi que le nombre de page de décalage à la page suivante */
  ";
  $pdoStatement = $pdo->query($sql); /* Execution de la requete*/
}



// Si erreur lors de l'éxécution
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
