<pre>
<?php

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';


//************** UPLOADER UN FICHIER ***************************

// Si le formulaire a été soumis
if (!empty($_POST)){
	//Je veux regarder le contenu des données envoyées par le formulaire
	//print_r ($_POST);
	//pour les fichiers => $_FILES
	//print_r($_FILES);

	// Si des fichiers ont été envoyés
	if(!empty($_FILES)){
		// je récupère les infos sur le fichier envoyé
		$fileForm = isset($_FILES['fileForm']) ? $_FILES['fileForm'] : array();

		// Validation du fichier
		$formOk = true;
		$allowedExtensions = array('csv');


		//  Vérifie le taille du fichier 1 solution
		// if($csvFile['size']) > 100000){
		// 	echo 'Fichier trop lourd, 100ko mx<br>';
		// 	$formOk = false;
		// }

		// Vérifie le taille du fichier 2 solutions
		if(filesize($csvFile['tmp_name']) > 100000){
			echo 'Fichier trop lourd, 100ko max<br>';
			$formOk = false;
		}


		// Seul type MIME autorisé = CSV
		if($fileForm['type'] != 'application/octet-stream' && $fileForm['type'] != 'text/csv'){
			//echo 'Fichier incorrect<br>';
			$formOk = false;
		}

		//Vérification de l'extension
		$dotPosition = strrpos($fileForm['name'], '.'); // Récupère la position du dernier . dans la string
		$extension = substr($fileForm['name'], $dotPosition+1); // Récupère une sous-chaine de la chaine de caractère (+1 pour ne pas avoir le . de l'extension)
		if(!in_array($extension, $allowedExtensions)){ //on test si l'extension du fichier uploadé est dans le tableau des extension autorisées
			//echo 'Extension incorrecte<br>';
			$formOk = false;
		}



		// Si le formulaire est valide (aucune erreur)
		if ($formOk) {
			// On définit un nouveau nom pour le fichier, pour encore + de sécurité
			$newFileName = md5(uniqid().'exerciceCSV').'.'.$extension;  // hash md5 + une chaine de caractère que l'on veut, ex: *+protectionTotale, minuscule, majuscule, caractères spéciaux

			// Si j'ai réussi à copier le fichier téléversé
			if(move_uploaded_file($fileForm['tmp_name'], __DIR__.'/csv/'.$newFileName)){
				//echo 'upload ok<br>';
			}
			else{
				//echo 'error :(<br>';
			}
		}


		//ouverture du fichier si l'upload a réussi

		$fileOpen = fopen(__DIR__.'/csv/'.$newFileName, "r");
		if ($fileOpen) {
		    while (($read = fgets($fileOpen)) !== false) {
		        //echo $read;
			  	$convert = explode(";", $read);
				//print_r($convert);
				$add= "INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate, session_ses_id, city_cit_id)
					 VALUES (:idlastname, :idfirstname, :idemail, :idfriend, :idbirth, :idsession, :idcity)";

				$pdostatement = $pdo->prepare($add);
				$pdostatement -> bindValue(':idlastname', $convert[0], PDO::PARAM_STR);
				$pdostatement -> bindValue(':idfirstname', $convert[1], PDO::PARAM_STR);
				$pdostatement -> bindValue(':idemail', $convert[2], PDO::PARAM_STR);
				$pdostatement -> bindValue(':idfriend', $convert[3], PDO::PARAM_STR);
				$pdostatement -> bindValue(':idbirth', $convert[4], PDO::PARAM_STR);
				$pdostatement -> bindValue(':idsession', 1, PDO::PARAM_INT);
				$pdostatement -> bindValue(':idcity', 4, PDO::PARAM_INT);

				$pdostatement -> execute();
		    	}
		    if (!feof($fileOpen)) {
		        echo "Erreur: fgets() a échoué\n";
		    }
		    fclose($fileOpen);
	    	}
	}
	//************************ GENERER UN FICHIER CSV ******************************************

	// Si Export
	else if (isset($_POST['csvGeneration'])) {
		$sql = '
			SELECT stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate
			FROM student
		';
		$pdoStatement = $pdo->query($sql);
		if ($pdoStatement && $pdoStatement->rowCount() > 0) {
			$exportFilename = 'export-'.date('Ymd').'.csv';
			// Je vérifie si il existe
			if (file_exists($exportFilename)){
				// Je supprime le fichier existant
				unlink($exportFilename);
			}
			// J'ouvre le fichier en écriture
			$fw = fopen($exportFilename, 'w');
			if ($fw) {
				while (($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) !== false) {
					// Je crée la ligne du CSV
					$line = implode(';', $row);
					// J'ajoute la ligne au fichier
					fwrite($fw, $line.PHP_EOL);
				}
				fclose($fw);
			}
		}
	}
}



      // A la fin, j'affiche
      require_once __DIR__.'/../view/header.php';
      require_once __DIR__.'/../view/upload.php';
      require_once __DIR__.'/../view/footer.php';


?>

</pre>
