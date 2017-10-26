<?php

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';


//Requête permettant de récupérer tous les étudiants, et les stocker dans un array
  $sql =" SELECT *
  	      FROM student
  	      ORDER BY stu_lastname
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
  print_r($student);


// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';
