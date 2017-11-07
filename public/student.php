<?php


//Démarrage de la session
session_start();

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';


$studentInfo = array();


if (isset($_GET['id'])){
  $sql="SELECT stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, cit_name, ses_number, tra_name
        FROM student
        INNER JOIN city ON city.cit_id = student.city_cit_id
        INNER JOIN session ON session.ses_id = student.session_ses_id
        INNER JOIN training ON training.tra_id = session.training_tra_id
        WHERE stu_id = :id";
  // Préparation de la requete
  $pdoStatement = $pdo->prepare($sql);

  $pdoStatement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

  // éxécution de la requete
  $pdoStatement->execute();
  // Si erreur
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

  // Je récupère tous les résultats
  $studentInfo = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  //print_r($studentInfo);


  //Calcul de l'âge
  $naiss= $studentInfo[0]['stu_birthdate'];

  $today = date("Y-m-d");
  $datetime1 = new DateTime($today);
  $datetime2 = new DateTime($naiss);
  $age = $datetime1->diff($datetime2);
// echo  $age->format('%y');
}
else {
	echo 'Etudiant non trouvé';
}







// A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';
